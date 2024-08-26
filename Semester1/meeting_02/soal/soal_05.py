nilai1 = int(input("Nilai 1 = ")) 
nilai2 = int(input("Nilai 2 = ")) 
operasi = str(input("Operasi = "))

total = 0

if(operasi == "+"):
    total = nilai1 + nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "-"):
    total = nilai1 - nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "*"):
    total = nilai1 * nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "/"):
    total = nilai1 / nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "//"):
    total = nilai1 // nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "%"):
    total = nilai1 % nilai2
    print(nilai1,operasi,nilai2,"=",total)
elif(operasi == "**"):
    total = nilai1 ** nilai2
    print(nilai1,operasi,nilai2,"=",total)
