# import os

# def write_results(output_file_path, results):
#     # Write the results to the output file in CSV format
#     with open(output_file_path, 'w') as file:
#         file.write("NO, NIM, NAMA, BENAR, SALAH, SCORE, STATUS\n")
#         for result in results:
#             file.write(f"{result['no']}, {result['nim']}, {result['nama']}, {result['correct']}, {result['wrong']}, {result['score']}, {result['status']}\n")

# def sort_answers(input_file_path, output_file_path):
#     # Read, sort, and write answers to a temporary sorted file
#     with open(input_file_path, 'r') as file:
#         lines = file.readlines()

#     answers_with_numbers = [(int(line.split('.')[0]), line.split('.')[1].strip()) for line in lines if line.split('.')[0].isdigit()]
#     answers_with_numbers.sort(key=lambda x: x[0])

#     with open(output_file_path, 'w') as file:
#         for question_number, answer in answers_with_numbers:
#             file.write(f"{question_number}. {answer}\n")

# def grade_answers_case_insensitive(student_file_path, correct_answers):
#     # Sort student answers and compare with correct answers
#     sorted_student_file = "sorted_" + os.path.basename(student_file_path)
#     sort_answers(student_file_path, sorted_student_file)

#     with open(sorted_student_file, 'r') as file:
#         lines = file.readlines()

#     student_answers = [line.strip().upper() for line in lines]

#     correct = sum(1 for student_answer, correct_answer in zip(student_answers, correct_answers) if student_answer == correct_answer.upper())
#     wrong = len(correct_answers) - correct
#     score = correct * 5

#     # Remove the temporary sorted file
#     os.remove(sorted_student_file)

#     return correct, wrong, score

# def read_correct_answers(file_path):
#     # Read correct answers from the provided file
#     with open(file_path, 'r') as file:
#         lines = file.readlines()
#     return [line.strip().upper() for line in lines]

# def categorize_status(score, total_questions):
#     # Categorize status based on the score percentage
#     percentage = (score / (total_questions * 5)) * 100

#     if percentage >= 80:
#         return "Excellent"
#     elif percentage >= 60:
#         return "Good"
#     else:
#         return "Fail"

# def output_formatted_results(results):
#     # Print formatted results to the console
#     print("-" * 100)
#     print(f"{'NO': <4} | {'NIM': <11} | {'NAMA': <30} | {'BENAR': <8} | {'SALAH': <8} | {'SCORE': <6} | {'STATUS': <10}")
#     print("-" * 100)

#     for result in results:
#         print(f"{result['no']: <4} | {result['nim']: <10} | {result['nama']: <30} | {result['correct']: <8} | {result['wrong']: <8} | {result['score']: <6} | {result['status']: <10}")
#         print("-" * 100)

# def sort_results_by_score(results):
#     # Sort results by score in descending order
#     return sorted(results, key=lambda x: x['score'], reverse=True)

# def main():
#     # Main function to orchestrate the entire process
#     correct_answers = read_correct_answers("jawaban_quiz.txt")
#     total_questions = len(correct_answers)
#     results = []

#     for index, file_name in enumerate(sorted(os.listdir("jawaban/"))):
#         if file_name.endswith(".txt"):
#             full_path = os.path.join("jawaban/", file_name)

#             # Extract information from the filename
#             name_parts = file_name.split("_")
#             if len(name_parts) == 2 and name_parts[1].endswith(".txt"):
#                 nim = name_parts[1].split(".")[0]
#                 nama = name_parts[0]

#                 # Calculate the number of correct answers, mistakes, and score using case-insensitive comparison
#                 correct, wrong, score = grade_answers_case_insensitive(full_path, correct_answers)

#                 results.append({
#                     'no': index + 1, 
#                     'nim': nim,
#                     'nama': nama,
#                     'correct': correct,
#                     'wrong': wrong,
#                     'score': score,
#                     'status': categorize_status(score, total_questions)
#                 })
#             else:
#                 print(f"Skipping file {file_name} due to unexpected format.")

#     # Sort the results by score
#     sorted_results = sort_results_by_score(results)

#     # Write the sorted results to result.txt
#     write_results("result.txt", sorted_results)

#     # Output the formatted results to the console
#     output_formatted_results(sorted_results)

# if __name__ == "__main__":
#     main()



'''
write_results: Writes the results to the output file in CSV format.
sort_answers: Reads, sorts, and writes answers to a temporary sorted file.
grade_answers_case_insensitive: Sorts student answers and compares with correct answers, calculating correct, wrong, and score.
read_correct_answers: Reads correct answers from the provided file.
categorize_status: Categorizes status based on the score percentage.
output_formatted_results: Prints formatted results to the console.
sort_results_by_score: Sorts results by score in descending order.
main: Orchestrates the entire process, including reading files, calculating results, and outputting them.
'''

'''
Using Class
'''


import os

class QuizChecker:
    def __init__(self, quiz_file_path, answers_folder):
        self.correct_answers = self.read_correct_answers(quiz_file_path)
        self.total_questions = len(self.correct_answers)
        self.results = []

        self.answers_folder = answers_folder

    def write_results(self, output_file_path):
        with open(output_file_path, 'w') as file:
            file.write("NO, NIM, NAMA, BENAR, SALAH, SCORE, STATUS\n")
            for result in self.results:
                file.write(f"{result['no']}, {result['nim']}, {result['nama']}, {result['correct']}, {result['wrong']}, {result['score']}, {result['status']}\n")

    def sort_answers(self, input_file_path, output_file_path):
        with open(input_file_path, 'r') as file:
            lines = file.readlines()

        answers_with_numbers = [(int(line.split('.')[0]), line.split('.')[1].strip()) for line in lines if line.split('.')[0].isdigit()]
        answers_with_numbers.sort(key=lambda x: x[0])  #---->>> sort by taking the first index x[0] and use those to sort. e.g: 1. A   where the first index is 1, and the second index is A

        with open(output_file_path, 'w') as file:
            for question_number, answer in answers_with_numbers:
                file.write(f"{question_number}. {answer}\n")

    def grade_answers_case_insensitive(self, student_file_path):
        sorted_student_file = "sorted_" + os.path.basename(student_file_path)
        self.sort_answers(student_file_path, sorted_student_file)

        with open(sorted_student_file, 'r') as file:
            lines = file.readlines()

        student_answers = [line.strip().upper() for line in lines]

        correct = sum(1 for student_answer, correct_answer in zip(student_answers, self.correct_answers) if student_answer == correct_answer.upper())
        wrong = len(self.correct_answers) - correct
        score = correct * 5

        os.remove(sorted_student_file)

        return correct, wrong, score

    @staticmethod
    def read_correct_answers(file_path):
        with open(file_path, 'r') as file:
            lines = file.readlines()
        return [line.strip().upper() for line in lines]

    @staticmethod
    def categorize_status(score, total_questions):
        percentage = (score / (total_questions * 5)) * 100

        if percentage >= 80:
            return "Excellent"
        elif percentage >= 60:
            return "Good"
        else:
            return "Fail"

    def output_formatted_results(self):
        print("-" * 100)
        print(f"{'NO': <4} | {'NIM': <11} | {'NAMA': <30} | {'BENAR': <8} | {'SALAH': <8} | {'SCORE': <6} | {'STATUS': <10}")
        print("-" * 100)

        for result in self.results:
            print(f"{result['no']: <4} | {result['nim']: <10} | {result['nama']: <30} | {result['correct']: <8} | {result['wrong']: <8} | {result['score']: <6} | {result['status']: <10}")
            print("-" * 100)

    def sort_results_by_score(self):
        return sorted(self.results, key=lambda x: x['score'], reverse=True)

    def process_answers(self):
        for index, file_name in enumerate(sorted(os.listdir(self.answers_folder))):
            if file_name.endswith(".txt"):
                full_path = os.path.join(self.answers_folder, file_name)

                name_parts = file_name.split("_")
                if len(name_parts) == 2 and name_parts[1].endswith(".txt"):
                    nim = name_parts[1].split(".")[0]
                    nama = name_parts[0]

                    correct, wrong, score = self.grade_answers_case_insensitive(full_path)

                    self.results.append({
                        'no': index + 1, 
                        'nim': nim,
                        'nama': nama,
                        'correct': correct,
                        'wrong': wrong,
                        'score': score,
                        'status': self.categorize_status(score, self.total_questions)
                    })
                else:
                    print(f"Skipping file {file_name} due to unexpected format.")

    def run_quiz_check(self, output_file_path):
        self.process_answers()
        sorted_results = self.sort_results_by_score()
        self.write_results(output_file_path)
        self.output_formatted_results()


if __name__ == "__main__":
    quiz_checker = QuizChecker("jawaban_quiz.txt", "jawaban/")
    quiz_checker.run_quiz_check("result.txt")


