def remove_num(source_list: list, x: int):
   count = 0  
   for i in range(len(source_list) - 1, -1, -1):
      if source_list[i] == x:
         source_list.pop(i)
         count += 1
   for i in range (count):
      source_list.append("_")
   return count





if __name__ == "__main__":
   
   # don't change code in this main block

   nums = [3, 2, 2, 3]
   val = 3

   n = remove_num(nums, val)

   print(">>> input (test-1):")
   print()
   print("nums =", nums, ", val =", val)
   print()
   print("output:", n, ", nums =", nums)
   print()

   nums = [0, 1, 2, 2, 3, 0, 4, 2]
   val = 2

   n = remove_num(nums, val)

   print(">>> input (test-2):")
   print()
   print("nums =", nums, ", val =", val)
   print()
   print("output:", n, ", nums =", nums)
   print()

   nums = [1, 2, 3, 1, 2, 3, 1, 2, 3, 4]
   val = 2

   n = remove_num(nums, val)

   print(">>> input (test-3):")
   print()
   print("nums =", nums, ", val =", val)
   print()
   print("output:", n, ", nums =", nums)