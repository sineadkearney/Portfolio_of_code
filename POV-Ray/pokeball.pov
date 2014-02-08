#include "colors.inc"   
#include "shapes.inc"
#include "shapes2.inc"// macros for generating various shapes                                                           
#include "shapes3.inc"




camera {
  location <-4, 7, -10>
  //location <-12, 8, -7>
  look_at <0, 4, 0>
}   

plane { // the floor
  y, 0  // along the x-z plane (y is the normal vector)
  pigment { checker color Black color White } // checkered pattern 
}
   
         
//Black, inside of pokeball
#declare Inside_ball =
difference{
 union{ // positiv
   sphere{ <0,0,0>, 2.75 
        texture{ pigment { color Black} //outside colour
                    finish  { phong 0.5}  
                  } // end of texture
           scale<1,1,1>  rotate<0,0,0>  translate<0,0,0>  
         } // end of sphere ----------------------------              
 }// end of union
  
 
 sphere  { <0,0,0>, 2.74 //changing this radius makes the grey sphere bigger/smaller 
           scale<1,1,1>  rotate<0,0,0> translate<0,0,0>  
         }  // end of sphere ----------------------------  

  
  scale<1,1,1> rotate<0,0,0> translate<0,0,0>  
} // end of diff

 
 
 
 
         
//Red, top half
#declare My_Test_Object2 =
difference{
 union{ // positiv
   sphere{ <0,0,0>, 2.75 
        texture{ pigment { color Red} //outside colour
                    finish  { phong 0.5}  
                  } // end of texture
           scale<1,1,1>  rotate<0,0,0>  translate<0,0,0>  
         } // end of sphere ----------------------------              
 }// end of union
  
 
 sphere  { <0,0,0>, 2.7 //changing this radius makes the grey sphere bigger/smaller 
           scale<1,1,1>  rotate<0,0,0> translate<0,0,0>  
         }  // end of sphere ----------------------------  
 cylinder{ <0,-1.5,0>,<0,3.5,0>, 1 
           scale <1,1,1> rotate<0,0,0> translate<0,0,0>
         } // end of cylinder  -------------------------
  
  scale<1,1,1> rotate<0,0,0> translate<0,0,0>  
} // end of diff

  
  
//White, bottom half
#declare My_Test_Object1 =
difference{
 union{ // positiv
   sphere{ <0,0,0>, 2.75 
        texture{ pigment { color White} //outside colour
                    finish  { phong 0.5}  
                  } // end of texture
           scale<1,1,1>  rotate<0,0,0>  translate<0,0,0>  
         } // end of sphere ----------------------------              
 }// end of union
  
 
 sphere  { <0,0,0>, 2.5 //changing this radius makes the grey sphere bigger/smaller 
           scale<1,1,1>  rotate<0,0,0> translate<0,0,0>  
         }  // end of sphere ----------------------------  
 cylinder{ <0,-1.5,0>,<0,3.5,0>, 1 
           scale <1,1,1> rotate<0,0,0> translate<0,0,0>
         } // end of cylinder  -------------------------
  
  scale<1,1,1> rotate<0,0,0> translate<0,0,0>  
} // end of diff
    
    
    
      
      
      
    
  
//#declare Bottom_Half =  
union{  
object{ Segment_of_Object( My_Test_Object1, 180 )    //180 = bottom half of object
        texture{ pigment{ color Gray15} //inside colour
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1> rotate<270,0,0> translate<0,3,0>
      }  

//inside of the ball      
    object{ Segment_of_Object( Inside_ball, 180 )    //180 = bottom half of object
        texture{ pigment{ color Gray15} //inside colour
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1>*0.9 rotate<270,0,0> translate<0,3,0>
      }
      
////large cylinder segment, joining inside and outside
object{ Segment_of_CylinderRing( 1, // major radius,
                                 0.9, // minor radius,  
                                 0.005, // height H,
                                 -316.5  // angle (in degrees)  
                               ) //-----------------------------------------
        texture{ pigment{ color White} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1>*2.75 rotate<0,68.5,0> translate<0,3,0>
      } // end of object 



 
 //small cylinder segment, joining inside and outside
object{ Segment_of_CylinderRing( 1, // major radius,
                                 0.98, // minor radius,  
                                 0.28, // height H,
                                 -178  // angle (in degrees)  
                               ) //-----------------------------------------
        texture{ pigment{ color White} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1> rotate<90,0,0> translate<0,3,-2.55>
      } // end of object
    
 }   
  
  
  
        
        
        
  
  
   
//declare Top_Half =  
union{ 
    //outside of the ball 
    object{ Segment_of_Object( My_Test_Object2, 180 )    //180 = bottom half of object
        texture{ pigment{ color Gray15} //inside colour
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1> rotate<270,0,0> translate<0,3,0>
      }   
        
    //inside of the ball      
    object{ Segment_of_Object( Inside_ball, 180 )    //180 = bottom half of object
        texture{ pigment{ color Gray15} //inside colour
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1>*0.9 rotate<270,0,0> translate<0,3,0>
      }   

    //large cylinder segment, joining top to bottom
    object{ Segment_of_CylinderRing( 1, // major radius,
                                 0.99, // minor radius,  
                                 0.15, // height H,
                                 0  // angle (in degrees)  
                               ) //-----------------------------------------
        texture{ pigment{ color Black} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1>*2.5 rotate<0,68.5,0> translate<0,3,0>
      } // end of object 

      
    //large cylinder segment, joining inside and outside
    object{ Segment_of_CylinderRing( 1, // major radius,
                                 0.9, // minor radius,  
                                 0.005, // height H,
                                 -316.5  // angle (in degrees)  
                               ) //-----------------------------------------
        texture{ pigment{ color Red} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1>*2.75 rotate<0,68.5,0> translate<0,3,0>
      } // end of object 



 
    //small cylinder segment, side
    object{ Segment_of_CylinderRing( 1, // major radius,
                                 0.98, // minor radius,  
                                 0.28, // height H,
                                 -178  // angle (in degrees)  
                               ) //-----------------------------------------
        texture{ pigment{ color Red} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,1> rotate<90,0,0> translate<0,3,-2.55>
      } // end of object
     
     
     //larger circle of the button
     cylinder
    {
        <1,1,0>, <1,1,1>, 0.7
        texture{ pigment{ color Gray45} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,0.1> rotate<0,0,0> translate<-1,2.2,-2.6>
    }
     
     //smaller circle of the button
     cylinder
    {
        <1,1,0>, <1,1,1>, 0.4
        texture{ pigment{ color Gray75} 
                 finish { phong 1}
               } // end of texture 
        scale <1,1,0.2> rotate<0,0,0> translate<-1,2.2,-2.7>
    }
      
    /*rotate<0,0,0> translate<0,0,0>   */ //to have it upside down
    //rotate<0,0,180> translate<0,6.35,0>   //correct orientation 
    rotate<0-clock*30,0,180> translate<0,6.35+0.89*clock,0+1.8*clock>   //correct orientation  
    //rotate<-30,0,180> translate<0,7.24,1.8> //open
 }
 
 
    
//light_source { <1, 2, 1> color White }    
    
light_source { <10, 10, -10> color White }