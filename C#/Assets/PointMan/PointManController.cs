using UnityEngine;
using System;
using System.Collections;

public class PointManController : MonoBehaviour 
{
	//MINE
	private Vector3 head_initial = new Vector3(0f, 0f, 0f);
	private bool isHeadSet = false;
	private Vector3 start = new Vector3 (0f, 1f, -1f); //the coordinate of the Kinect man, before the skeleton is drawn
	
	private bool preRaiseRFoot =  true; 	//for tracking feet movement
	private bool preLowerRFoot =  false;
	private bool preRaiseLFoot =  true; 
	private bool preLowerLFoot =  false;
	
	private double[] footsteps = new double[6]{0.0,0.0,0.0,0.0,0.0,0.0}; //array for footsteps. test.
	private double[] timeStandingStill = new double[2]{0.0, 0.0}; //[0] = the time user first stopped moving feet, [1] = current time, where user still has not moved feet
	private double[] timeFootLifted = new double[2]{0.0, 0.0}; //[0] = the time user first lift up their foot, [1] = current time, where user still has not lowered foot
	
	
	public bool isWalking = false;	//true when user is walking, else false
	public bool isRunning = false;	//true when user is running, else false
	
	public GUIText feedbackPoint;
	public GUIText feedback;
	public GUIText feedbackHead;
	public GUIText feedback3;
	
	public double offsetHandX = 0.4; //used when comparing V3 of different body points, on x-axis
	public double offsetHeadY = 0.15; //used when comparing V3 of different body points, on y-axis
	public double offsetYFoot = 0.15; //used when comparing V3 of different body points, on y-axis
	
	public int kinectHorz = 0; //velocity (ie, the user is walking forward = 1 (and user previously pointed right), walking and user previously pointed left = -1, else stopped = 0)
	public int kinectVert = 0; //height (ie, normal position = 0, jump = 1, crouch = -1)
	public int moveDirection = 1; //1 = right, -1 = left
	public int pointingDirection = 0; //-1 = left, 1 = right, else 0. Used when moving in a direction while jumping
	public bool jumpStraightUp = false; //true if the user has both sides by their sides/directly at hips
	
	//for rigidBody
	public bool facingRight = true;
	private bool useKinect;
	// GUI Texture to display the hand cursor for Player1
	public GameObject HandCursor1;
	
	
	public bool MoveVertically = false;
	public bool MirroredMovement = false;
	
	public GameObject Hip_Center;
	public GameObject Spine;
	public GameObject Shoulder_Center;
	public GameObject Head;
	public GameObject Shoulder_Left;
	public GameObject Elbow_Left;
	public GameObject Wrist_Left;
	public GameObject Hand_Left;
	public GameObject Shoulder_Right;
	public GameObject Elbow_Right;
	public GameObject Wrist_Right;
	public GameObject Hand_Right;
	public GameObject Hip_Left;
	public GameObject Knee_Left;
	public GameObject Ankle_Left;
	public GameObject Foot_Left;
	public GameObject Hip_Right;
	public GameObject Knee_Right;
	public GameObject Ankle_Right;
	public GameObject Foot_Right;
	
	private GameObject[] _bones; 
	private GameObject debugText;
	private Vector3 posInitialOffset = Vector3.zero;
	private bool initialPosInitialized = false;
	
	void Start () 
	{
		playerControls pc = GameObject.Find("hero").GetComponent<playerControls>();
		useKinect = pc.useKinect;
		
		if(useKinect)
		{
			print ("using Kinect");
			//store bones in a list for easier access
			_bones = new GameObject[(int)KinectWrapper.NuiSkeletonPositionIndex.Count] {
				Hip_Center, Spine, Shoulder_Center, Head,
				Shoulder_Left, Elbow_Left, Wrist_Left, Hand_Left,
				Shoulder_Right, Elbow_Right, Wrist_Right, Hand_Right,
				Hip_Left, Knee_Left, Ankle_Left, Foot_Left,
				Hip_Right, Knee_Right, Ankle_Right, Foot_Right
			};
			
			// debug text
			debugText = GameObject.Find("CalibrationText");
		}
		else
		{
			print( "Not using the Kinect");
		}
	}
	
	// Update is called once per frame
	void Update () 
	{
		if (useKinect)
		{
			// get 1st player
			uint playerID = KinectManager.Instance != null ? KinectManager.Instance.GetPlayer1ID() : 0;
			if(playerID <= 0)
				return;
			
			// set the position in space
			Vector3 posPointMan = KinectManager.Instance.GetUserPosition(playerID); // returns the User position, relative to the Kinect-sensor, in meters
			posPointMan.z = !MirroredMovement ? -posPointMan.z : posPointMan.z;
			
			// store the initial position
			if(!initialPosInitialized)
			{
				posInitialOffset = transform.position - (MoveVertically ? posPointMan : new Vector3(posPointMan.x, 0, posPointMan.z));
				initialPosInitialized = true;
				print (posInitialOffset);
			}
			
			transform.position = posInitialOffset + (MoveVertically ? posPointMan : new Vector3(posPointMan.x, 0, posPointMan.z));
			
			// update the local positions of the bones
			int jointsCount = (int)KinectWrapper.NuiSkeletonPositionIndex.Count;
			
			for(int i = 0; i < jointsCount; i++) 
			{
				if(_bones[i] != null)
				{
					if(KinectManager.Instance.IsJointTracked(playerID, i))
					{
						_bones[i].gameObject.SetActive(true);
						
						int joint = MirroredMovement ? KinectWrapper.GetSkeletonMirroredJoint(i): i;
						Vector3 posJoint = KinectManager.Instance.GetJointPosition(playerID, joint);
						posJoint.z = !MirroredMovement ? -posJoint.z : posJoint.z;
						Quaternion rotJoint = KinectManager.Instance.GetJointOrientation(playerID, joint, !MirroredMovement);
						
						posJoint -= posPointMan;
						posJoint.z = -posJoint.z;
						
						if(MirroredMovement)
						{
							posJoint.x = -posJoint.x;
						}
	
						_bones[i].transform.localPosition = posJoint;
						_bones[i].transform.localRotation = rotJoint;
					}
					else
					{
						_bones[i].gameObject.SetActive(false);
					}
				}	
			}
			
			
			
			if (Head.transform.position != start && !isHeadSet) // 
				{
					head_initial = Head.transform.position;
					isHeadSet = true;
				}
			else
			{
//				print ("Head.transform.position == start");
			}
					
			HandMovement(); //changing direction
			if (head_initial.x != 0 || head_initial.y != 0 || head_initial.z != 0)
			{
			HeadMovement(); //jump and crouch
			}
			FootMovement(); //walk and run
		}
		
		
	}
	
	
	void HandMovement ()
	{
		Vector3 LHand = Hand_Right.transform.position;
		Vector3 LHip = Hip_Right.transform.position;
		Vector3 LShoulder = Shoulder_Right.transform.position;
		Vector3 RHand = Hand_Left.transform.position;
		Vector3 RHip = Hip_Left.transform.position;
		Vector3 RShoulder = Shoulder_Left.transform.position;
		
		//since LHip has a greater x value than right, I think hips are mirrored. Hands too? 
		
//		if (RHand.z < RShoulder.z - 0.45)
//		{
//			HandCursor1.transform.position = Vector3.Lerp(HandCursor1.transform.position, RHand/2, 3* Time.deltaTime);
//		}
//		else if (LHand.z < LShoulder.z - 0.45 )
//		{
//			//HandCursor1.transform.position = Vector3.Lerp(HandCursor1.transform.position, LHand, 3 * Time.deltaTime);
//		}
//		else
//		{
//			feedbackPoint.text = "H:"+RHand.z + " S:" + RShoulder.z;
//		}
		
//		if ((RHand.x  >=  RShoulder.x + offsetX) && ((RShoulder.y + offsetY) > RHand.y)  &&  (RShoulder.y - offsetY  <  RHand.y) //right hand is out to the right, near to y of right shoulder
//			|| (LHand.x  >=  RShoulder.x - offsetX) && LHand.x > LShoulder.x && ((RShoulder.y + offsetY) > LHand.y)  &&  (RShoulder.y - offsetY  <  LHand.y) //left hand is across body, near to right shoulder
//			)
			//is out to the right from the right shoulder, and the y-axis of both points are close
			//shoulder = 0.5, hand = 0.3 == true, hand = 0.7 == true, else false


		if (RHand.x  > RHip.x + offsetHandX || LHand.x  >= RHip.x) //Rhand is out to right from Rhip, or  Lhand is at or out to right from Rhip

		{
			if (feedback)
			{feedback.text = "turn right";}
			moveDirection = 1;
			pointingDirection = 1;
			facingRight = true;
			jumpStraightUp = false;
		}
//		else if ((RHand.x  <=  LShoulder.x + offsetX) && RHand.x < RShoulder.x && ((LShoulder.y + offsetY) > RHand.y)  &&  (LShoulder.y - offsetY  <  RHand.y) //right hand is across body, near to left shoulder
//			|| (LHand.x  <=  LShoulder.x + offsetX) && ((LShoulder.y + offsetY) > LHand.y)  &&  (LShoulder.y - offsetY  <  LHand.y) //left hand is out to the left, near to y of left shoulder
//			)
		
		else if (LHand.x  < LHip.x - offsetHandX || RHand.x  <= LHip.x)
		{
			if (feedback)
			{			feedback.text = "turn left";}
			moveDirection = -1;
			pointingDirection = -1;
			facingRight = false;
			jumpStraightUp = false;
		}
		else if ((RHand.x <= RHip.x + 0.10) && (RHand.x >= RHip.x - 0.03) && (LHand.x <= LHip.x + 0.03) && (LHand.x >= LHip.x - 0.10)
			&& RHand.y <= RHip.y && LHand.y <= LHip.y)
			//right and left hands are near to respective hips, and below them in y-axis
		{
			if (feedback)
			{			feedback.text = "jump up";}
			jumpStraightUp = true;
		}
		else
		{
//			feedback.text = "" + RHand.x + " "+  RHip.x + " " +LHand.x + " " + LHip.x;
			pointingDirection = 0;
			if (feedback)
			{			feedback.text = "L: " + LHand + " R:" + RHand;}
			jumpStraightUp = false;
		}
	}
	
		void HeadMovement()
	{
		Vector3 Head_current = Head.transform.position;
		
		if (feedbackHead)
			{feedbackHead.text = "I:" +head_initial.y + " c:" + Head_current.y;}
		
		//jump  and crouch
		if (Head_current.y < head_initial.y - offsetHeadY)//(((RHip.y + offsetY) > RHand.y)  &&  (RHip.y - offsetY  <  RHand.y))
		{
			if (feedbackHead)
			{feedbackHead.text += "move down";}
			kinectVert = -1;
		}
		else if (Head_current.y >= head_initial.y + (offsetHeadY/2))//(((RHip.y + offsetY) > RHand.y)  &&  (RHip.y - offsetY  <  RHand.y))
		{
			if (feedbackHead)
			{feedbackHead.text += " move up";}
			kinectVert = 1;
		}
		else
		{
			if (feedbackHead)
			{feedbackHead.text += " do nothing";}
			kinectVert = 0;
		}
	}
	
	
	
		//////////////////////////////		Feet 				//////////////////////////////////////// 
		
	void RemoveOldAddNew(double[] myArray, double newValue)
	{
		for (int i = 1; i < myArray.Length; i++) //move all values down an index, effectively removing the first value, and the last value is now contained in the two last indexes
		{
			myArray[i-1] = myArray[i];
		}
		myArray[myArray.Length-1] = newValue; //set the last index = the new value
	}
	
	
	void AddTo2indexTimeArray(double[] myArray, double newValue)
	{
		if (myArray[0] == 0.0)
		{
			//this is the first value to be added to timeStandingStill
			myArray[0] = newValue;
		}
		else
		{
			myArray[1] = newValue;
		}
	}
	
		bool IsStandingStill()
	{
		bool returnThis = false;
		if (timeStandingStill[0] != 0.0  && timeStandingStill[1] !=  0.0)
		{			
			//values have been added to both
			returnThis = (timeStandingStill[1] - timeStandingStill[0]) > (0.25*1000); //has been standing still for 1 second
		}
		
		return returnThis;
	}
	
	bool isStandingOnOneFoot()
	{
		bool returnThis = false;
		if (timeFootLifted[0] != 0.0  && timeFootLifted[1] !=  0.0)
		{
			//values have been added to both
			returnThis = (timeFootLifted[1] - timeFootLifted[0]) > (0.5*1000); //has been standing still for 1 second
		}
		
		return returnThis;
	}
	
	bool isOnlyPartiallyFull(double[] myArray)
	{//where the default value for an index in myArray is 0.0
		bool returnThis = false;
		
		for (int i = 0; i < myArray.Length; i++)
		{
			returnThis = returnThis || (myArray[i] == 0.0); //there is at least one value of 0.0, the defualt value
		}
		return returnThis;
	}
	
	void FootMovement ()
	{
		Vector3 RFoot = Knee_Left.transform.position; //Foot, Knee
		Vector3 LFoot = Knee_Right.transform.position; //Foot, Knee
		
		isRunning = false;
		isWalking = false;

//		feedback.text = "" + LFoot + " " + RFoot;
		TimeSpan t = DateTime.UtcNow - new DateTime(1970, 1, 1);
		double ms = t.TotalMilliseconds ;
//		
//		//feedback.text = "" + RFoot;
		if (preRaiseRFoot) //we are waiting for the user to raise left/right foot
		{
			if (RFoot.y > (LFoot.y + offsetYFoot)) //if the right foot is higher than left foot + offsetY
			{
				//user has now raised right foot
				if (moveDirection == 1)
				{
					if (feedback)
					{feedback.text = "move right - raise right foot";}
					kinectHorz = 1;														
				}
				else //(moveDirection == -1)
				{
					if (feedback)
					{feedback.text = "turn left - raise right foot";}
					kinectHorz = -1;				
				}
				
				RemoveOldAddNew(footsteps, ms);
					
				preRaiseRFoot = false;
				preLowerRFoot = true;	
				preRaiseLFoot = false;
				preLowerLFoot = false;
				
				//reset timeStandingStill, as we know that the user has just risen/lowered a foot, and therefore, not standing still
				timeStandingStill[0] = 0.0;
				timeStandingStill[1] = 0.0;
			}
			else
			{
				//there is a possibility user could be standing still, as both feet are level (on the ground?)
				AddTo2indexTimeArray(timeStandingStill, ms);
			}
		}
		else if (preLowerRFoot) //we are waiting for the user to lower left/right foot
		{
			if (RFoot.y < (LFoot.y + offsetYFoot)) //if the right foot is higher than left foot + offsetY, or if left foot higher than right foot + offsetY
			{
				//user has now lowered right foot
				if (moveDirection == 1)
				{
					if (feedback)
					{feedback.text = "move right - lower right foot";}
					kinectHorz = 1;					
				}
				else //(moveDirection == -1)
				{
					if (feedback)
					{feedback.text = "turn left - lower right foot";}
					kinectHorz = -1;				
				}
				
				RemoveOldAddNew(footsteps, ms);
					
				preLowerRFoot = false;
				preRaiseLFoot = true;
				preLowerLFoot = false;
				preRaiseRFoot = false;
				
				//reset timeStandingStill, as we know that the user has just risen/lowered a foot, and therefore, not standing still
				timeStandingStill[0] = 0.0;
				timeStandingStill[1] = 0.0;
				
				//reset timeFootLifted, as lower their foot
				timeFootLifted[0] = 0.0;
				timeFootLifted[1] = 0.0;
			}
			else
			{
				//there is a possibility that the user is standing on one foot, with their other foot raised for an extended period of time
				AddTo2indexTimeArray(timeFootLifted, ms);
			}
		}
		
		if (preRaiseLFoot) //we are waiting for the user to raise left/right foot
		{
			if (LFoot.y > (RFoot.y + offsetYFoot)) //if the right foot is higher than left foot + offsetY
			{
				//user has now raised left foot
				if (moveDirection == 1)
				{
					if (feedback)
					{feedback.text = "move right - raise left foot";}
					kinectHorz = 1;									
				}
				else //(moveDirection == -1)
				{
					if (feedback)
					{feedback.text = "turn left - raise left foot";}
					kinectHorz = -1;				
				}
				
				RemoveOldAddNew(footsteps, ms);
					
				preRaiseLFoot = false;
				preLowerLFoot = true;
				preRaiseRFoot = false;
				preLowerRFoot = false;
				
				//reset timeStandingStill, as we know that the user has just risen/lowered a foot, and therefore, not standing still
				timeStandingStill[0] = 0.0;
				timeStandingStill[1] = 0.0;
			}
			else
			{
				//there is a possibility user could be standing still, as both feet are level (on the ground?)
				AddTo2indexTimeArray(timeStandingStill, ms);
			}
		}
		else if (preLowerLFoot) //we are waiting for the user to lower left/right foot
		{
			if (LFoot.y < (RFoot.y + offsetYFoot)) //if the right foot is higher than left foot + offsetY, or if left foot higher than right foot + offsetY
			{
				//user has now lowered left foot
				if (moveDirection == 1)
				{
					if (feedback)
					{feedback.text = "move right - lower left foot";}
					kinectHorz = 1;										
				}
				else //(moveDirection == -1)
				{
					if (feedback)
					{feedback.text = "turn left - lower left foot";}
					kinectHorz = -1;					
				}
				
				RemoveOldAddNew(footsteps, ms);
					
				preLowerLFoot = false;
				preRaiseRFoot = true;
				preLowerRFoot = false;
				preRaiseLFoot = false;
				
				//reset timeStandingStill, as we know that the user has just risen/lowered a foot, and therefore, not standing still
				timeStandingStill[0] = 0.0;
				timeStandingStill[1] = 0.0;
				
				//reset timeFootLifted, as lower their foot
				timeFootLifted[0] = 0.0;
				timeFootLifted[1] = 0.0;
			}
			else
			{
				//there is a possibility that the user is standing on one foot, with their other foot raised for an extended period of time
				AddTo2indexTimeArray(timeFootLifted, ms);
			}
		}
		
		if (feedback && feedbackPoint)
			{feedback.text = "preRaiseRFoot: " + preRaiseRFoot + ", preLowerRFoot: " + preLowerRFoot + ", preRaiseLFoot: "  + preRaiseLFoot + ", preLowerLFoot: "+ preLowerLFoot;
		feedbackPoint.text = timeFootLifted[0] + " " + timeFootLifted[1];// + " still: " + ;
		}
		
		
		
		
		
		
		if (IsStandingStill())
		{
			kinectHorz = 0;
			preRaiseRFoot = true;
			preRaiseLFoot = true;
//			if(feedback)
//			{feedback.text += " standing still";
//			}
		}
		else if (isStandingOnOneFoot())
		{
			kinectHorz = 0;
			//keep preLowerRFoot and preLowerLFoot at the values they currently have
			if(feedback3)
			{feedback3.text += " standing on one foot";}
		}
		else
		{		
			int divideForAvrg = 2; //divide the total differnce by this amount, to get the average time differnce between steps
			double[] currentFootsteps = new double[2]{0.0,0.0};
			int cFindex = 0;  //use this to index into currentFootsteps. Incremented in the next for-loop
			for (int i = 2;  i < footsteps.Length; i = i+2) //we want only to index the indexes where a foot has been raised (or could do lowered), and compare the time differences 
				//between the raising of each foot
			{
				double difference = footsteps[i] - footsteps[i-2];
				if (difference >  0) //is not negative, ie, footsteps[i] != 0.0
				{
					currentFootsteps[cFindex] = difference;
				}
				else
				{
					currentFootsteps[cFindex] = 0;
					divideForAvrg--;
				}
				cFindex++;
			}
			
			double totalTimeDiff = 0;
			if (divideForAvrg  >  0) //we have at least one entry in currentFootsteps, and since we are dividing by divideForAvrg, we know we aren't diving by 0
			{
				String feet = "";				
				foreach (double index in currentFootsteps) // Loop through List with foreach
				{
				    feet += " " + index;
					totalTimeDiff += index;
				}
				print (feet);
				totalTimeDiff /= divideForAvrg;
				
				
//				if (totalTimeDiff  > 100 && totalTimeDiff <=  500)
//				{
//					isRunning = true;
//					print ("running");
//				}
//				else if (totalTimeDiff >  500)// && totalTimeDiff <=  1000)
//				{
//					isWalking = true;
//					print ("walking");
//				}
			}
			isRunning = (totalTimeDiff  > 100) && (totalTimeDiff <=  500);
			isWalking = (totalTimeDiff >  500) || isOnlyPartiallyFull(footsteps); //if we can't tell yet that the user is running or walking, we will start walking
		
			if(isRunning && feedback)
			{
				feedback3.text = " running";
			}
			else if(isWalking && feedback)
			{
				feedback3.text = " walking";
			}
		}
			

		
	}
		
}
