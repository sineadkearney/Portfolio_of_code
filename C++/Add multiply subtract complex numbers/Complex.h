/*
 * Complex.h
 *
 *  Created on: Oct 19, 2012
 *      Author: se312011
 */

#ifndef COMPLEX_H_
#define COMPLEX_H_

class Complex {
public:
	Complex();
	virtual ~Complex();
	void setValue(double real, double imag);
	Complex Add(const Complex &z);
	Complex Subtract(const Complex &z);
	Complex Multiply(const Complex &z);
	void print();

protected:
	double real_;
	double imag_;

};

#endif /* COMPLEX_H_ */
