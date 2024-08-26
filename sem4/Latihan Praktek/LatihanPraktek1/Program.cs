namespace LatihanPraktek1
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Bentuk? ");
            String shape = Console.ReadLine();

            switch (shape)
            {
                case "Persegi Panjang":
                    Console.Write("Panjang? ");
                    int panjang = int.Parse(Console.ReadLine());
                    Console.Write("Lebar? ");
                    int lebar = int.Parse(Console.ReadLine());
                    Console.WriteLine("Luas: " + (panjang * lebar));
                    Console.WriteLine("Perimeter: " + (2 * (panjang + lebar)));
                    break;
                case "Bujur sangkar":
                    Console.Write("Sisi? ");
                    int sisi = int.Parse(Console.ReadLine());
                    Console.WriteLine("Luas: " + (sisi * sisi));
                    Console.WriteLine("Perimeter: " + (4 * sisi));
                    break;
                case "Lingkaran":
                    Console.Write("Jari-jari? ");
                    int jariJari = int.Parse(Console.ReadLine());
                    double luas = Math.PI * jariJari * jariJari;
                    double keliling = 2 * Math.PI * jariJari;
                    Console.WriteLine("Luas: " + luas);
                    Console.WriteLine("Perimeter: " + keliling);
                    break;
                default:
                    Console.WriteLine(shape + " is not a recognized shape!");
                    break;
            }

            Console.ReadKey();
        }
    }
}