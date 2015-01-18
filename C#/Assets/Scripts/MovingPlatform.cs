//Description: creates a moving platform, which moves in relation to any axis, that the Player can travel on.
//Instructions: attach to a sprite object of a platform. Sprite must have a boxCollider as a trigger.
//		Sprite must have a child containing only a non-trigger boxCollider, to prevent the Player from falling through when coming back down
//Code taken directly from: //http://asmodaistudios.wordpress.com/2013/01/18/unity3d-moving-platform-tutorial-and-feature-update/

using UnityEngine;
using System.Collections;

public class MovingPlatform : MonoBehaviour {
	
	private Vector3 startPosition;
	private Vector3 endPosition;
	public Vector3 MoveDirection = Vector3.left;
	public float MoveSpeed = 0.5f;
	public float MoveDistance = 3.0f;
	private float _t = 0f;
	private bool oneWay = true;
	
	void Start () {
	    startPosition = transform.position;
	    //MoveDirection is Vector3 - usually a norm vector like (0,1,0)
	    //which would cause the platform to move along the Y axis
	    endPosition = startPosition + (MoveDistance * MoveDirection);
	    //ColliderPlatform holds a collider that is not a trigger, as 
	    //well as the mesh, and must move with the whole platform
	    //ColliderPlatform.transform.parent = transform;
	}
	
	void OnTriggerEnter(Collider collision)
	{
	    if (collision.gameObject.tag == ("Player"))
	    {
	        collision.transform.parent = transform;
	    }
	}
	
	void OnTriggerExit(Collider collision)
	{
	    if (collision.gameObject.tag == ("Player"))
	    {
	        collision.transform.parent = null;
	    }
	}
	
	void Update ()  
	{ 
	    if (oneWay) 
	        _t += Time.deltaTime * MoveSpeed; 
	    else
	        _t -= Time.deltaTime * MoveSpeed; 
	    transform.position = Vector3.Lerp(startPosition, endPosition, _t); 
	
	_t = Mathf.Clamp(_t,0.0f,1.0f); //avoids platforms getting stuck
	
	if (transform.position == endPosition || transform.position == startPosition) 
	    oneWay = !oneWay; 
	}
}

