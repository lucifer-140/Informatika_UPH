import 'package:flutter/material.dart';
import 'package:hive/hive.dart';
import 'package:intl/intl.dart';
import 'package:percent_indicator/circular_percent_indicator.dart';

import '../models/expense_model.dart';
import '../models/income_model.dart';
import '../utils/date_utils.dart';
import 'add_expense_page.dart';
import 'set_monthly_income_page.dart';
import 'view_expenses_page.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> with SingleTickerProviderStateMixin {
  late Box<Expense> expenseBox;
  late Box<Income> incomeBox;
  late AnimationController _pulseController;
  late Animation<double> _pulseAnimation;

  double monthlyIncome = 0;
  double totalSpent = 0;
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    expenseBox = Hive.box<Expense>('expenses');
    incomeBox = Hive.box<Income>('income');
    
    _pulseController = AnimationController(
      vsync: this,
      duration: const Duration(milliseconds: 1000),
    )..repeat(reverse: true);
    
    _pulseAnimation = Tween<double>(begin: 1.0, end: 1.1).animate(
      CurvedAnimation(parent: _pulseController, curve: Curves.easeInOut),
    );
    
    _loadData();
  }

  @override
  void dispose() {
    _pulseController.dispose();
    super.dispose();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    
    try {
      final now = DateTime.now();
      final monthKey = getMonthKey(now);

      // Get income
      final income = incomeBox.values.firstWhere(
        (i) => getMonthKey(i.month) == monthKey,
        orElse: () => Income(monthlyIncome: 0, month: now),
      );
      monthlyIncome = income.monthlyIncome;

      // Get expenses for this month
      totalSpent = expenseBox.values
          .where((e) => getMonthKey(e.date) == monthKey)
          .fold(0.0, (sum, e) => sum + e.amount);

      // Handle pulse animation for high spending
      final percentSpent = (monthlyIncome == 0) ? 0 : (totalSpent / monthlyIncome).clamp(0.0, 1.0);
      if (percentSpent > 0.9) {
        _pulseController.forward();
      } else {
        _pulseController.reset();
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Error loading data: ${e.toString()}')),
      );
    } finally {
      setState(() => _isLoading = false);
    }
  }

  Color getSpendingColor(double percentSpent) {
    if (percentSpent < 0.25) return Colors.green;
    if (percentSpent < 0.5) return Colors.lightGreen;
    if (percentSpent < 0.75) return Colors.orange;
    if (percentSpent < 0.9) return Colors.deepOrange;
    return Colors.red;
  }

  String _formatCurrency(double amount) {
    return NumberFormat.currency(
      locale: 'id_ID',
      symbol: 'Rp ',
      decimalDigits: 0,
    ).format(amount);
  }

  @override
  Widget build(BuildContext context) {
    final theme = Theme.of(context);
    final colorScheme = theme.colorScheme;
    final now = DateTime.now();

    double available = monthlyIncome - totalSpent;
    double percentSpent = (monthlyIncome == 0) ? 0 : (totalSpent / monthlyIncome).clamp(0.0, 1.0);
    final spendingColor = getSpendingColor(percentSpent);

    return Scaffold(
      appBar: AppBar(
        title: const Text('Expense Tracker'),
        centerTitle: true,
        elevation: 0,
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh),
            onPressed: _loadData,
            tooltip: 'Refresh',
          ),
        ],
      ),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator())
          : SingleChildScrollView(
              padding: const EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.stretch,
                children: [
                  // Month and Year indicator
                  Text(
                    DateFormat('MMMM yyyy').format(now),
                    textAlign: TextAlign.center,
                    style: theme.textTheme.titleMedium?.copyWith(
                      color: theme.textTheme.titleMedium?.color?.withOpacity(0.7),
                    ),
                  ),
                  const SizedBox(height: 16),

                  // Income display
                  Card(
                    elevation: 2,
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(12),
                    ),
                    child: Padding(
                      padding: const EdgeInsets.all(16),
                      child: Column(
                        children: [
                          Text(
                            'Monthly Budget',
                            style: theme.textTheme.titleSmall?.copyWith(
                              color: theme.textTheme.titleSmall?.color?.withOpacity(0.6),
                            ),
                          ),
                          const SizedBox(height: 4),
                          Text(
                            _formatCurrency(monthlyIncome),
                            style: theme.textTheme.headlineSmall?.copyWith(
                              fontWeight: FontWeight.bold,
                              color: colorScheme.primary,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),

                  const SizedBox(height: 24),

                  // Empty state or progress indicator
                  if (monthlyIncome == 0)
                    _buildEmptyState(context)
                  else
                    Column(
                      children: [
                        // Progress indicator with pulse animation
                        AnimatedBuilder(
                          animation: _pulseAnimation,
                          builder: (context, child) {
                            return Transform.scale(
                              scale: percentSpent > 0.9 ? _pulseAnimation.value : 1.0,
                              child: child,
                            );
                          },
                          child: CircularPercentIndicator(
                            radius: 120.0,
                            lineWidth: 16.0,
                            percent: percentSpent,
                            animation: true,
                            animateFromLastPercent: true,
                            curve: Curves.easeOut,
                            center: Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Text(
                                  "${(percentSpent * 100).toStringAsFixed(1)}%",
                                  style: theme.textTheme.headlineSmall?.copyWith(
                                    fontWeight: FontWeight.bold,
                                  ),
                                ),
                                Text(
                                  "Spent",
                                  style: theme.textTheme.titleSmall,
                                ),
                                Text(
                                  "${_formatCurrency(totalSpent)} / ${_formatCurrency(monthlyIncome)}",
                                  style: theme.textTheme.bodySmall,
                                ),
                              ],
                            ),
                            progressColor: spendingColor,
                            backgroundColor: colorScheme.surfaceVariant,
                            circularStrokeCap: CircularStrokeCap.round,
                          ),
                        ),

                        const SizedBox(height: 24),

                        // Amount cards
                        Row(
                          children: [
                            Expanded(
                              child: _AmountCard(
                                label: "Available",
                                amount: available,
                                color: spendingColor,
                                icon: Icons.account_balance_wallet,
                              ),
                            ),
                            const SizedBox(width: 16),
                            Expanded(
                              child: _AmountCard(
                                label: "Spent",
                                amount: totalSpent,
                                color: colorScheme.error,
                                icon: Icons.shopping_bag,
                              ),
                            ),
                          ],
                        ),
                      ],
                    ),

                  const SizedBox(height: 32),

                  // Action buttons
                  _ActionButton(
                    icon: Icons.add,
                    label: "Add Expense",
                    onPressed: () async {
                      await Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => const AddExpensePage()),
                      );
                      _loadData();
                    },
                  ),

                  const SizedBox(height: 12),

                  _ActionButton(
                    icon: Icons.account_balance_wallet,
                    label: "Set Monthly Income",
                    onPressed: () async {
                      await Navigator.push(
                        context,
                        MaterialPageRoute(builder: (_) => const SetMonthlyIncomePage()),
                      );
                      _loadData();
                    },
                  ),

                  const SizedBox(height: 12),

                  _ActionButton(
                    icon: Icons.view_list,
                    label: "View Past Expenses",
                    onPressed: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (_) => ViewExpensesPage(onExpenseUpdated: _loadData),
                        ),
                      );
                    },
                  ),

                  const SizedBox(height: 12),

                  OutlinedButton.icon(
                    onPressed: _confirmReset,
                    icon: const Icon(Icons.refresh),
                    label: const Text("Reset This Month"),
                    style: OutlinedButton.styleFrom(
                      padding: const EdgeInsets.symmetric(vertical: 16),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12),
                      ),
                    ),
                  ),
                ],
              ),
            ),
    );
  }

  Widget _buildEmptyState(BuildContext context) {
    return Card(
      margin: const EdgeInsets.symmetric(vertical: 24),
      child: Padding(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            Icon(Icons.account_balance_wallet_outlined, size: 48, color: Colors.grey[400]),
            const SizedBox(height: 16),
            Text(
              "No Budget Set",
              style: Theme.of(context).textTheme.titleLarge,
            ),
            const SizedBox(height: 8),
            Text(
              "Set your monthly income to start tracking expenses",
              textAlign: TextAlign.center,
              style: Theme.of(context).textTheme.bodyMedium?.copyWith(
                    color: Theme.of(context).textTheme.bodyMedium?.color?.withOpacity(0.7),
                  ),
            ),
            const SizedBox(height: 16),
            ElevatedButton(
              onPressed: () async {
                await Navigator.push(
                  context,
                  MaterialPageRoute(builder: (_) => const SetMonthlyIncomePage()),
                );
                _loadData();
              },
              child: const Text("Set Monthly Income"),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> _confirmReset() async {
    final confirm = await showDialog<bool>(
      context: context,
      builder: (context) => AlertDialog(
        title: const Text("Reset This Month?"),
        content: const Text(
            "This will delete all expenses and income for the current month only."),
        actions: [
          TextButton(
            onPressed: () => Navigator.pop(context, false),
            child: const Text("Cancel"),
          ),
          TextButton(
            onPressed: () => Navigator.pop(context, true),
            child: const Text("Reset", style: TextStyle(color: Colors.red)),
          ),
        ],
      ),
    );

    if (confirm == true) {
      final now = DateTime.now();
      final currentMonthKey = getMonthKey(now);

      // Delete current month's expenses only
      final keysToDelete = expenseBox.keys.where((key) {
        final expense = expenseBox.get(key);
        return getMonthKey(expense?.date ?? now) == currentMonthKey;
      }).toList();
      await expenseBox.deleteAll(keysToDelete);

      // Reset income for current month
      await incomeBox.put(
        currentMonthKey,
        Income(monthlyIncome: 0, month: now),
      );

      _loadData();
    }
  }
}

class _AmountCard extends StatelessWidget {
  final String label;
  final double amount;
  final Color color;
  final IconData icon;

  const _AmountCard({
    required this.label,
    required this.amount,
    required this.color,
    required this.icon,
  });

  @override
  Widget build(BuildContext context) {
    final theme = Theme.of(context);
    final formatter = NumberFormat.currency(
      locale: 'id_ID',
      symbol: 'Rp ',
      decimalDigits: 0,
    );

    return Card(
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(12),
      ),
      elevation: 2,
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Icon(icon, size: 16, color: color),
                const SizedBox(width: 8),
                Text(
                  label,
                  style: theme.textTheme.titleSmall?.copyWith(
                    color: theme.textTheme.titleSmall?.color?.withOpacity(0.6),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 8),
            Text(
              formatter.format(amount),
              style: theme.textTheme.titleLarge?.copyWith(
                fontWeight: FontWeight.bold,
                color: color,
              ),
            ),
          ],
        ),
      ),
    );
  }
}

class _ActionButton extends StatelessWidget {
  final IconData icon;
  final String label;
  final VoidCallback onPressed;

  const _ActionButton({
    required this.icon,
    required this.label,
    required this.onPressed,
  });

  @override
  Widget build(BuildContext context) {
    return ElevatedButton.icon(
      onPressed: onPressed,
      icon: Icon(icon),
      label: Text(label),
      style: ElevatedButton.styleFrom(
        padding: const EdgeInsets.symmetric(vertical: 16),
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(12),
        ),
      ),
    );
  }
}