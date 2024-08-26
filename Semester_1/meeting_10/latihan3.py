n = str(input("string: ").upper())
StringToDict = dict()

for word in n:
    if word.isalpha():
        if word in StringToDict.keys():
            StringToDict[word] += 1
        else:
            StringToDict[word] = 1

CompleteAlpha = {chr(65 + i): StringToDict.get(chr(65 + i), 0) for i in range(26)}

max_values = max(CompleteAlpha.values())
max_keys = [word for word, score in CompleteAlpha.items() if score == max_values]


col_1 = [f"{k} : {v}" for k, v in CompleteAlpha.items() if 'A' <= k <= 'J']
col_2 = [f"{k} : {v}" for k, v in CompleteAlpha.items() if 'K' <= k <= 'T']
col_3 = [f"{k} : {v}" for k, v in CompleteAlpha.items() if 'U' <= k <= 'Z']

max_length = max(len(col_1), len(col_2), len(col_3))
col_1 += [''] * (max_length - len(col_1))
col_2 += [''] * (max_length - len(col_2))
col_3 += [''] * (max_length - len(col_3))

for a, b, c in zip(col_1, col_2, col_3):
    print(f"\n{a}\t{b}\t{c}")

print(f"\nKarakter paling sering muncul: {', '.join(max_keys)} [{max_values}x] ")
