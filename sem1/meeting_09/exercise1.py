import os

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

count = 0
total = 0
ls = []

try:
    n = int(input('n ? '))
    if n < 1 or n > 100:
        raise NilaiTidakValid('err: nilai angka harus antara 1 dan 100')

    while count < n:
        try:
            b = int(input("bilangan ? "))
            if b < 1 or b > 100:
                raise NilaiTidakValid('err: nilai angka harus antara 1 dan 100')

            if b % 2 == 0:
                ls.append(b)
                total += b
                count += 1
            else:
                print('err: Masukkan bilangan genap')

        except ValueError:
            print('err: Masukkan angka yang valid')

    print("semua bilangan genap:", *ls)
    print("total bilangan:", total)

except NilaiTidakValid as e:
    print(e)


