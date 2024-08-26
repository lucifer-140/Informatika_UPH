import os

while True:
    os.system('clear')

    try:
        n = int(input('n ? '))
        count = 0  
        
        if n <= 1:
            print(n, "bukan bilangan prima")
        else:
            for i in range(2, int(n**0.5) + 1):
                if n % i == 0:
                    count += 1
            
            if count == 0:
                print(n, "adalah bilangan prima")
            else:
                print(n, "bukan bilangan prima")
        
        break  

    except ValueError:
        print(f'err: masukkan angka\n')
