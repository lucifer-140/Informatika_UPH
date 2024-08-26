from random import shuffle

def search_item_at(data, index):
    if index <= len(data):
        return data[index]
    else:
        return None

def search_index(data, value):
    if 1 <= len(data):
        for i in range(0, len(data)):
            if data[i] == value :
                return i
    else:
        return None

def search_rindex(data, value):
    biggest_value = None
    if 1 <= len(data):
        for i in range(len(data)):
            if data[i] >= value:
                biggest_value = i
    else:
        return None

    return biggest_value
        
if __name__ == "__main__":


    RandomData = [i for i in range(1, 11)]
    print("RandomData: ", RandomData)
    shuffle(RandomData)
    print("Shuffled RandomData: ", RandomData)

 
    x = int(input("Enter the value to search: "))

    result_1 = search_index(RandomData, x)
    result_2 = search_rindex(RandomData, x)

    index = int(input("Enter the index: "))
    result_3 = search_item_at(RandomData, index)

    if result_1 is not None:
        print(f"item {x} ditemukan dalam list pada index: {result_1}")
    else:
        print(f"item {x} tidak ditemukan dalam list")

    if result_2 is not None:
        print(f"index terbesar dari item {x} ditemukan pada index: {result_2}")
    else:
        print(f"item {x} tidak ditemukan dalam list")

    if result_3 is not None:
        print(f"data pada index: {index} dalam list adalah: {result_3}")
    else:
       print(f"index {index} tidak valid ...")
