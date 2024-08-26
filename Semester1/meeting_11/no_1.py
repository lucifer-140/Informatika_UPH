# Name : Dave Jansen Ongkaputra
# Nim  : 03082230030


import os
# import - if any 



# function definition - if any
def check_type(x):
   if x.isnumeric():
      if '.' in x:
            print(x, "is a number (float)")
      else:
         print(x, "is a number (int)")
   elif x == "":
      print("sorry, no input ...")
   else:
      print(x, "is not a number")
    

if __name__ == "__main__":
   
   while True:

      os.system("clear") # change to clear on mac/linux

      # input 
      n = input("n ? ")
      # checking and output 
      check_type(n)
      while True:
         repeat = input("repeat again (y/n) ? ")
         if repeat in ("y", "n"):
            break

      if repeat == "n":
         break
      

print()
print("--- *** Bye *** ---")