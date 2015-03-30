//Description: contains the properties for this level: it's level and world index, and whether the Kinect components are enabled
//Instruction: attach to empty gameObject
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class LevelProperties : MonoBehaviour {
	
	public int worldIndex = 0;
	public int levelIndex = 0;
	
	void Start()
	{
		bool useKinect = PlayerPrefs.GetInt("useKinect") == 1;
		//speech
		GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>().enabled = useKinect;
		//pointMan
		GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>().enabled = useKinect;
		//kinect Manager
		GameObject.FindWithTag("kinect-gesture").GetComponent<KinectManager>().enabled = useKinect;
		//interaction Manager
		GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>().enabled = useKinect;
	}
}
