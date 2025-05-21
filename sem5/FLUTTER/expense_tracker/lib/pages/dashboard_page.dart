// lib/pages/dashboard_page.dart
import 'package:flutter/material.dart';
import '../widgets/circular_expense_chart.dart';
import '../widgets/income_goal_card.dart';

class DashboardPage extends StatelessWidget {
  const DashboardPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Dashboard'),
        actions: [
          IconButton(
            icon: const Icon(Icons.settings),
            onPressed: () {
              Navigator.pushNamed(context, '/settings');
            },
          ),
        ],
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const IncomeGoalCard(),
            const SizedBox(height: 16),
            const CircularExpenseChart(),
            const SizedBox(height: 16),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                ElevatedButton.icon(
                  onPressed: () => Navigator.pushNamed(context, '/add'),
                  icon: const Icon(Icons.add),
                  label: const Text('Add Expense'),
                ),
                ElevatedButton.icon(
                  onPressed: () {},
                  icon: const Icon(Icons.restart_alt),
                  label: const Text('Reset Month'),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
