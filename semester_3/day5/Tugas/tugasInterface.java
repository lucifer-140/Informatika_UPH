package day5.Tugas;

// Interface:
// MacOS dan WindowsOS -> Mendefinisikan kemampuan spesifik platform terkait game Steam

// Class:
// MacBook -> Inherit dri MacOS, menjelaskan bahwa MacBook tidak bisa menjalankan game Steam secara native
// GamingPC -> inherit dri WindowsOS, menjelaskan bahwa GamingPC bisa menjalankan game Steam

// Method:
// cantPlaySteamGames() dan canPlaySteamGames() -> Tidak mengembalikan nilai maka "void", menunjukkan aksi spesifik platform

// Main Class:
// Membuat objek MacBook dan GamingPC.
// Mendeklarasikan variabel macDevice (utk MacOS) dan windowsDevice (utk WindowsOS).
// Menugaskan objek ke variabel dengan tipe interface yang sesuai (polymorphism).
// Memanggil method dari interface, yang akan menjalankan implementasi sesuai platform.

interface MacOS {
    void cantPlaySteamGames(); 
}

interface WindowsOS {
    void canPlaySteamGames();
}


class MacBook implements MacOS {
    @Override
    public void cantPlaySteamGames() {
        System.out.println("Steam is not supported on macOS...\n");
    }
}

class GamingPC implements WindowsOS {
    @Override
    public void canPlaySteamGames() {
        System.out.println("Launching Steam games...\n");
    }
}

class SuperComputer implements MacOS, WindowsOS {
    @Override
    public void cantPlaySteamGames() {
        System.out.println("Current OS is MacOS...\nChange your OS into WindowsOS\n");
    }

    @Override
    public void canPlaySteamGames() {
        System.out.println("Current OS is WindowsOS...\nLaunching Steam games...\n");
    }
}

public class tugasInterface {
    public static void main(String[] args) {
        MacBook mac = new MacBook();
        GamingPC pc = new GamingPC();
        SuperComputer op = new SuperComputer();

        MacOS macDevice = mac;
        WindowsOS windowsDevice = pc;
        SuperComputer superDevice = op;

        macDevice.cantPlaySteamGames();
        windowsDevice.canPlaySteamGames();
        superDevice.canPlaySteamGames();
        superDevice.cantPlaySteamGames();
    }
}






