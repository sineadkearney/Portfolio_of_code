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
#include "../JuceLibraryCode/JuceHeader.h"
using namespace std;

//==============================================================================
string convertToNoteOctave (int num);

int main (int argc, char* argv[])
{
	cout << "Path and name of file: ";
	//String st = "C:\\Program Files (x86)\\Phase Shift\\music\\Paramore\\Paramore - Ignorance\\notes.mid"; //this file was throwing exceptions in Java version
	String st = "C:\\Program Files (x86)\\Phase Shift\\music\\The Donnas\\09 - Take It Off\\notes.mid"; //hardcoded for now

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
	
	//set instrument
	string selectInstru = "drums";
	if (selectInstru != "guitar" && selectInstru != "bass" && selectInstru != "drums" && selectInstru != "vocals")
	{
		cout << "invalid instrument";
		return 1;
	}

	int tracks = midiFile.getNumTracks(); 
	cout << tracks << "\n";

	int useTrack = 0; //the index of the mid file which contains the notes for the instrument. Set in following for-loop
	string timeSig = ""; //the time signature of the song. Set in following for-loop
	vector<string> songSections; //timestamps and sections names of the song. Set in following for-loop
	//vector<string[]> songSections; //giving errors
	//use this to store entries of [timestamp,  song_section] which will be used to mark the verse, chorus, etc of the tab
	//populated in the following for-loop

	for (int n = 0; n < tracks; n++)
	{
		const MidiMessageSequence* seq = midiFile.getTrack(n);
		MidiMessageSequence::MidiEventHolder * event = seq->getEventPointer(0); //get the event 0 for each track
		MidiMessage m = event->message; //the midi message for this track
		String trackName = m.getTextFromTextMetaEvent (); //the name of the message

		//TRACK WITH INSTRUMENT NOTES
		if (trackName.toLowerCase().contains(String(selectInstru)))
		//get index of the track which contain the music notes for the selected instrument
		{
			useTrack = n;
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
					//cout << n << " " << nEvent << " isTimeSignatureMetaEvent "  << m.isTimeSignatureMetaEvent () << " getTimeSignatureInfo \n"; //<< m.getTimeSignatureInfo() << "\n";
					//getTimeSignatureInfo (int &numerator, int &denominator)
					//TODO: need code to get time signature
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
				event = seq->getEventPointer(nEvent); //get each event in track
				MidiMessage m = event->message;

				//the timestamp associated which each song section
				double tick = m.getTimeStamp();
				std::ostringstream strs; //convert tick to a type string, to add to the tick_and_event array
				strs << tick;
				std::string timestamp = strs.str();

				//song section
				String songSection = m.getTextFromTextMetaEvent();
				songSection = songSection.substring(9, songSection.length()-1);  //ie "[section Intro]" is now "Intro"


				//tick_and_event[0] = timestamp;
				//tick_and_event[1] = songSection.toStdString();
				songSections.push_back(timestamp);
				songSections.push_back(songSection.toStdString());
			}
		}

	}

	if (timeSig == "")
	{
		//no time signature found. Assume 4/4
		timeSig = "4/4";
	}

	//create an ArrayList of all tick indexes we want in our tab
	vector<double> allTimestampsV;
	const MidiMessageSequence* seq = midiFile.getTrack(useTrack);		
	long lastTick = 0;
	for (int nEvent = 0; nEvent < seq->getNumEvents(); nEvent++)
	{
		MidiMessageSequence::MidiEventHolder * event = seq->getEventPointer(nEvent); //get each event in track
		MidiMessage message = event->message;

		//the timestamp associated which each song section
		const double timestamp = message.getTimeStamp();

		if(message.isNoteOn() //just note on timestamps, since for drums, we don't have to worry for duration
			&& find(allTimestampsV.begin(), allTimestampsV.end(), timestamp) == allTimestampsV.end()) //if  !allTimestamps.contains(timestamp)
		{
			//use http://www.electronics.dit.ie/staff/tscarff/Music_technology/midi/midi_note_numbers_for_octaves.htm to find the note and octave from getNoteNumber
			int note = message.getNoteNumber();
			int octave = note/12;

			if (octave == lvl)
			{
				allTimestampsV.push_back(timestamp);
				cout << nEvent << " " << timestamp <<  " " <<  note << " " << octave << " == "  << lvl << "\n";
			}
			//max value appears to be 100 = E8
		}
	}
	//allTimstamps is now all the unique time indexes of notes
	double* allTimestamps = &allTimestampsV[0];

	//TODO: finish

	char c;
	cin >> c;



    return 0;
}

string convertToOctave (int num)
{
	int  octave = num/12;
	int  note = num%12;
	string n = "" + octave;
	return n;
}