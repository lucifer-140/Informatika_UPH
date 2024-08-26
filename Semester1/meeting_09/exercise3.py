import os

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

lsVokal = []
lsKonsonan = []

def checker(x):
    if x.isalpha():  
        if (x.lower() in ['a', 'e', 'i', 'o', 'u']):
            lsVokal.append(x)
        else:
            lsKonsonan.append(x)

try:
    kalimat = input("Kalimat ? ")

    for char in kalimat:
        checker(char)

    print("Kalimat               : ", kalimat)
    print("Huruf Vokal           : ", *lsVokal)
    print("Banyak Huruf Vokal    : ", len(lsVokal))
    print("Huruf Konsonan        : ", *lsKonsonan)
    print("Banyak Huruf Konsonan : ", len(lsKonsonan))

except ValueError:
    print('err: Masukkan input yang Valid')
