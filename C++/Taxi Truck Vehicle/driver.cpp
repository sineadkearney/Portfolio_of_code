// Chapter 10 of C++ How to Program
// driver for vehicle
#include <iostream>

using std::cout;
using std::endl;

#include <vector>

using std::vector;

#include "vehicle.h"
#include "taxi.h"
#include "truck.h"
#include "parkinglot.h"


int main()
{
	cout << "main";
    Taxi cab( 3.3 );
    Truck mack( 7.54 );

	/* Write code to indicate that truck is carrying cargo - Sinéad Kearney*/
   mack.setCargo(true);

   /* Declare a vector, parkingLot, of base-class pointers */
   /* all of the following by Sinéad Kearney*/
   ParkingLot *parkingLot = new ParkingLot();

   parkingLot->addVehicle(&cab);
   parkingLot->addVehicle(&mack);

   parkingLot->printVehicles();

   cout << parkingLot->getVehicleCount();

   char c;
   std::cin >> c;
   return 0;

} // end main



/**************************************************************************
 * (C) Copyright 1992-2003 by Deitel & Associates, Inc. and Prentice      *
 * Hall. All Rights Reserved.                                             *
 *                                                                        *
 * DISCLAIMER: The authors and publisher of this book have used their     *
 * best efforts in preparing the book. These efforts include the          *
 * development, research, and testing of the theories and programs        *
 * to determine their effectiveness. The authors and publisher make       *
 * no warranty of any kind, expressed or implied, with regard to these    *
 * programs or to the documentation contained in these books. The authors *
 * and publisher shall not be liable in any event for incidental or       *
 * consequential damages in connection with, or arising out of, the       *
 * furnishing, performance, or use of these programs.                     *
 *************************************************************************/
