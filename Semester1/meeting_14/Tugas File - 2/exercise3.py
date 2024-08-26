import json
import csv
from getpass import getpass
from datetime import datetime

def load_user_data(json_file, csv_file):
   
    with open(json_file, 'r') as json_file:
       users = json.load(json_file)

    with open(csv_file, 'r') as csv_file:
       reader = csv.reader(csv_file, delimiter=';')
       next(reader) 
       levels = {int(row[0]): row[1] for row in reader}

    return users, levels

def login(users, levels):
   
    while True:
        user_id = input('Id? ')
        password = getpass('Password? ')

        user = next((u for u in users if u['Id'] == user_id), None)

        if user and user['Password '] == password:
            level_desc = levels[user['LevelId']]
            login_name = user['Nama']
            login_time = datetime.now().strftime('%d/%m/%Y %H:%M:%S')
            print(f'Login berhasil. Hi, {login_name} [{level_desc}], LogIn at {login_time}')
            return user
        else:
            print('Gagal login. Id atau password salah.')

def show_users(users, levels):
   
    header = f"{'-' * 104}\n{'Id': <15} | {'Nama': <30} | {'Level Description': <30} | {'Created On': <25}\n{'-' * 104}"

    print(header)
    for user in users:
        level_desc = levels[user['LevelId']]
        created_on = user['CreatedOn']
        print(f"{user['Id']: <15} | {user['Nama']: <30} | {level_desc: <30} | {created_on: <25}")
    
    print('-' * 104)

def main():
   
    user_json = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/user_json_1.json'
    user_level_csv = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/user_level.csv'

    users, levels = load_user_data(user_json, user_level_csv)

    while True:
        user = login(users, levels)
        while True:
            print("\nMenu:")
            print("1. Show users")
            print("2. Logout")
            print("3. Exit program")
            choice = input("Pilih menu (1/2/3): ")

            if choice == '1':
                show_users(users, levels)
            elif choice == '2':
                print(f'{user["Nama"]} berhasil logout.\n')
                break
            elif choice == '3':
                print('Terima kasih! Sampai jumpa lagi.')
                exit()
            else:
                print('Pilihan tidak valid. Silakan masukkan 1, 2, atau 3.')

if __name__ == "__main__":
    print("\033c")
    main()
