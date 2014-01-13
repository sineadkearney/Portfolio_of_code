/*All by Sinéad Kearney*/
#include <iostream>

using std::cout;

#include "parkinglot.h"

ParkingLot::ParkingLot()
{

		cout = 0;
}
int ParkingLot::getVehicleCount() const
{
	return vehicles.size();
}

void ParkingLot::addVehicle( Vehicle *v )
{
	vehicles.push_back(v);
}

void ParkingLot::printVehicles() const
{
	for ( unsigned int i = 0; i < vehicles.size(); i++ )
	{
		vehicles[i]->print();
	}
}
