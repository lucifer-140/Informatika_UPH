//---------------------------------------------------------------------------

#ifndef Unit1H
#define Unit1H
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <FMX.Controls.hpp>
#include <FMX.Forms.hpp>
#include <FMX.Controls.Presentation.hpp>
#include <FMX.Memo.hpp>
#include <FMX.Memo.Types.hpp>
#include <FMX.ScrollBox.hpp>
#include <FMX.StdCtrls.hpp>
#include <FMX.Types.hpp>
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// IDE-managed Components
	TPanel *PMakanan;
	TLabel *Label1;
	TCheckBox *ChkNasi;
	TCheckBox *ChkAyam;
	TCheckBox *ChkSayur;
	TPanel *PMinuman;
	TLabel *Label2;
	TCheckBox *RBAir;
	TCheckBox *RBJus;
	TCheckBox *RBKopi;
	TButton *BtnPesan;
	TButton *BtnKosongkan;
	TMemo *TxtPesanan;
	void __fastcall ChkNasiChange(TObject *Sender);
	void __fastcall ChkAyamChange(TObject *Sender);
	void __fastcall ChkSayurChange(TObject *Sender);
	void __fastcall RBAirChange(TObject *Sender);
	void __fastcall RBJusChange(TObject *Sender);
	void __fastcall RBKopiChange(TObject *Sender);
	void __fastcall BtnKosongkanClick(TObject *Sender);
	void __fastcall BtnPesanClick(TObject *Sender);
private:	// User declarations

    void __fastcall UpdateFoodItem(String item, bool isChecked);
	void __fastcall UpdateDrinkItem(String item, bool isChecked);

public:		// User declarations
	__fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
