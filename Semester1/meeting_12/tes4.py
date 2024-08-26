from functools import reduce

def is_prime(num):
    if num < 2:
        return False
    for i in range(2, int(num**0.5) + 1):
        if num % i == 0:
            return False
    return True


data = [i for i in range(1, 11)]

print("\033c")


result_lambda = list(map(lambda el: el if is_prime(el) else None, data))
result_lambda = list(filter(None, result_lambda))  
result_lambda = reduce(lambda acc, el: acc + [el], result_lambda, [])



print("prime:", result_lambda)