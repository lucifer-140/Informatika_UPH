//---------------------------------------------------------------------------

#ifndef FormMainH
#define FormMainH
//---------------------------------------------------------------------------
#include <System.Classes.hpp>
#include <FMX.Controls.hpp>
#include <FMX.Forms.hpp>
#include <FMX.Controls.Presentation.hpp>
#include <FMX.StdCtrls.hpp>
#include <FMX.Types.hpp>
//---------------------------------------------------------------------------
class TForm1 : public TForm
{
__published:	// IDE-managed Components
	TScrollBar *SB;
	TProgressBar *PBS;
	TTrackBar *TB;
	TProgressBar *PBT;
	TLabel *LblSB;
	TLabel *LblTB;
	TTimer *Timer;
	TButton *BtnStart;
	TButton *BtnStop;
	TButton *BtnReset;
	TProgressBar *PB;
private:	// User declarations
public:		// User declarations
	__fastcall TForm1(TComponent* Owner);
};
//---------------------------------------------------------------------------
extern PACKAGE TForm1 *Form1;
//---------------------------------------------------------------------------
#endif
