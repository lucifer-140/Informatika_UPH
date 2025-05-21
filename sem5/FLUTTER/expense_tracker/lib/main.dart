// lib/main.dart
import 'package:flutter/material.dart';
import 'pages/dashboard_page.dart';
import 'pages/add_expense_page.dart';
import 'pages/expense_list_page.dart';
import 'pages/settings_page.dart';

void main() {
  runApp(const ExpenseTrackerApp());
}

class ExpenseTrackerApp extends StatelessWidget {
  const ExpenseTrackerApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Personal Expense Tracker',
      theme: ThemeData(
        primarySwatch: Colors.indigo,
        scaffoldBackgroundColor: Colors.white,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      debugShowCheckedModeBanner: false,
      initialRoute: '/',
      routes: {
        '/': (context) => const DashboardPage(),
        '/add': (context) => const AddExpensePage(),
        '/list': (context) => const ExpenseListPage(),
        '/settings': (context) => const SettingsPage(),
      },
    );
  }
} 