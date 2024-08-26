# def fibonacci(n):
#     if n <= 0:
#         return "Invalid input. Please provide a non-negative integer."
#     elif n == 1 or n == 2:
#         return 1
#     else:
#         return fibonacci(n - 1) + fibonacci(n - 2)


# if __name__ == '__main__':

#     n = 6
#     result = fibonacci(n)

#     for i in range(1, n+1):
#         print(f"Fibo({i}) = {fibonacci(i):,}")

#     print(f"\nThe {n}-th Fibonacci number is: {result}")


def fibonacci_memo(n, memo={}):
    if n <= 0:
        return "Invalid input. Please provide a non-negative integer."
    elif n == 1 or n == 2:
        return 1
    elif n in memo:
        return memo[n]
    else:
        result = fibonacci_memo(n - 1, memo) + fibonacci_memo(n - 2, memo)
        memo[n] = result
        return result

if __name__ == '__main__':

    n = 100
    result = fibonacci_memo(n)

    for i in range(1, n + 1):
        print(f"Fibo({i}) = {fibonacci_memo(i):,}")

    print(f"\nThe {n}-th Fibonacci number is: {result}")
