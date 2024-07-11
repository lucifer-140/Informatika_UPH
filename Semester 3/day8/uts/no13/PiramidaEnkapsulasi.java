package day8.uts.no13;




public class PiramidaEnkapsulasi {

	
	private double PanjangAlas;
	private double Tinggi;
	
	PiramidaEnkapsulasi(double PanjangAlas,double Tinggi){
		this.setPanjangAlas(PanjangAlas);
		this.setTinggi(Tinggi);
	}
	
	public double getPanjangAlas() {
		return this.PanjangAlas;
	}
	
	public double getTinggi() {
		return this.Tinggi;
	}
	
	
	public void setPanjangAlas(double PanjangAlas) {
		this.PanjangAlas = PanjangAlas;
	}
	
	public void setTinggi(double Tinggi) {
		this.Tinggi = Tinggi;
	}
	
	public double luasAlas(){
		return PanjangAlas*PanjangAlas;
	}
		
}