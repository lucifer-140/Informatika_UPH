//---------------------------------------------------------------------------

#include <fmx.h>
#pragma hdrstop

#include "Unit1.h"
//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.fmx"
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TForm1::BtnSisipClick(TObject *Sender)
{
 pos=StrToInt(TxtPos->Text);
 if (pos>=0 && pos<Lst->Items->Count) Lst->Items->Insert(pos, TxtData->Text);
 if (pos>=0 && pos<Cmb->Items->Count) Cmb->Items->Insert(pos, TxtData->Text);
}
//---------------------------------------------------------------------------
void __fastcall TForm1::CmbChange(TObject *Sender)
{
 TxtJlh->Text=IntToStr(Cmb->Items->Count);
 TxtPos->Text=IntToStr(Cmb->ItemIndex);
 TxtData->Text=Cmb->Items->Strings[Cmb->ItemIndex];
}
//---------------------------------------------------------------------------
void __fastcall TForm1::BtnTambahClick(TObject *Sender)
{
 Lst->Items->Add(TxtData->Text);
 Cmb->Items->Add(TxtData->Text);
}
//---------------------------------------------------------------------------
void __fastcall TForm1::LstClick(TObject *Sender)
{
 TxtJlh->Text=IntToStr(Lst->Count);
 TxtPos->Text=IntToStr(Lst->ItemIndex);
 TxtData->Text=Lst->Items->Strings[Lst->ItemIndex];
}


//---------------------------------------------------------------------------
void __fastcall TForm1::BtnUbahClick(TObject *Sender)
{
 pos=StrToInt(TxtPos->Text);
 if (pos>=0 && pos<Lst->Items->Count) {
	 Lst->Items->Strings[pos]=TxtData->Text;

 }
 if (pos>=0 && pos<Cmb->Items->Count) {
     Cmb->Items->Strings[pos]=TxtData->Text;
 }
}
//---------------------------------------------------------------------------
void __fastcall TForm1::BtnHapusClick(TObject *Sender)
{
 pos=StrToInt(TxtPos->Text);
 if(pos>=0 && pos<Lst->Items->Count) Lst->Items->Delete(pos);
 if(pos>=0 && pos<Cmb->Items->Count) Cmb->Items->Delete(pos);
}
//---------------------------------------------------------------------------
