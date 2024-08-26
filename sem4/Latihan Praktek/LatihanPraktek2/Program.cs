namespace LatihanPraktek2
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Input sebuah nilai numeric ? ");
            int nilai = int.Parse(Console.ReadLine());

            Console.WriteLine(nilai % 2 == 0 ? nilai+ " adalah bilangan genap" : nilai+" adalah bilangan ganjil");
            
            Console.ReadKey();
        }
    }
}
