package UAS.No_1;

public class NilaiMurid {
    private double tugas;
    private double kuis;
    private double uts;
    private double uas;
    private double kehadiran;

    public NilaiMurid(double tugas, double kuis, double uts, double uas, double kehadiran) {
        this.tugas = tugas;
        this.kuis = kuis;
        this.uts = uts;
        this.uas = uas;
        this.kehadiran = kehadiran;
    }

    public double HitungNilaiAkhir() {
        return (tugas * 0.15) + (kuis * 0.10) + (uts * 0.30) + (uas * 0.35) + (kehadiran * 0.10);
    }

    public String HitungGrade(double finalScore) {
        if (finalScore >= 85) {
            return "A";
        } else if (finalScore >= 70) {
            return "B";
        } else if (finalScore >= 55) {
            return "C";
        } else if (finalScore >= 40) {
            return "D";
        } else {
            return "E";
        }
    }

    public String HitungStatus(double finalScore) {
        if (finalScore >= 55) {
            return "Lulus";
        } else {
            return "Tidak Lulus";
        }
    }
}