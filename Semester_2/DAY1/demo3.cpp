#include <iostream>

using namespace std;

int main() {
    int num1, num2, num3, num4, num5;

    cout << "Input 5 buah nilai numeric (int) unik (pisahkan dengan spasi): ";
    cin >> num1 >> num2 >> num3 >> num4 >> num5;

    cout << "Nilai yang anda input:" << endl;
    cout << "Nilai - 1 : " << num1 << endl;
    cout << "Nilai - 2 : " << num2 << endl;
    cout << "Nilai - 3 : " << num3 << endl;
    cout << "Nilai - 4 : " << num4 << endl;
    cout << "Nilai - 5 : " << num5 << endl;

    int smallest = num1;
    int largest = num1;

    if (num2 < smallest) {
        smallest = num2;
    }
    else if (num2 > largest) {
        largest = num2;
    }

    if (num3 < smallest) {
        smallest = num3;
    }
    else if (num3 > largest) {
        largest = num3;
    }

    if (num4 < smallest) {
        smallest = num4;
    }
    else if (num4 > largest) {
        largest = num4;
    }

    if (num5 < smallest) {
        smallest = num5;
    }
    else if (num5 > largest) {
        largest = num5;
    }

    cout << "Nilai Terbesar : " << largest << endl;
    cout << "Nilai Terkecil : " << smallest << endl;

    return 0;
}
