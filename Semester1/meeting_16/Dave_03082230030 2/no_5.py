def rotate_list_item(source_list: list, k: int):
   n = len(source_list)
   k = k % n 
   source_list[:] = source_list[-k:] + source_list[:-k]


if __name__ == "__main__":
   
   # don't change code in this main block
   
   data = [1, 2, 3, 4, 5]
   k = 2

   print("test-1: input =", data, ", k =", k)

   rotate_list_item(data, k)

   print("        output =", data)
   print()

   data = [0, 1, 2]
   k = 4
   
   print("test-2: input =", data, ", k =", k)

   rotate_list_item(data, k)

   print("        output =", data)
   print()

   data = [5, 3, 7, 9]
   k = 5
   
   print("test-3: input =", data, ", k =", k)

   rotate_list_item(data, k)

   print("        output =", data)