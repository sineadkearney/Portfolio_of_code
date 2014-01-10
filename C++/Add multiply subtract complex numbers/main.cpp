/*
 * excercise_1_2.cpp
 *
 *  Created on: Oct 16, 2012
 *      Author: se312011
 */

#include <iostream>
#include "Complex.h"
using namespace std;

int main()
{
	Complex num1,num2, result;
	double real, imaginary;

	cout<<"Enter the real and imaginary parts of the first number: ";
	cin>>real>>imaginary;
	num1.setValue(real,imaginary);

	cout<<"Enter the real and imaginary parts of the second number: ";
	cin>>real>>imaginary;
	num2.setValue(real,imaginary);

	num1.print();
	num2.print();

	result = num1.Add(num2);
	result.print();

	result = num1.Subtract(num2);
	result.print();

	result = num1.Multiply(num2);
	result.print();

	char c;
	cin >> c;
	return 0;
}
