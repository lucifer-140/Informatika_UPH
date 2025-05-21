// lib/pages/expense_list_page.dart
import 'package:flutter/material.dart';

class ExpenseListPage extends StatelessWidget {
  const ExpenseListPage({super.key});

  @override
  Widget build(BuildContext context) {
    // dummy list of expenses
    final expenses = [
      {'name': 'Groceries', 'amount': 150000},
      {'name': 'Coffee', 'amount': 30000},
      {'name': 'Internet', 'amount': 250000},
    ];

    return Scaffold(
      appBar: AppBar(title: const Text('Expenses')),
      body: ListView.separated(
        itemCount: expenses.length,
        separatorBuilder: (_, __) => const Divider(),
        itemBuilder: (context, index) {
          final item = expenses[index];
          return ListTile(
            title: Text(item['name'] as String),
            trailing: Text('Rp ${item['amount']}'),
            onTap: () {},
          );
        },
      ),
    );
  }
}
