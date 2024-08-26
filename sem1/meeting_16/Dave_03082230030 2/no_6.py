def remove_duplicate(source_list: list):
   temp = set()
   index = 0
   count = 0
   while index < len(source_list):
      if source_list[index] not in temp:
         temp.add(source_list[index])
         index += 1
      else:
         source_list.pop(index)
         count+=1

   for i in range(count):
      source_list.append("_")

   return len(source_list) - count


if __name__ == "__main__":
   
   # don't change code in this main block
   
   nums = [1, 1, 2]

   print("test-1: input: nums =", nums)

   n = remove_duplicate(nums)

   print("        output:", n, ", nums =", nums)
   print()

   nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4]

   print("test-1: input: nums =", nums)

   n = remove_duplicate(nums)

   print("        output:", n, ", nums =", nums)
   print()

   nums = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4]

   print("test-1: input: nums =", nums)

   n = remove_duplicate(nums)

   print("        output:", n, ", nums =", nums)
   print()


