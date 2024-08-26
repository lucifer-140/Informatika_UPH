import os

ls = []
total = 0
countS = 0
countF = 0

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

while True:
    # os.system('clear')

    try:
        n = int(input('n ? '))
        
        if n == 0:
            if len(ls) == 0:
                print("Tidak ada data yang dimasukkan.")
            else:
                print("Banyak bilangan data                  : ", len(ls))
                print("Nilai data terkecil                   : ", min(ls))
                print("Nilai data terbesar                   : ", max(ls))
                print("Jumlah dari keseluruhan bilangan      : ", total)
                print("Rata-rata dari keseluruhan nilai data : ", (total / len(ls)))
                print("Banyak berhasil                       : ", countS)
                print("Banyak salah                          : ", countF)
            break

        if n < 0:
            countF += 1
        else:
            ls.append(n)
            total += n
            countS += 1

    except ValueError:
        print(f'err: nilai angka harus berupa nilai numerik bulat\n')
