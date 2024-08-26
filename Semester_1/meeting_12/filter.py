import random

def is_genap (n):
    return n % 2 == 0

data = [random.randint(1, 100) for _ in range(10)]

print(data)

#imperative code

result = [] 
for el in data: 
    if el % 2: result.append(el)

print("data ganjil:", result)

#list comprehension

result = [el for el in data if el % 2 != 0] 
print("data ganjil:", result)

# declarative

result = list(filter(lambda el: el % 2, data)) 
print("data ganjil:", result)