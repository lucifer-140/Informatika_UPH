import os
import random

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

def selection_sort(list):
    index_length = range(0, len(list)-1) 

    for i in index_length:
        min_value = i

        for j in range(i+1, len(list)):
            if list[j] < list[min_value]:
                min_value = j
        
        if min_value != i:
            list[min_value], list[i] = list[i], list[min_value]
    
    return list

totalAll = 0
totalEven = 0
totalOdd = 0
lsEven = []
lsOdd = []
lsAll = []

while len(lsAll) < 20: 
    try:
        n = int(input("n ? "))
        if n >= 1 and n <= 100:
            totalAll += n
            lsAll.append(n)
            if n % 2 == 0:
                totalEven += n
                lsEven.append(n)
            else:
                totalOdd += n
                lsOdd.append(n) 
        else:
            raise NilaiTidakValid(f"Angka invalid: {n}")
    except ValueError:
        print('err: masukkan angka\n')
    except NilaiTidakValid as e:
        print(f'err: {str(e)}')

print("Semua data uniq yang telah di input        : ", *lsAll)
print("List data uniq yang telah disorted         : ", *selection_sort(lsAll))
print("Total semua data input                     : ", totalAll)
print("Semua data uniq ganjil yang telah di input : ", *lsOdd)
print("Persentase kehadiran ganjil                : ", (len(lsOdd)/20)*100)
print("Total semua data ganjil                    : ", totalOdd)
print("Semua data uniq genap yang telah di input  : ", *lsEven)
print("Persentase kehadiran genap                 : ", (len(lsEven)/20)*100)
print("Total semua data genap                     : ", totalEven)
print("Total semua data input                     : ", totalAll)
