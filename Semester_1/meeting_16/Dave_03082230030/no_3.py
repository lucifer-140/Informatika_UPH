def split_list_items(source_list: list, x: int):
   lsMin = []
   lsMax = []

   for item in source_list:
      if item <= x:
         lsMin.append(item)
      else:
         lsMax.append(item)

   if not lsMin:
      return None, lsMax
   elif not lsMax:
      return lsMin, None  
   else:
      return lsMin, lsMax



if __name__ == "__main__":

   # don't change code in this main block
   
   data = [1, 2, 7, 3, 4, 3, 6, 5, 7]
   x = 3

   list_1, list_2 = split_list_items(data, x)

   print(">>>input (test-1):")
   print()
   print("data =", data)
   print("x =", x)
   print()
   print("output:")
   print("list-1 =", list_1)
   print("list-2 =", list_2)

   print()

   data = [9, 3, 6, 7, 5, 4, 10]
   x = 2

   list_1, list_2 = split_list_items(data, x)

   print(">>> input (test-2):")
   print()
   print("data =", data)
   print("x =", x)
   print()
   print("output:")
   print("list-1 =", list_1)
   print("list-2 =", list_2)

   print()

   data = [1, 2, 3, 4, 5]
   x = 10

   list_1, list_2 = split_list_items(data, x)

   print(">>> input (test-3):")
   print()
   print("data =", data)
   print("x =", x)
   print()
   print("output:")
   print("list-1 =", list_1)
   print("list-2 =", list_2)

   print()

   data = [1, 2, 3, 4, 5, 2, 3, 4, 5]
   x = 3

   list_1, list_2 = split_list_items(data, x)

   print(">>> input (test-4):")
   print()
   print("data =", data)
   print("x =", x)
   print()
   print("output:")
   print("list-1 =", list_1)
   print("list-2 =", list_2)

