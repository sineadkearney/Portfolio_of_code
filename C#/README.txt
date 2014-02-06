This is my Final Year Project.

A video of the game in action:
https://www.youtube.com/watch?v=8CmRUjlbEGU

This game is designed to be similar in style to a classic 2D platformer, but instead of a controller, input to the game is via a Kinect camera
I have a few more months to work on this, so this is still a crude work-in-progress version.
Not shown in the video is an example of speech recognition, which is used to pause and resume the game.
Currently, all menus can be navigated using a mouse (when not using the Kinect) and speech recognition (when using the Kinect). The main menu can also be navigated using hand gestures.

User movements:		->		On-screen character movements:
walk					walk
run					run
crouch					crouch
Point left with right/left hand		Turn Left
Point right with right/left hand 	Turn Right	

\Assets\Scripts\playerControls.cs is the file for controlling player movement. When using a Kinect, Movement is detected in Assets\PointMan\PointManController.cs