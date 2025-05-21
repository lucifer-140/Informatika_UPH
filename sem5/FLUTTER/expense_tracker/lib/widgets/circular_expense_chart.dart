// lib/widgets/circular_expense_chart.dart
import 'package:flutter/material.dart';
import 'dart:math';

class CircularExpenseChart extends StatelessWidget {
  const CircularExpenseChart({super.key});

  @override
  Widget build(BuildContext context) {
    double spentPercent = 0.6;
    double spent = 3000000;
    double available = 2000000;

    return Center(
      child: SizedBox(
        height: 180,
        width: 180,
        child: Stack(
          alignment: Alignment.center,
          children: [
            SizedBox(
              height: 160,
              width: 160,
              child: CustomPaint(
                painter: _CircleChartPainter(spentPercent),
              ),
            ),
            Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                Text('Rp ${spent.toStringAsFixed(0)}',
                    style: const TextStyle(
                        fontSize: 16, fontWeight: FontWeight.bold)),
                const SizedBox(height: 4),
                Text('Available: Rp ${available.toStringAsFixed(0)}',
                    style: const TextStyle(fontSize: 12, color: Colors.grey)),
              ],
            )
          ],
        ),
      ),
    );
  }
}

class _CircleChartPainter extends CustomPainter {
  final double percent;
  _CircleChartPainter(this.percent);

  @override
  void paint(Canvas canvas, Size size) {
    Paint baseCircle = Paint()
      ..strokeWidth = 12
      ..color = Colors.grey.shade300
      ..style = PaintingStyle.stroke;

    Paint progressCircle = Paint()
      ..strokeWidth = 12
      ..color = Colors.indigo
      ..style = PaintingStyle.stroke
      ..strokeCap = StrokeCap.round;

    Offset center = Offset(size.width / 2, size.height / 2);
    double radius = min(size.width / 2, size.height / 2);
    canvas.drawCircle(center, radius, baseCircle);
    double arcAngle = 2 * pi * percent;
    canvas.drawArc(Rect.fromCircle(center: center, radius: radius), -pi / 2,
        arcAngle, false, progressCircle);
  }

  @override
  bool shouldRepaint(covariant CustomPainter oldDelegate) => true;
}
