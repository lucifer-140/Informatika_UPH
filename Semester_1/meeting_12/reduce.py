# data

data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

# imperative

result = 0

for el in data:
    result += el

print("jumlah keseluruhan data = ", result)

#declarative

# fungsi reduce harus diimport terlebih dahulu dari modul functools
from functools import reduce

result = reduce(lambda a, b: a + b, data) 
print("jumlah keseluruhan data =", result)