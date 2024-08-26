# Name : Dave Jansen Ongkaputra
# Nim  : 03082230030
#

# perhatian: 
# 1. anda hanya boleh mengganti bagian None dengan kode anda [inject dengan list comprehension], 
# 2. menambah fungsi jika diperlukan
# 3. statement print tidak boleh diganti isinya 


#Function
def ListData(data):
    return ["genap" if int(datas) % 2 == 0 else "ganjil" for datas in data]


def isPrime(data):
    return [datas for datas in data if datas > 1 and all(datas % i != 0 for i in range(2, int(datas ** 0.5) + 1))]


def OddLessThanFive(data):
    return [datas for datas in data if datas % 2 != 0 and datas <= 5]


# diketahui 

data_1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

print(f"data_1:", data_1)

# 1

data_output_1 = None 
data_output_1 = zip(data_1, ListData(data_1))

print()
print("data_output_1:", tuple(data_output_1))

# 2

data_output_2 = None 
data_output_2 = isPrime(data_1)

print()
print("data_output_2:", data_output_2)

# 3

data_output_3 = None
data_output_3 = OddLessThanFive(data_1)

print()
print("data_output_3:", data_output_3)
