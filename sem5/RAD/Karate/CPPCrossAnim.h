#include <stdio.h>
#include <FMX.Types.hpp>
#include <FMX.Graphics.hpp>
#include <System.UITypes.hpp>
#include "TImageData.h"

//engine declaration
extern TImageData Back, VScreen;
extern int xBack, yBack, xBackLimit, yBackLimit, OldScreenWidth, OldScreenHeight;

extern TBitmap *Bitmap;
extern TBitmapData BMData;

//Must first call this function for VScreen and Back
void InitializeImgData(TImageData *Img, int Width, int Height);

//Conversion feature
void BitmapToImgData(TBitmap *Bitmap, TImageData *Img);
void ImgDataToBitmap(TImageData *Img, TBitmap *Bitmap);

//Animation feature
void AllocateObjectMemory(TImageData *Obj);
bool LoadImageFromBitmap(TImageData *Img, char FileName[]);
void LoadImageFromFile(TImageData *Img, UnicodeString FileName);
unsigned ImageSize(int x1, int y1, int x2, int y2);
void GetImage(TImageData *Sprite, int x1, int y1, int x2, int y2, TImageData *Screen);
void PutImage(TImageData *Sprite, int x, int y, TImageData *Screen);
void PutTransparantImage(TImageData *Sprite, int x, int y, TImageData *Screen);
void PutMixedColorImage(TImageData *Sprite, int x, int y, TImageData *Screen, TImageData *Mask24Bit);
void CopyPartOfScreen(TImageData *Src, int x, int y, TImageData *Dest);
void CopyScreen(TImageData *Src, TImageData *Dest);

//Other feature
bool _2DCollide(int LeftObj1, int TopObj1, int RightObj1, int BottomObj1, int LeftObj2, int TopObj2, int RightObj2, int BottomObj2);
bool XAxisCollide(int RightObj1, int TopObj1, int BottomObj1, int LeftObj2, int TopObj2, int BottomObj2);
bool YAxisCollide(int LeftObj1, int BottomObj1, int RightObj1, int LeftObj2, int TopObj2, int RightObj2);

void StartCPP2DEngine();
void SetBackgroundProperties(int Width, int Height, int xLimit, int yLimit, int x, int y);
char *GetAnimEngineCopyRightInformation();

//Other feature
bool _2DCollide(int LeftObj1, int TopObj1, int RightObj1, int BottomObj1, int LeftObj2, int TopObj2, int RightObj2, int BottomObj2);

char *GetAnimEngineCopyRightInformation();
