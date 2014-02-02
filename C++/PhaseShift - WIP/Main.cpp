/*
  ==============================================================================

    This file was auto-generated!

    It contains the basic startup code for a Juce application.

  ==============================================================================
*/

#include <string>
#include <iostream>
#include <vector>
#include <sstream>
#include <regex>
#include <fstream>
#include "../JuceLibraryCode/JuceHeader.h"
using namespace std;

//==============================================================================
void convertToNote (string *tickIndex, int num);
void addArrayToMaster(string ** &masterList, string addThis[], int atIndex);
string getEventAtTick (vector<vector<string>> songSections, String tick);

int main (int argc, char* argv[])
{
	string printThis = "";	//string which will contain the content to be saved to output file
	cout << "Path and name of file: ";
	//String st = "C:\\Program Files (x86)\\Phase Shift\\music\\Paramore\\Paramore - Ignorance\\notes.mid"; //this file was throwing exceptions in Java version
	String st = "C:\\Program Files (x86)\\Phase Shift\\music\\The Donnas\\09 - Take It Off\\notes.mid"; //hardcoded for now

	printThis += st.toStdString() + "\n";
	cout <<  st << "\n";
	
	//load notes.midi
	File file(st);
	FileInputStream fiStream(file);
	MidiFile midiFile;
	if(!midiFile.readFrom(fiStream))
    {
        cout << "Error: Nothing Loaded";
        return 1;     
    }
    
    if(midiFile.getNumTracks()==0) return 1;

	//set level of difficulty
	string level = "hard"; //hardcoded for now
	int lvl = 0;
	if (level == "easy") {
		lvl = 4;
	}
	else if (level == "medium") {
		lvl = 5;
	}
	else if (level == "hard") {
		lvl = 6;
	}
	else if (level == "expert") {
		lvl = 7;
	}
	else {
		cout << "invalid level";
		return 1;
	}
	printThis += "Level: " + level + "\n";
	//set instrument
	string selectInstru = "drums";
	if (selectInstru != "guitar" && selectInstru != "bass" && selectInstru != "drums" && selectInstru != "vocals")
	{
		cout << "invalid instrument";
		return 1;
	}
	printThis += "Instrument: " + selectInstru + "\n";
	long ticks_per_beat = midiFile.getTimeFormat();
	int tracks = midiFile.getNumTracks(); 

	int useTrack = 0; //the index of the mid file which contains the notes for the instrument. Set in following for-loop
	string timeSig = ""; //the time signature of the song. Set in following for-loop
	vector<vector<string>> songSections; //timestamps and sections names of the song. Set in following for-loop
	//use this to store entries of [timestamp,  song_section] which will be used to mark the verse, chorus, etc of the tab
	//populated in the following for-loop

	for (int n = 0; n < tracks; n++)
	{
		const MidiMessageSequence* seq = midiFile.getTrack(n);
		MidiMessageSequence::MidiEventHolder * event = seq->getEventPointer(0); //get the event 0 for each track
		MidiMessage m = event->message;

		String trackName = m.getTextFromTextMetaEvent ();

		//TRACK WITH INSTRUMENT NOTES
		if (trackName.toLowerCase().contains(String(selectInstru)))
		//get indexes of the tracks which contain the songs sections, and drum notes
		{
			useTrack = n;
			//cout << "use Track " << useTrack << "\n";
		}

		//TIME SIGNATURE
		if (trackName.equalsIgnoreCase("midi_export"))
		//get information about the song
		//time signature and tempo are entries 2 and 3, where tick ==0
		{
			for (int nEvent = 1; nEvent < seq->getNumEvents(); nEvent++) 
			{
				event = seq->getEventPointer(nEvent); //get each event in track
				MidiMessage m = event->message;
				double tick = m.getTimeStamp();
				
				if (tick == 0)
				{
					//cout << n << " "  << nEvent  << " " << tick << " " << m.getTextFromTextMetaEvent() << "\n";
					//cout << n << " " << nEvent << " isTimeSignatureMetaEvent "  << m.isTimeSignatureMetaEvent () << " getTimeSignatureInfo \n"; //<< m.getTimeSignatureInfo() << "\n";
					//getTimeSignatureInfo (int &numerator, int &denominator)
					//cout << n << " " << nEvent << " isTempoMetaEvent "  << m.isTempoMetaEvent () << " getTimeSignatureInfo \n"; //<< m.getTimeSignatureInfo() << "\n";
				}
			}
		}

		//EVENTS
		else if (trackName.equalsIgnoreCase("events")) //store the song sections, and the tick values where they start
		{
			for (int nEvent = 1; nEvent < seq->getNumEvents(); nEvent++) 
				//loop through all events for this track, in which the TextFromTextMetaEvent() are in the format: [section <song section>]
				//song section eg: Intro, Main Riff 1, Main Riff 2, etc
			{
				//string tick_and_event[2];
				vector<string> tick_and_event;
				event = seq->getEventPointer(nEvent); //get each event in track
				MidiMessage m = event->message;

				//the timestamp associated which each song section
				double tick = m.getTimeStamp();
				ostringstream strs; //convert tick to a type string, to add to the tick_and_event array
				strs << tick;
				string timestamp = strs.str();

				//song section
				String songSection = m.getTextFromTextMetaEvent();
				songSection = songSection.substring(9, songSection.length()-1);  //ie "[section Intro]" is now "Intro"


				tick_and_event.push_back(timestamp);
				tick_and_event.push_back(songSection.toStdString());
				songSections.push_back(tick_and_event);
				//songSections.push_back(songSection.toStdString());
				//cout << n << " " << nEvent << " " << timestamp << " " << songSection << "\n"; 
			}
		}

	}

	if (timeSig == "")
	{
		//no time signature found. Assume 4/4
		timeSig = "4/4";
	}

	//create an ArrayList of all tick indexes we want in our tab
	vector<double> allTimestamps;
	const MidiMessageSequence* seq = midiFile.getTrack(useTrack);	//this is the sequence which contains notes on/off for the selected instrument	
	long lastTick = 0;
	for (int nEvent = 0; nEvent < seq->getNumEvents(); nEvent++)
	{
		MidiMessageSequence::MidiEventHolder * event = seq->getEventPointer(nEvent); //get each event in track
		MidiMessage message = event->message;

		//the timestamp associated which each song section
		const double timestamp = message.getTimeStamp();

		if(message.isNoteOn() //just note on timestamps, since for drums, we don't have to worry for duration
			&& find(allTimestamps.begin(), allTimestamps.end(), timestamp) == allTimestamps.end()) //if  !allTimestamps.contains(timestamp)
		{
			int note = message.getNoteNumber();
			int octave = note/12;

			if (octave == lvl)
			{
				allTimestamps.push_back(timestamp);
				//cout << nEvent << " " << timestamp <<  " " <<  note << " " << octave << " == "  << lvl << "\n";
			}
			//max value appears to be 100 = E8
		}
	}
	//allTimstamps is now all the unique time indexes of notes


	//create a 2d array, containging the timeTick and all notes played for that timeTick, for the whole song
	//int** masterList = new int[allTimestamps.size()][7] 
	int lengthOfMasterList = allTimestamps.size()+1; //plus one, to take into account for the individual drum part
	string **masterList = new string*[lengthOfMasterList]; 
	for(int i = 0; i < allTimestamps.size()+1; ++i) {
		masterList[i] = new string[7];
	}

	//string firstColumn[] = {"0", "B |", "FT|", "T2|", "S |", "HH|", "C |"};
	masterList[0][0] = "0";
	masterList[0][1] = "B |"; 
	masterList[0][2] = "FT|";
	masterList[0][3] = "T2|";
	masterList[0][4] = "S |";
	masterList[0][5] = "HH|";
	masterList[0][6] = "C |";
	//addArrayToMaster(masterList, firstColumn, 0);

	for (int i = 0; i < allTimestamps.size(); i++)//loop through all saved tick times
	{
		string oneTick[] = {"", "", "", "", "", "", ""};
		ostringstream strs; //convert allTimestamps[i] to a type string
		strs << allTimestamps[i];
		oneTick[0] = strs.str();
	
		for (int nEvent = 0; nEvent < seq->getNumEvents(); nEvent++) //loop through all events in track
		{
			MidiMessageSequence::MidiEventHolder * event = seq->getEventPointer(nEvent); //get each event in track
			MidiMessage message = event->message;

			//the timestamp associated which each song section
			const double timestamp = message.getTimeStamp();

			if (message.isNoteOn() //just note on timestamps, since for drums, we don't have to worry for duration
				&& timestamp == allTimestamps[i]) //if it's the timestamp we're looking for
			{
				//use http://www.electronics.dit.ie/staff/tscarff/Music_technology/midi/midi_note_numbers_for_octaves.htm to find the note and octave from getNoteNumber
				int note = message.getNoteNumber();
				int octave = note/12;

				if (octave == lvl)
				{
					convertToNote(oneTick, note);
				}
			}
			else if (timestamp > allTimestamps[i]) //we've gone past that point in the song
			{
				nEvent += seq->getNumEvents(); //break;
			}
		}
		
		//if there are any notes that are not played, use "-"
		for (int j = 0; j < oneTick->size(); j++)
		{
			if (oneTick[j] == "")
			{
				oneTick[j] = "-";
			}
			//cout<< oneTick[j] << " ";
		}
		addArrayToMaster(masterList, oneTick, i+1); //i+1, since [0] is the names of the drums
	}


	//work with time sig	
	long note_amount = atol(timeSig.substr(0, timeSig.find("/")).c_str()); //convert string to long
	long note_type = atol(timeSig.substr(timeSig.find("/")+1).c_str()); //convert string to long
	
	//GENERATE FINAL CONTENT TO BE PRINTED
	//the amount of --- should be printed in reverse, ie "1---3", the "---" is determined by "3".
	//if time 1 is 0, 3 is ticks_per_beat, and the ticks per beat is 480, "---" is printed, then "3"
	//if time 1 is 0, 3 is ticks_per_beat/2, ""							, "-" is printed, then "3"
	//if time 1 is 0, 3 is ticks_per_beat/4, ""							, "" is printed, then "3"
			
	//every ticks_per_beat*note_amount there should be a bar

	int noteAmount = 6; //amount of notes defined (base, snare, etc). 1 is the tick time, anything more is a drum
	int amountOfBarsPerLine = 4;
	
	//"complete" will be the final data, which will be printed. It will be masterList, but with bars inserted in keeping with the timeSig, and with the name of the song part
	vector<vector<string>> completeList; //a 2D vector
	vector<string> tickTimesUsed;

	for (int j = 1; j <= noteAmount; j++) //crash at the top, bass at the bottom, start at index 1 because index 0 contains the timestamp
	{		
		//TODO fix error where events are in margin
		int listIndex = 0;			//the index we are at in "line"
		long bar_index = 0;			//the index we are in a certain bar. Ie, the first "-" after a bar is at index one
		int barCount = 0;			//the amount of bars, eg "|-------|-------|----" is 3 bars, barCount = 3
				
		vector<string> line;		//this will containing bars "|", gaps between notes "-", and the markers for a note "X" or "O"
		vector<string> eventLine;	//this will be the line containing only spaces and song section/event names
		string start = "";			//this will contain "HH|", "B |", etc, depending on the value of j


		for (int i = 0; i < lengthOfMasterList; i++)//loop through all saved tick times, for this drum
		{
			if (i > 1) //the symbols for the drum kit, and the very first note should be printed without anything else in front of them
			{
				long currentNoteTick = atol(masterList[i][0].c_str()); //the tick belonging to the current note
				long previousNoteTick = atol(masterList[i-1][0].c_str()); //the tick belonging to the previous note
				long diff = currentNoteTick - previousNoteTick;
				
				while (diff > (ticks_per_beat/note_amount)+5) //+5, to allow for some time differences
				{
					//NOTE
					line.push_back("-");
					bar_index++;//update bar_index to reflect adding the "-"
					diff -= (ticks_per_beat/note_amount); //seems to be 17 for first bar, 16 for the rest
					
					if (j ==1) //EVENT
					{
						eventLine.push_back(" "); //have to add an additional gap to eventLine, to keep it the same length as line
					}
							
					if (bar_index == (note_amount*note_type)) //every (note_amount*note_type)+1 character should be a bar line
					{
						line.push_back("|");
						if (j ==1) //EVENT
						{
							eventLine.push_back(" "); //have to add an additional gap to eventLine, to keep it the same length as line
						}
						
						bar_index = 0; //reset bar_index, as we are now in a new bar
						barCount++;
						
						if (barCount == amountOfBarsPerLine) //we have the amount of bars we want in a line. Now move onto a new line
						{
							if (j ==1) //EVENT
							{
								//NOTE
								//we want to start new line	
								completeList.insert(completeList.begin()+listIndex, line); //insert the vector "line" at index "listIndex"
								listIndex++;
								
								line.clear();
								line.push_back(start); //always have which drum it is, at the start of the line
								barCount =0; //reset barCount for the current line
																	
								//we want to start new line
								completeList.insert(completeList.begin()+listIndex, eventLine); //insert the vector "eventLine" at index "listIndex"
								listIndex++;
										
								eventLine.clear();
								eventLine.push_back("  "); //2 gaps
							}
							else
							{
								//NOTE
								//we want to start new line
								completeList.insert(completeList.begin()+listIndex, line); //insert the vector "line" at index "listIndex"
								listIndex += j+1;// + num; //this orders the notes
								
								line.clear();
								line.push_back(start); //always have which drum it is, at the start of the line
								barCount =0; //reset barCount for the current line
							}
						}
					}
				}
				if (j ==1 ) //EVENT
				{
					string curTick = masterList[i][0];
					string s = getEventAtTick(songSections, curTick);
					eventLine.push_back(s);

					tickTimesUsed.push_back(curTick);
				}
			}
			else if (i == 1) //check to see where abouts in the bar the first note should be
			{
				long currentNoteTick = atol(masterList[i][0].c_str()); //the tick belonging to the current note
				long gapBeforeFirst = currentNoteTick%(ticks_per_beat*note_amount);
				while (gapBeforeFirst > 0)
				{
					if (j ==1)// && !tickTimesUsed.contains(""+currentNoteTick)) //EVENT
					{
						string curTick = masterList[i][0];
						string s = getEventAtTick(songSections, curTick);
						eventLine.push_back(s);

						tickTimesUsed.push_back(curTick);
					}
							
					//NOTE
					line.push_back("-");
					bar_index++;//update bar_index to reflect adding the "-"
					gapBeforeFirst -= (ticks_per_beat/note_amount);
				}
			}
			else if (i == 0)//the very first index of an array for a note, ie "B |", "HH|", etc
			{
				start += masterList[i][j]; // "B |", "HH|", etc
				bar_index--; //printing out the first "|" will make bar_index = 1, when we want it to be 0
			}
			string curTick = masterList[i][0];

			if (j ==1 //EVENT
				&& find(tickTimesUsed.begin(), tickTimesUsed.end(), curTick) == tickTimesUsed.end()) //if  !allTimestamps.contains(timestamp)
			{
				string s = getEventAtTick(songSections, curTick);
				eventLine.push_back(s);
				tickTimesUsed.push_back(curTick);
			}
					
			//NOTE
			cout << "\tadding note: " + masterList[i][j];
			line.push_back(masterList[i][j]);
			bar_index++; //update bar_index to reflect adding the note
					
			//if adding the note has ended the bar
			if (bar_index == (note_amount*note_type)) //every (note_amount*note_type)+1 character should be a bar line
			{
				line.push_back("|");
				if (j ==1) //EVENT
				{
					eventLine.push_back(" "); //have to add an additional gap to eventLine, to keep it the same length as line
				}
						
				bar_index = 0; //reset bar_index, as we are now in a new bar
				barCount++;
				
				//TODO: why is this the same as a section of code above?
				if (barCount == amountOfBarsPerLine) //a new line
				{
					if (j ==1) //EVENT
					{
						//NOTE
						//we want to start new line	
						completeList.insert(completeList.begin()+listIndex, line); //insert the vector "line" at index "listIndex"
						listIndex++;
								
						line.clear();
						line.push_back(start); //always have which drum it is, at the start of the line
						barCount =0; //reset barCount for the current line
																	
						//we want to start new line
						completeList.insert(completeList.begin()+listIndex, eventLine); //insert the vector "eventLine" at index "listIndex"
						listIndex++;
										
						eventLine.clear();
						eventLine.push_back("  "); //2 gaps
					}
					else
					{
						//NOTE
						//we want to start new line
						completeList.insert(completeList.begin()+listIndex, line); //insert the vector "line" at index "listIndex"
						listIndex += j+1;// + num; //this orders the notes
							
						line.clear();
						line.push_back(start); //always have which drum it is, at the start of the line
						barCount =0; //reset barCount for the current line
					}
				}
			}
					
			if (i == lengthOfMasterList-1) //the very last index of an array for a note. Could be a note, or a "-"
			{
				cout << "true";
				//we want to add this bar to the arrayList, because it is the end, regardless if it's a full bar
				completeList.insert(completeList.begin()+listIndex, line); //insert the vector "line" at index "listIndex"
				listIndex += j; //this orders the notes
						
				line.clear();
				line.push_back(start); //always have which drum it is, at the start of the line
				barCount =0; //reset barCount for the current line
			}
		}
	}

		vector<vector<string>>::iterator it1;
		vector<string>::iterator it2;
		int i = 0;
		for (it1 = completeList.begin(); it1 != completeList.end(); ++it1 )
		{
			if (i%(noteAmount+1)==0)//a new section. Add a gap to make it easier to read. Plus 1, for event line
			{
				//cout <<  "\n"; //print a new line
				printThis += "\n";
			}

			string line = ""; //reset line
			for (it2 = (*it1).begin(); it2 != (*it1).end(); ++ it2 ) //create a whole line to print
			{
				line += (*it2); //a single character
			}

			std::tr1::regex rx(".*[a-z]+.*"); //the line contains a note
			bool containsNote = regex_match(line.begin()+3, line.end(), rx);
			//line.substr(3); 
			//if (line.find("O") != string::npos || line.find("O") != string::npos || containsNote)
			//{
				//cout << line << "\n";
				printThis += line + "\n";
			//}

			i++;
		}

	ofstream myfile;
	myfile.open ("C:\\Users\\Sinead\\Desktop\\example.txt");
	myfile << printThis;
	myfile.close();

	for(int i = 0; i < lengthOfMasterList; ++i) {
		delete [] masterList[i];
	}
	delete [] masterList;


	char c;
	cin >> c;

    return 0;
}

string convertToNote (int num)
{
	int  octave = num/12;
	int  note = num%12;
	string n = "" + octave;
	return n;
}

void addArrayToMaster(string ** &masterList, string addThis[], int atIndex)
{
	//cout << masterList;
	for (int i = 0; i < addThis->size(); i++)
	{
		masterList[atIndex][i] = addThis[i];
	}
}

//return the event at tick ___
string getEventAtTick (vector<vector<string>> songSections, String tick)
{
	string s = " ";
	for (int i = 0; i < songSections.size(); ++i)
	{
		if (songSections[i][0] == tick)
		{
			s = songSections[i][1];
		}
	}
	return s;
}

void convertToNote (string *tickIndex, int num)
{
	int key = num%12; //the note index. Eg 0 is C, 1 is C#, 2 is D, etc
		//TODO get other notes
		//index 0 will be tick time /timestamp
		
		//the position in tickIndex is important. the notes are read from index 1 to 6, ie the base drum note will always be on the bottom line
		if (key == 0) {
			tickIndex[1] = "O";//"base drum";
		}
		else if (key == 3) {
			tickIndex[2] = "O";//""floor";
		}
		else if (key == 5) {
			tickIndex[3] = "O";//""right-tom";
		}
		else if (key == 1) {
			tickIndex[4] = "O";//""snare";
			//cout << " snare";
		}
		else if (key == 2) {
			tickIndex[5] = "X";//""hi-hat";
			//cout << " hihat";
		}
		else if (key == 4) {
			tickIndex[6] = "X";//""crash";
			//cout << " crash";
		}
		else {
			cout << "ERROR\n";
		}
	}
