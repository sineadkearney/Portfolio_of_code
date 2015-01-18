This is my Final Year Project for my Computer Science and Software Engineering Degree.

A video of the game in action:
(Please note that this video was made about half way through development. I currently do not have a more up to date video)
https://www.youtube.com/watch?v=8CmRUjlbEGU

The code in this repository is taken from the version I submitted.
This game is designed to be similar in style to a classic 2D platformer, but instead of a controller, input to the game is via a Kinect camera

All menus in the game can be navigated:
	1. When not using the Kinect: by using a mouse
	2. When using the Kinect: speech recognition or by the User moving their hand, in order to move the on-screen cursor

User movements:		->		On-screen character movements:
walk					walk
run					run
crouch					crouch
crouch+walk				crouch+walk
Point left with right/left hand		Turn Left
Point right with right/left hand 	Turn Right	
For more detailed descriptions on how the user's movements are mapped to the on-screen character, see Documentation/Instructions.doc

\Assets\Scripts\playerControls.cs is the file for controlling player movement. When using a Kinect, Movement is detected in Assets\PointMan\PointManController.cs