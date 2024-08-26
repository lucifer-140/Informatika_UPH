import os

while True:
    os.system('clear')
    try:
        celcius = float(input('celcius ? '))
        print("Konversi:")
        print("---------")

        reamur = (4 / 5)*celcius
        fahrenheit = ((9 / 5)*celcius) + 32
        kelvin = celcius + 273

        print("reamur : ", '%.1f' % reamur)
        print("fahrenheit : ", '%.1f' % fahrenheit)
        print("kelvin : ", '%.1f' % kelvin)

        break
    
    except ValueError:
        print(f'err: input data harus dalam nilai numeric\n')
        
        
        

