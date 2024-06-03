#include <iostream>
using namespace std;

int main(){
    int jumlah_data, new_data;
    cout << "Banyak Data Unik ? "; //banyak angka input
    cin >> jumlah_data;

    int arr[jumlah_data];
    cout << "Input " << jumlah_data << " buah nilai numeric (int) unik" << endl;
    cout << "-------------------------------------" << endl;

    for (int i = 0; i < jumlah_data; i++) {
        cout << "Nilai - " << i + 1 << " : ";
        cin >> new_data; //input angka

        bool temu = false;
        for (int j = 0; j < i; j++){//cek angka sudah ada/tidak
            if (new_data == arr[j]) { 
                temu = true;
                cout << "Sorry, nilai yang sama sudah terdaftar ..." << endl;
                i--;
                break;
            }
        }
        if (!temu){//jika angka tidak ditemukan masukkan ke array
            arr[i] = new_data;
        }
        
    }

    cout << "\nNilai yang anda input:" << endl;
    for (int i = 0; i < jumlah_data; ++i) {
        cout << "Nilai - " << i + 1 << " : " << arr[i] << endl;
    }

    int max = arr[0];
    int min = arr[0];

    for (int i = 1; i < jumlah_data; i++) {
        if (arr[i] > max) {
            max = arr[i];
        }
        if (arr[i] < min) {
            min = arr[i];
        }
    }
    
    cout << "\nNilai Terbesar : " << max << endl;
    cout << "Nilai Terkecil : " << min << endl;

    return 0;
}
