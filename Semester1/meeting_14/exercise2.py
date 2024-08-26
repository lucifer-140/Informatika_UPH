def merge_and_number_names(input_file_1, input_file_2, output_file):
   
    with open(input_file_1, 'r') as file_1, open(input_file_2, 'r') as file_2:
        names_1 = file_1.readlines()
        names_2 = file_2.readlines()

    names_1 = [name.strip() for name in names_1]
    names_2 = [name.strip() for name in names_2]

    unique_names = sorted(set(names_1 + names_2))
    numbered_names = [(f'{i+1}. {name.strip()}\n') for i, name in enumerate(unique_names)]

    with open(output_file, 'w') as file:
        file.writelines(numbered_names)

    print(f'File {output_file} berhasil dibuat dengan nama yang unik, terurut, dan nomor urut.')




input_file_1 = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/source_1.txt'
input_file_2 = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/source_2.txt'
output_file = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/output.txt'
merge_and_number_names(input_file_1, input_file_2, output_file)



