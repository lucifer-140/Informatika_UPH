
# while True:
#     while True:

#         nilai = input('nilai = ')
#         if nilai.isnumeric():
#             break
    
#     nilai = int(nilai)

#     hasil = 'Genap' if nilai % 2 == 0 else 'Ganjil'
#     print(f'{nilai} = Bilangan {hasil}')

#     while True:
#         jwb = input('Ulangi lagi (y/t)')
#         if jwb.lower() == 'y' or jwb.lower() == 't':
#             break
    
#     if jwb.lower() == 't':
#         break

while True:
     
    while True:
        nilai = input('Nilai ? ')
        if nilai.isnumeric():
            break 
         
           
    nilai = int(nilai) 
    
    hasil = 'Genap' if nilai % 2 == 0 else 'ganjil'
    print(f'{nilai} = Bilangan {hasil}')

    while True :
        jwb = input('Ulangi lagi? (y/n)')
        if jwb.lower() == "y" or jwb.lower() == "n" :
            break

    if jwb.lower() == 'n':
        break
