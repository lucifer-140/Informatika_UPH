import re

def create_update_file():
    name = input("Enter name: ")
    nim = input("Enter NIM: ")

    print("Enter jawaban dalam format {no soal}. {jawaban}. Enter 'done' ketika finished.")
    
    answers = {}
    while True:
        answer_input = input()
        if answer_input.lower() == 'done':
            break

        match = re.match(r'^(\d+)\.\s*([A-Za-z])$', answer_input)
        if match:
            number, answer = match.groups()
            answers[int(number)] = answer
        else:
            print("Invalid input format. Use {no soal}. {jawaban} format.")

    sorted_answers = sorted(answers.items())

    file_name = f"{name}_{nim}.txt"
    with open(file_name, 'w') as file:
        for number, answer in sorted_answers:
            file.write(f"{number}. {answer}\n")

    print(f"File '{file_name}' created/updated successfully.")

if __name__ == "__main__":
    create_update_file()
