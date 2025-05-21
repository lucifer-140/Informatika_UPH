#include <FMX.Graphics.hpp>
#ifndef TIMAGEDATA_H
#define TIMAGEDATA_H
struct TImageData {   //must be declare as TImageData * (pointer) data type and must instatiate (create new)
 unsigned char *Pixels;
 int Address, Width, Height, BitsPerPixel, BytesPerPixel;
 TPixelFormat PixelFormat;
};
#endif
