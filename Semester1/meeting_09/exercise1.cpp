#include <iostream>
#include <list>

using namespace std; // Add this line to include the std namespace

void selectionSort(list<int>& arr) {
    int n = arr.size();
    list<int>::iterator i, j, minIndex;
    for (i = arr.begin(); i != prev(arr.end()); ++i) {
        minIndex = i;
        for (j = next(i); j != arr.end(); ++j) {
            if (*j < *minIndex) {
                minIndex = j;
            }
        }
        if (minIndex != i) {
            swap(*minIndex, *i);
        }
    }
}

int main() {
    int totalAll = 0;
    int totalEven = 0;
    int totalOdd = 0;
    list<int> lsEven;
    list<int> lsOdd;
    list<int> lsAll;
    list<int> lsAllSorted;
    while (lsAll.size() < 20) {
        int n;
        cout << "n ? ";
        cin >> n;
        if (n >= 1 && n <= 100) {
            totalAll += n;
            lsAll.push_back(n);
            if (n % 2 == 0) {
                totalEven += n;
                lsEven.push_back(n);
            } else {
                totalOdd += n;
                lsOdd.push_back(n);
            }
        } else {
            cout << "err: Angka invalid: " << n << "\n";
        }
    }
    
    lsAllSorted = lsAll;
    selectionSort(lsAllSorted);

    cout << "Semua data uniq yang telah di input        : ";
    for (const auto& num : lsAll) {
        cout << num << " ";
    }
    cout << "\n";
    cout << "array yang telah disorted                  : ";
    for (const auto& num : lsAllSorted) {
        cout << num << " ";
    }
    cout << "\n";
    cout << "Total semua data input                     : " << totalAll << "\n";
    cout << "Semua data uniq ganjil yang telah di input : ";
    for (const auto& num : lsOdd) {
        cout << num << " ";
    }
    cout << "\n";
    cout << "Persentase kehadiran ganjil                : " << (static_cast<double>(lsOdd.size()) / 20) * 100 << "\n";
    cout << "Total semua data ganjil                    : " << totalOdd << "\n";
    cout << "Semua data uniq genap yang telah di input  : ";
    for (const auto& num : lsEven) {
        cout << num << " ";
    }
    cout << "\n";
    cout << "Persentase kehadiran genap                 : " << (static_cast<double>(lsEven.size()) / 20) * 100 << "\n";
    cout << "Total semua data genap                     : " << totalEven << "\n";
    cout << "Total semua data input                     : " << totalAll << "\n";
    return 0;
}
