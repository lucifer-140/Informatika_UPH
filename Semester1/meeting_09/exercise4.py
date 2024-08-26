import random

class GameOver(Exception):
    pass

def main():
    
    while True:
        try:
            Game()
        except GameOver as e:
            print(e)

        play_again = input("Continue (y/n): ")
        if play_again.lower() == 'n':
            break


def Game():
    rand_number = random.randint(1, 10)
    attempts = 3
    count = 1

    print("\nAngka teracak = x")

    while attempts > 0:
        try:
            n = int(input(f"Angka tebakan anda [ Percobaan ke {count}] ? "))

            if n < 1 or n > 10:
                raise ValueError("Angka harus antara 1 dan 10")

            if n == rand_number:
                print("Yes, You Win")
                raise GameOver("Permainan selesai")
            elif n < rand_number:
                print("nay, angka tebakan anda terlalu rendah ...")
            else:
                print("nay, angka tebakan anda terlalu tinggi ...")

            attempts -= 1
            count += 1

        except ValueError as e:
            print(e)

    raise GameOver("sorry, You LOSE ...")

if __name__ == "__main__":
    main()
