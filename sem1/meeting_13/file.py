import os
from datetime import datetime

file_name = "daftar_peserta.txt"

def write_to_file(nama):
    try:
        with open(file_name, "a") as file:
            file.write(f"{nama}, created on: {datetime.now().strftime('%x %X')}\n")
        return True
    except Exception as e:
        print("Err:", e)
        return False

def get_string(prompt):
    while True:
        input_str = input(prompt)
        if input_str.strip() != "":
            return input_str

def get_int(prompt):
    while True:
        try:
            n = int(input(prompt))
            return n
        except ValueError:
            print("err: input anda tidak valid ...")

if __name__ == "__main__":
    while True:
        os.system("clear")
        print("...::: MENU :::...")
        print("__________________")
        print("1. Add New")
        print("2. Print Data")
        pilihan = get_int("Menu ? ")
        if pilihan == 1: 
            nama = get_string("Nama ? ")
            if write_to_file(nama):
                print(f"item nama: {nama} added")
            input("Press enter to continue...")
        elif pilihan == 2: 
            try:
                with open(file_name, "r") as file:
                    baca = file.readlines()
                    for item in baca:
                        print(item, end="")
            except FileNotFoundError:
                print(f"File '{file_name}' not found.")
            input("Press enter to continue...")
        else:
            print("err: menu not found...")
            input("Press enter to continue...")
