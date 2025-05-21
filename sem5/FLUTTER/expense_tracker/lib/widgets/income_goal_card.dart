// lib/widgets/income_goal_card.dart
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class IncomeGoalCard extends StatefulWidget {
  const IncomeGoalCard({super.key});

  @override
  State<IncomeGoalCard> createState() => _IncomeGoalCardState();
}

class _IncomeGoalCardState extends State<IncomeGoalCard> {
  String income = 'Rp 0';
  String goal = 'Rp 0';

  @override
  void initState() {
    super.initState();
    _loadValues();
  }

  Future<void> _loadValues() async {
    final prefs = await SharedPreferences.getInstance();
    final incomeVal = prefs.getString('monthly_income') ?? '0';
    final goalVal = prefs.getString('savings_goal') ?? '0';

    setState(() {
      income = 'Rp $incomeVal';
      goal = 'Rp $goalVal';
    });
  }

  @override
  Widget build(BuildContext context) {
    return Card(
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
      elevation: 3,
      child: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text('Monthly Income: $income',
                style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            Text('Savings Goal: $goal',
                style: const TextStyle(fontSize: 14, color: Colors.grey)),
          ],
        ),
      ),
    );
  }
}
