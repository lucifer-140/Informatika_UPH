

# filename = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/daftar_nama_peserta.txt'


# try :
#     with open(filename, "r") as file :
#         file_content = file.readlines()
#     file_content = sorted(file_content)
#     for i in range(len(file_content)):
#         file_content[i] = f"{i+1:2 }.{file_content[i]}"
#     with open(filename, "w") as file :
#         file.writelines(file_content)
#     print("done. ")
# except Exception as e :
#     print(f'Error : {e}')



filename = '/Users/lucy/Developer/Projects/IntroAlgo/meeting_14/daftar_nama_peserta.txt'

try:
    with open(filename, 'r') as file:
        file_content = file.readlines()

    file_content.sort()

    for i in range(len(file_content)):
        file_content[i] = f"{i+1:2}.{file_content[i]}"

    with open(filename, 'w') as file:
        file.writelines(file_content)

    print("done.")
except Exception as e:
    print(f'Error: {e}')
