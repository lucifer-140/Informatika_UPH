import os

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

while True:
    os.system('clear')
    try:
        n = int(input('n ? '))
        if n < 0 or n > 9:
            raise NilaiTidakValid('err: nilai angka harus antara 0 dan 9')

    except NilaiTidakValid as e:
        print(e)
    except ValueError:
        print('err: Masukkan angka yang valid')
    
    else:
        if n == 0:
            hasil = "nol"
        elif n == 1:
            hasil = "satu"
        elif n == 2:
            hasil = "dua"
        elif n == 3:
            hasil = "tiga"
        elif n == 4:
            hasil = "empat"
        elif n == 5:
            hasil = "lima"
        elif n == 6:
            hasil = "enam"
        elif n == 7:
            hasil = "tujuh"
        elif n == 8:
            hasil = "delapan"
        elif n == 9:
            hasil = "sembilan"
        
        print(hasil)
        break
