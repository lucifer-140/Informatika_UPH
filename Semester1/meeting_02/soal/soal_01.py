A = int(input("A = "))
B = int(input("B = "))

temp = 0

temp = A
A = B
B = temp

print("A = ", A, ", B = ", B, sep='')
