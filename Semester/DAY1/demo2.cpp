#include <iostream>
using namespace std;

int main(){
    int arr[4];
    cout << "input 4 buah nilai numeric (int) unik [pisahkan setiap nilai dengan spasi] ? ";
    for(int i=0; i<4; i++){
        cin >> arr[i];
    }
    cout << "Nilai yang anda input:" << endl;
    for (int i = 0; i < 4; ++i) {
        cout << "Nilai - " << i + 1 << " : " << arr[i] << endl;
    }
    int max = arr[0];
    int min = arr[0];

    for (int i = 1; i < 4; i++) {
        if (arr[i] > max) {
            max = arr[i];
        }
        if (arr[i] < min) {
            min = arr[i];
        }
    }
    cout << "Nilai Terbesar : " << max << endl;
    cout << "Nilai Terkecil : " << min << endl;
    return 0;
}