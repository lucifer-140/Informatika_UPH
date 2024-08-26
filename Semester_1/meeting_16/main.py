def hitung(*items):
    total = 0
    for item in items:
        total += item
    return total

if __name__ == "__main__":
    data = [1, 2, 3, True, 4, 5, False]
    print(hitung(*data))