import random

totalAll = 0
MaxInt = 0
MinInt = 0
lsAll = set()

while len(lsAll) < 20:
    n = random.randint(1, 100)

    if n not in lsAll:
        totalAll += n
        lsAll.add(n)
        for i in lsAll:
            if i > MaxInt:
                MaxInt = i
            if i < MinInt:
                MinInt = i

print("List of random values: ")
print(",".join(map(str, lsAll)))
print("Total sum of values: ", totalAll)
print("Maximum value: ", MaxInt)
print("Minimum value: ", MinInt)

lsAll = list(lsAll)

for i in range(len(lsAll)):
    min_value = i
    for j in range(i + 1, len(lsAll)):
        if lsAll[j] < lsAll[min_value]:
            min_value = j
    if min_value != i:
        lsAll[min_value], lsAll[i] = lsAll[i], lsAll[min_value]

print("Sorted List: ")

print(",".join(map(str, lsAll)))
