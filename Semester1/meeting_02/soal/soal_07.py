#untuk input
ekspresi = input("Masukkan ekspresi matematika : ")

#ganti ekspresi matematika ke angka
ekspresi = ekspresi.replace("satu", "1")
ekspresi = ekspresi.replace("dua", "2")
ekspresi = ekspresi.replace("tiga", "3")
ekspresi = ekspresi.replace("empat", "4")
ekspresi = ekspresi.replace("lima", "5")
ekspresi = ekspresi.replace("enam", "6")
ekspresi = ekspresi.replace("tujuh", "7")
ekspresi = ekspresi.replace("delapan", "8")
ekspresi = ekspresi.replace("sembilan", "9")
ekspresi = ekspresi.replace("sepuluh", "10")
ekspresi = ekspresi.replace("nol", "0")

#ganti ekspresi matematika ke operator
ekspresi = ekspresi.replace("ditambah", "+")
ekspresi = ekspresi.replace("dikurang", "-")
ekspresi = ekspresi.replace("dikali", "*")
ekspresi = ekspresi.replace("dibagi", "/")
ekspresi = ekspresi.replace("dipangkat", "**")
ekspresi = ekspresi.replace("sisa bagi", "%")
ekspresi = ekspresi.replace("dibagi bulat", "//")

#eval() untuk menyelesaikan operasi mtk dalam bentuk string 
hasil = eval(ekspresi)
print("hasil :", hasil)

