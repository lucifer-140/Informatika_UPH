n = str(input("string: ").upper())

count_alpha = [0] * 26

for word in n:
    if word.isalpha():
        index = ord(word) - ord('A')
        count_alpha[index] += 1

max_values = max(count_alpha)
max_keys = [chr(i + ord('A')) for i, score in enumerate(count_alpha) if score == max_values]

col_1 = [f"{chr(i + ord('A'))} : {count_alpha[i]}" for i in range(10)]
col_2 = [f"{chr(i + ord('A'))} : {count_alpha[i]}" for i in range(10, 20)]
col_3 = [f"{chr(i + ord('A'))} : {count_alpha[i]}" for i in range(20, 26)]

max_length = max(len(col_1), len(col_2), len(col_3))
col_1 += [''] * (max_length - len(col_1))
col_2 += [''] * (max_length - len(col_2))
col_3 += [''] * (max_length - len(col_3))

for a, b, c in zip(col_1, col_2, col_3):
    print(f"\n{a}\t{b}\t{c}")

print(f"\nMost frequently occurring character(s): {', '.join(max_keys)} [{max_values}x]")
