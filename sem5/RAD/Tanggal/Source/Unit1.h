//---------------------------------------------------------------------------

#ifndef Unit1H
#define Unit1H
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <FMX.Controls.hpp>
#include <FMX.Forms.hpp>
#include <FMX.Controls.Presentation.hpp>
#include <FMX.StdCtrls.hpp>
#include <FMX.Types.hpp>
#include <FMX.DateTimeCtrls.hpp>
#include <FMX.Edit.hpp>
//---------------------------------------------------------------------------
UnicodeString NamaBulan[13]={"", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
			  "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"};
class TForm1 : public TForm
{
__published:	// IDE-managed Components
	TLabel *Label1;
	TDateEdit *DatePicker;
	TLabel *LblTgl1;
	TLabel *LblTgl2;
	TLabel *Label3;
	TEdit *TxtTgl;
	TEdit *TxtThn;
	TEdit *TxtBln;
	TButton *BtnAmbil;
	TButton *BtnUbah;
	void __fastcall BtnAmbilClick(TObject *Sender);
	void __fastcall BtnUbahClick(TObject *Sender);
private: 	// User declarations
	TDate Tanggal;
	unsigned short Tgl, Bln, Thn;
public:		// User declarations
	__fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif



