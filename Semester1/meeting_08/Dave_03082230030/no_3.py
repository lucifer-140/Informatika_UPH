class EmptyStringError(Exception):
    def __init__(self, msg):
        super().__init__(msg)

class NilaiTidakValid(Exception):
    def __init__(self, msg):
        super().__init__(msg)

def hitungan(name):
    weight = 0
    for char in name:
        if char.isalpha():
            weight += ord(char.lower()) - ord('a') + 1
    return weight

while True:
    try:
        name = str(input("Nama Anda ? "))
        if not name:
            raise EmptyStringError("Err, empty string ...")
        
        if not name.isalpha():
            raise NilaiTidakValid("Err, nilai tidak valid...")
          
        total = hitungan(name)
        print("Total Bobot:", " + ".join(str(ord(char.lower()) - ord('a') + 1) for char in name if char.isalpha()), "=", total)
    
    except EmptyStringError as e:
        print(e)
    except NilaiTidakValid as e:
        print(e)
    except TypeError:
        print(f'err: nilai string format\n')
    else:
        break