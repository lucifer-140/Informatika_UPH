def sort_and_number_names(input_file, output_file):
   
   with open(input_file, 'r') as file:
       lines = file.readlines()

   sorted_names = sorted(lines)

   numbered_names = [(f'{i+1}. {name.strip()}\n') for i, name in enumerate(sorted_names)]

   with open(output_file, 'w') as file:
       file.writelines(numbered_names)

   print(f'File {output_file} berhasil dibuat dengan nama peserta yang terurut dan nomor urut.')




input_file = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/daftar_nama_peserta.txt'
output_file = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/daftar_nama_peserta_urut.txt'