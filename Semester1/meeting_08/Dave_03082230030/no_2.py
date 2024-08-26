class InvalidInputError(Exception):
    def __init__(self, msg):
        super().__init__(msg)

def convert(index):
    return chr(ord('A') + index - 1)

def abjad_rumi():
    print("...::: ABJAD RUMI / LATIN :::...")
    print("--------------------------------")
    while True:
        try:
            index = int(input("Huruf ke ? "))
            if not 1 <= index <= 26:
                raise InvalidInputError("Err, input tidak valid. (nilai valid: 1 s.d. 26)")
            
            character = convert(index)
            print("Karakter ke -", index, " adalah huruf:", character)
            
            ulang = input("Ulang (y/n) ? ")
            if ulang != "y":
                break
            
        except ValueError:
            print("Err, input tidak valid. (nilai valid: angka bulat)")
        except InvalidInputError as e:
            print(e)

abjad_rumi()