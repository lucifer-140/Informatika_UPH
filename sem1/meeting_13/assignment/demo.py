import os
import csv

file_path = "source.csv"

def load_csv():
    with open(file_path, newline='') as file:
        csv_reader = csv.reader(file)
        header = next(csv_reader)
        data = list(csv_reader)
        tidy_table = [dict(zip(header, row)) for row in data]
        return header, tidy_table

def display_all_data():
    header, data = load_csv()

    if not data:
        print("No data to display.")
        return

    column_widths = [max(len(str(row[col])) for row in data) for col in header]

    print("\n" + "-" * (sum(column_widths) + 10 * len(column_widths) + 10))  
    print(f"No. ", end=" ")
    for i, col in enumerate(header):
        print(f"{col.ljust(column_widths[i] + 10)}", end=" ")  
    print("\n" + "-" * (sum(column_widths) + 10 * len(column_widths) + 10))  

    for i, row in enumerate(data, start=1):
        print(f"{i}".ljust(4), end=" ")
        for j, col in enumerate(header):
            print(f"{str(row[col]).ljust(column_widths[j] + 10)}", end=" ")  
        print()

    print("-" * (sum(column_widths) + 10 * len(column_widths) + 10)) 
    print(f"{len(data)} Records")

def search_by_name():
    os.system("clear")

    header, data = load_csv()
    print("   ::: Cari Berdasarkan Nama :::  ")
    print("___________________________________\n")
    name = get_string("Nama ? ")

    if name.lower() == 'all':
        display_all_data()
        return

    found = [row for row in data if row[header[1]].lower().startswith(name.lower())]
    
    if found:
        display_manual_table(header, found)
    else:
        print(f"sorry, data nama {name} tidak ditemukan ...")

def search_by_value():
    os.system("clear")

    header, data = load_csv()
    print("   ::: Cari Berdasarkan Nilai :::  ")
    print("____________________________________\n")
    value = get_int("Nilai ? ")
    
    found = [row for row in data if int(row[header[2]]) == value]
    if found:
        display_manual_table(header, found)
    else:
        print(f"sorry, data nilai {value} tidak ditemukan ...")

def display_manual_table(header, data):
    print("\n" + "-" * (17 * len(header)))
    print("No. ", end=" ")
    for col in header:
        print(f"{col.ljust(15)}", end=" ")
    print("\n" + "-" * (17 * len(header)))

    for i, row in enumerate(data, start=1):
        print(f"{i}".ljust(4), end=" ")
        for col in header:
            print(f"{str(row[col]).ljust(15)}", end=" ")
        print()

    print("-" * (17 * len(header)))
    print(f"{len(data)} Records")

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
            print("Error: Input tidak valid...")

if __name__ == "__main__":
    while True:
        os.system("clear")
        print("   ... ::: MENU ::: ...  ")
        print("__________________________\n")
        print("1. Tampilkan semua data")
        print("2. Cari berdasarkan nama")
        print("3. Cari berdasarkan nilai")
        print("__________________________\n")
        pilihan = get_int("Menu ? ")
        if pilihan == 1:
            display_all_data()
            input("Press any key to continue . . .")
        elif pilihan == 2:
            search_by_name()
            input("Press any key to continue . . .")
        elif pilihan == 3:
            search_by_value()
            input("Press any key to continue . . .")
        else:
            print("Error: Menu tidak ditemukan . . .")
            input("Press any key to continue . . .")

