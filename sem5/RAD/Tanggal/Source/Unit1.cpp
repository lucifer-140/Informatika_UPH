//---------------------------------------------------------------------------

#include <fmx.h>
#pragma hdrstop

#include "Unit1.h"

//---------------------------------------------------------------------------
#pragma package(smart_init)
#pragma resource "*.fmx"

#include <DateUtils.hpp>
TForm1 *Form1;
//---------------------------------------------------------------------------
__fastcall TForm1::TForm1(TComponent* Owner)
	: TForm(Owner)
{
}
//---------------------------------------------------------------------------
void __fastcall TForm1::BtnAmbilClick(TObject *Sender)
{
 Tanggal=DatePicker->Date;
 LblTgl1->Text=FormatDateTime("dddd, dd MMMM yyyy", Tanggal);

 DecodeDate(Tanggal, Thn, Bln, Tgl);
 LblTgl2->Text=IntToStr(Tgl) + " "+ NamaBulan[Bln] + " " + IntToStr(Thn);
}
//---------------------------------------------------------------------------
void __fastcall TForm1::BtnUbahClick(TObject *Sender)
{
 Tgl=StrToInt(TxtTgl->Text);
 Bln=StrToInt(TxtBln->Text);
 Thn=StrToInt(TxtThn->Text);
 Tanggal=EncodeDate(Thn, Bln, Tgl);
 DatePicker->Date=Tanggal;
}
//---------------------------------------------------------------------------MsgDlgHandler=new TCloseDialogHandler();

