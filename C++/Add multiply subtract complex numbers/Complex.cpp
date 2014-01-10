/*
 * Complex.cpp
 *
 *  Created on: Oct 19, 2012
 *      Author: se312011
 */

#include "Complex.h"
#include <iostream>
using namespace std;

Complex::Complex() 
{
	this->real_ = 0;
	this->imag_ = 0;
}

Complex::~Complex() {
	// TODO Auto-generated destructor stub
}

void Complex::setValue(double real, double imag)
{
	real_ = real;
	imag_ = imag;
}

Complex Complex::Add(const Complex &z)
{
	Complex result;
	result.real_= z.real_ + real_;
	result.imag_= z.imag_ + imag_;
	cout<< "Add: ";

	return result;
}

Complex Complex::Subtract(const Complex &z)
{
	Complex result;
	result.real_= real_ - z.real_;
	result.imag_= imag_ - z.imag_;
	cout<< "Substract: ";
	return result;
}

Complex Complex::Multiply(const Complex &z)
{
	Complex result;
	result.real_= real_ * z.real_;
	result.imag_= imag_ * z.imag_;
	cout<< "Multiply: ";
	return result;
}

void Complex::print()
{
	cout << "("<< real_ << ", "<< imag_ << ")\n";
}