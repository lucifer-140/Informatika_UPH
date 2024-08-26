namespace LatihanPraktek3
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Input sebuah nilai numeric? ");
            int nilai = int.Parse(Console.ReadLine());
            
            Console.WriteLine(isEven(nilai) ? nilai+ " adalah bilangan genap" : nilai+" adalah bilangan ganjil");
            Console.WriteLine(IsPrime(nilai) ? nilai+ " adalah bilangan prima" : nilai+" bukan bilangan prima");


            Console.ReadKey();
        }

        static bool IsPrime(int number)
        {
            if (number <= 1) return false;
            if (number == 2) return true; 

            for (int i = 2; i <= Math.Sqrt(number); i++)
            {
                if (number % i == 0) return false;
            }

            return true;
        }

        static bool isEven(int number)
        {
            return (number % 2 == 0);
        }
    }
}