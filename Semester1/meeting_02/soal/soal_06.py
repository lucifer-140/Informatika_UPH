y = int(input("tahun : "))

if((y % 400 == 0) or (y % 4 == 0)):
    print("tahun kabisat")
elif((y % 400 != 0) and (y % 100 == 0)):
    print("bukan tahun kabisat")
else:
    print("bukan tahun kabisat")