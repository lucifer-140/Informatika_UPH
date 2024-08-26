from random import randint

# data source 
data = [randint(1, 100) for _ in range(10)]

print("data source:", data)

# imperative
result = []

for el in data:
    result.append(el ** 2)

print("hasil el^2:", result)

# list comprehension
result = [el**2 for el in data]
print("hasil el^2:", result)

#declarative code
result = list(map(lambda el: el**2, data))
print("hasil el^2:", result)