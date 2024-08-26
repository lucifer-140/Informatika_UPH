import sys

jumlah = 0 #as accumulator
valid_value = []
not_valid_value = []


for it in sys.argv:
    if it != "add.py":
        if it.isnumeric():
            jumlah += int(it)
            valid_value.append(it)
        else:
            not_valid_value.append(it)


#create output

print("Output : ")

if valid_value:
    first = True
    for it in valid_value:
        if first :
            print(f"{it}", end='')
            first = False
        else:
            print(f" + {it}", end='')
    print(f" = {jumlah:,}")
else:
    print("Sorry, Tidak ada nilai yang bisa dijumlahkan ...")

if not_valid_value:
    print("not valid value")
    for it in not_valid_value:
        print(it)

print("done.") 