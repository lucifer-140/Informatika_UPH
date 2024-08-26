x, y, z = input("x, y, z= ").split()

if(x > y and x > z):
    print("x adalah bilangan terbesar")
elif(y > z):
    print("y adalah bilangan terbesar")
else:
    print("z adalah bilangan terbesar")