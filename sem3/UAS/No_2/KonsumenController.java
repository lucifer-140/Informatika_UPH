package UAS.No_2;

import java.util.HashMap;
import java.util.Map;

public class KonsumenController {

    private final Map<String, String> kodeKonsumenToNama;
    private final Map<String, Boolean> kodeKonsumenToIsMember;

    public KonsumenController() {
        kodeKonsumenToNama = new HashMap<>();
        kodeKonsumenToIsMember = new HashMap<>();
        initializeData();
    }

    private void initializeData() {
        kodeKonsumenToNama.put("UPH0101", "Dave");
        kodeKonsumenToNama.put("UPH0000", "Harry");
        kodeKonsumenToNama.put("UPH0100", "James");

        kodeKonsumenToIsMember.put("UPH0101", true);
        kodeKonsumenToIsMember.put("UPH0000", false);
        kodeKonsumenToIsMember.put("UPH0100", true);
    }

    public Map<String, String> getKodeKonsumenToNama() {
        return kodeKonsumenToNama;
    }

    public Map<String, Boolean> getKodeKonsumenToIsMember() {
        return kodeKonsumenToIsMember;
    }
}
