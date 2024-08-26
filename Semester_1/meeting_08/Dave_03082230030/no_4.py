class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

class EmptyStringError(Exception):
    def __init__(self, msg):
        super().__init__(msg)

def hitung_lcm(x, y): 
    if x > y:  
        n = x  
    else:  
        n = y  
    while(True):  
        if((n % x == 0) and (n % y == 0)):  
            lcm = n  
            break  
        n += 1  
    return lcm  

while True:
    try:
        
        n1 = input("Bilangan – 1 ? ")
        n2 = input("Bilangan – 2 ? ")

        if not n1 or not n2:
            raise EmptyStringError("Err, Masukan Bilangan")
        
        if n1.isalpha() or n2.isalpha():
            raise NilaiTidakValid(f'err: Masukan Bilangan Bulat\n')
        elif int(n1) < 0 or int(n2) < 0:
            raise NilaiTidakValid(f'err: Masukan Bilangan Bulat Positif\n')
        else:
            n1 = int(n1)
            n2 = int(n2)

        print(f">>> KPK Dari Bilangan {n1} dan {n2} adalah", hitung_lcm(n1, n2))

    
    except EmptyStringError as e:
        print(e)
    except NilaiTidakValid as e:
        print(e)
    else:
        break