//Edited by Sinéad Kearney

/*
 *	DumpSequence.java
 *
 *	This file is part of jsresources.org
 */

/*
 * Copyright (c) 1999, 2000 by Matthias Pfisterer
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 * - Redistributions of source code must retain the above copyright notice,
 *   this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright
 *   notice, this list of conditions and the following disclaimer in the
 *   documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
 * STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/*
|<---            this code is formatted to fit into 80 columns             --->|
*/

import java.io.File;
import java.util.ArrayList;

import javax.sound.midi.MidiSystem;
import javax.sound.midi.Sequence;
import javax.sound.midi.Track;
import javax.sound.midi.MidiEvent;
import javax.sound.midi.MidiMessage;
import javax.sound.midi.ShortMessage;
import javax.sound.midi.MetaMessage;
import javax.sound.midi.Receiver;


public class DumpSequence
{
	private static String[]	sm_astrKeyNames = {"C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"};

	private static Receiver		sm_receiver = new DumpReceiver(System.out, true);




	public static void main(String[] args)
	{
		/*
		 *	We check that there is exactly 3 command-line
		 *	argument. If not, we display the usage message and
		 *	exit.
		 */
		if (args.length != 3)
		{
			System.out.println("DumpSequence: usage:");
			System.out.println("\tjava DumpSequence <midifile> <\"guitar\" | \"bass\" | \"drums\" | \"vocals\"> <\"easy\" | \"medium\" | \"hard\" | \"expert\">");
			System.exit(1);
		}
		
		/*
		 *	Now, that we're sure there is an argument, we take it as
		 *	the filename of the soundfile we want to play.
		 */
		String	strFilename = args[0];
		String selectInstru = args[1];
		if (!selectInstru.equals("guitar") && !selectInstru.equals("bass") && !selectInstru.equals("drums") && !selectInstru.equals("vocals"))
		{
			System.out.println("invalid instrument");
			System.exit(1);
		}
		String level = args[2];
		int lvl = 0;
		if (level.equals("easy"))
		{
			lvl = 4;
		}
		else if (level.equals("medium"))
		{
			lvl = 5;
		}
		else if (level.equals("hard"))
		{
			lvl = 6;
		}
		else if (level.equals("expert"))
		{
			lvl = 7;
		}
		else
		{
			System.out.println("invalid level");
			System.exit(1);
		}
		
		File	midiFile = new File(strFilename);

		/*
		 *	We try to get a Sequence object, which the content
		 *	of the MIDI file.
		 */
		Sequence	sequence = null;
		try
		{
			sequence = MidiSystem.getSequence(midiFile);
		}
		catch (Exception e)
		{
			e.printStackTrace();
			System.exit(1);
		}
//		catch (InvalidMidiDataException e)
//		{
//			e.printStackTrace();
//			System.exit(1);
//		}
//		catch (IOException e)
//		{
//			e.printStackTrace();
//			System.exit(1);
//		}

		/*
		 *	And now, we output the data.
		 */
		if (sequence == null)
		{
			System.out.println("Cannot retrieve Sequence.");
		}
		else
		{
			System.out.println("File: " + strFilename);
			System.out.println("Instrument: " + selectInstru);
			System.out.println("Level: " + level);
			long dur = sequence.getMicrosecondLength();
			
			String	strResolutionType = null;
			if (sequence.getDivisionType() == Sequence.PPQ)
			{
				strResolutionType = " ticks per beat";
			}
			else
			{
				strResolutionType = " ticks per frame";
			}
			long ticks_per_beat = sequence.getResolution();
//			System.out.println(ticks_per_beat);
			Track[]	tracks = sequence.getTracks();
			
			//we want only track with track name "midi_export", "EVENTS" and  "PART DRUMS"
			//create an arrayList with only the index of the tracks we want
			String timeSig = "";//, timeSigOther = "", tempoBPM = "";
			int useTrack = 0;
			
			ArrayList<String[]> events = new ArrayList<String[]>();
			for (int nTrack = 0; nTrack < tracks.length; nTrack++)
			{
				Track	track = tracks[nTrack];
				
				MidiEvent	event = track.get(0);
				MidiMessage m = event.getMessage();
				if (m instanceof MetaMessage)
				{
					MetaMessage meta = (MetaMessage) m;
					String trackName = DumpReceiver.myDecodeMessage(meta);
					trackName = trackName.toLowerCase();
					if (trackName.contains(selectInstru))
						//get indexes of the tracks which contain the songs sections, and drum notes
					{
						useTrack = nTrack;
					}
					else if (trackName.contains("midi_export"))
						//get information about the song
						//time signature and tempo are entries 2 and 3, where tick ==0
					{
						for (int nEvent = 1; nEvent < track.size(); nEvent++)
						{
							event = track.get(nEvent);
							m = event.getMessage();
							long lTicks = event.getTick();
							if (lTicks == 0)
							{
								String line = DumpReceiver.mySend(m, lTicks).toLowerCase();
//								System.out.println(line);
								if (line.contains("time signature"))
								{
									timeSig = line.substring(line.indexOf("time signature: ")+ ("time signature: ").length());
									timeSig = timeSig.substring(0, timeSig.indexOf(','));
								}
							}
						}
					}
					else if (trackName.contains("events"))
						//store the song sections, and the tick values where they start
					{
						for (int nEvent = 1; nEvent < track.size(); nEvent++)
						{
							String[] tick_and_event = new String[2];
							event = track.get(nEvent);
							m = event.getMessage();
							long lTicks = event.getTick();
							String line = DumpReceiver.mySend(m, lTicks).toLowerCase();
							if (line.contains("text event: [section"))
							{
								tick_and_event[0] = "" + lTicks;
								line = line.substring(line.indexOf("text event: [section") + "text event: [section".length(), line.length()-1);
								tick_and_event[1] = line;
								events.add(tick_and_event);
							}
						}
					}
				}
			}
			

			if (timeSig.equals(""))
			{
				//no time signature found. Assume 4/4
				timeSig = "4/4";
			}
			
			//create an ArrayList of all tick indexes we want in our tab
			ArrayList<Long> allTicks = new ArrayList<Long>();
			Track	track = tracks[useTrack];
					
			long lastTick = 0;
			for (int nEvent = 0; nEvent < track.size(); nEvent++)
			{
				String line = "";
				MidiEvent	event = track.get(nEvent);
				MidiMessage	message = event.getMessage();
				long lTicks = event.getTick();
				
				if (message instanceof ShortMessage)
				{
					line = DumpReceiver.myDecodeMessage((ShortMessage) message).toLowerCase();
					if (line.contains("note on") && line.endsWith(""+lvl) && !allTicks.contains(lTicks))
					{
						allTicks.add(lTicks);
					}
				}
			}
			//allTicks are now all the unique time indexes of notes
			

			//create a 2d array, containging the timeTick and all notes played for that timeTick, for the whole song
			String[][] masterList = new String[allTicks.size()+1][0]; //plus one, to take into account for the drum part
			masterList[0] = new String[] {"0", "B |", "FT|", "T2|", "S |", "HH|", "C |"};
			
			for (int i = 0; i < allTicks.size(); i++)//loop through all saved tick times
			{
				String[] oneTick = new String[] {"", "", "", "", "", "", ""};
				oneTick[0] = "" +allTicks.get(i);
				
				for (int nEvent = 0; nEvent < track.size(); nEvent++) //loop through all events in track
				{
					String line = "";
					MidiEvent	event = track.get(nEvent);
					MidiMessage	message = event.getMessage();
					long lTicks = event.getTick();
					
					if (message instanceof ShortMessage && lTicks == allTicks.get(i)) //if it's a short message, and is the tick we're looking for
					{
						line = DumpReceiver.myDecodeMessage((ShortMessage) message).toLowerCase();
						if (line.contains("note on") && line.endsWith(""+lvl))
						{
							insert(oneTick, line);
						}
					}
					else if (lTicks > allTicks.get(i)) //we've gone past that point in the song
					{
						nEvent += track.size();
					}
				}
				
				//if there are any notes that are not played, use "-"
				for (int j = 0; j < oneTick.length; j++)
				{
					if (oneTick[j].equals(""))
					{
						oneTick[j] = "-";
					}
				}
				masterList[i+1] = oneTick; //i+1, since [0] is the names of the drums
			}

			
			//work with time sig
			
			long note_amount = Long.valueOf(timeSig.substring(0, timeSig.indexOf("/")));
			System.out.println("timeSig "+ timeSig + " ticks_per_beat/note_amount " + ticks_per_beat/note_amount);
			long note_type = Long.valueOf(timeSig.substring(timeSig.indexOf("/")+1));
			
			//GENERATE FINAL CONTENT TO BE PRINTED
			//the amount of --- should be printed in reverse, ie 1---3, is determined by 3.
			//if time 1 is 0, 3 is ticks_per_beat, and the ticks per beat is 480, --- is printed, then 3
			//if time 1 is 0, 3 is ticks_per_beat/2, ""							, - is printed, then 3
			//if time 1 is 0, 3 is ticks_per_beat/4, ""							, nothing is printed, then 3
			
			//every ticks_per_beat*note_amount there should be a bar

			int noteAmount = 6; //amount of notes defined. 1 is the tick time, anything more is a drum
			int amountOfBarsPerLine = 4;
			
			String[][] complete;
			ArrayList<String[]> completeList = new ArrayList<String[]>();
			ArrayList<String> tickTimesUsed = new ArrayList<String>();
			
			
			//TODO: fix structure of code. seperate into smaller functions.
			for (int j = 1; j <= noteAmount; j++) //crash at the top, bass at the bottom
			{
				int listIndex = 0;
				//TODO fix error where events are in margin
				
				long bar_index = 0;
				int barCount = 0;
				
				String[] lineArray;
				String[] eventLineArray;
				ArrayList<String> line = new ArrayList<String>();
				ArrayList<String> eventLine = new ArrayList<String>();
				
				String start = "";
				for (int i = 0; i < masterList.length; i++)//loop through all saved tick times, for this drum
				{
					if (i > 1) //the symbols for the drum kit, and the very first note should be printed without anything else in front of them
					{
						long currentNoteTick = Long.valueOf(masterList[i][0]); //the tick belonging to the current note
						long previousNoteTick = Long.valueOf(masterList[i-1][0]); //the tick belonging to the previous note
						long diff = currentNoteTick - previousNoteTick;
						
						while (diff > (ticks_per_beat/note_amount)+5) //to allow for some time differences
						{
							//NOTE
							line.add("-");
							bar_index++;//update bar_index to reflect adding the "-"
							diff -= (ticks_per_beat/note_amount); //seems to be 17 for first bar, 16 for the rest
							
							if (j ==1) //EVENT
							{
								eventLine.add(" "); //have to add an additional gap to eventLine, to keep it the same length as line
							}
							
							if (bar_index == (note_amount*note_type)) //every (note_amount*note_type)+1 character should be a bar line
							{
								line.add("|");
								if (j ==1) //EVENT
								{
									eventLine.add(" "); //have to add an additional gap to eventLine, to keep it the same length as line
								}
								
								bar_index = 0; //reset bar_index, as we are now in a new bar
								barCount++;
								
								if (barCount == amountOfBarsPerLine) //a new line
								{
									//int num = 1;
									if (j ==1) //EVENT
									{
										//NOTE
										//we want to start new line
										lineArray = new String[line.size()];
										lineArray = line.toArray(lineArray); //cast ArrayList to Array
										completeList.add(listIndex, lineArray);
										listIndex++;
										
										line = new ArrayList<String>();
										line.add(start); //always have which drum it is, at the start of the line
										barCount =0; //reset barCount for the current line
										
										
										
										//we want to start new line
										eventLineArray = new String[eventLine.size()];
										eventLineArray = eventLine.toArray(eventLineArray); //cast ArrayList to Array
										completeList.add(listIndex, eventLineArray);
										listIndex++;
										
										eventLine = new ArrayList<String>();
										eventLine.add("  "); //2 gaps
									}
									else
									{
										//NOTE
										//we want to start new line
										lineArray = new String[line.size()];
										lineArray = line.toArray(lineArray); //cast ArrayList to Array
										completeList.add(listIndex, lineArray);
										listIndex += j+1;// + num; //this orders the notes
										
										line = new ArrayList<String>();
										line.add(start); //always have which drum it is, at the start of the line
										barCount =0; //reset barCount for the current line
									}
								}
							}
						}
						if (j ==1)// && !tickTimesUsed.contains(""+currentNoteTick)) //EVENT
						{
							String s = getEventAtTick(events, ""+currentNoteTick);
							eventLine.add(s);
							tickTimesUsed.add(""+currentNoteTick);
						}
					}
					else if (i == 1) //check to see where abouts in the bar the first note should be
					{
						long currentNoteTick = Long.valueOf(masterList[i][0]);
						long gapBeforeFirst = currentNoteTick%(ticks_per_beat*note_amount);
						while (gapBeforeFirst > 0)
						{
							if (j ==1)// && !tickTimesUsed.contains(""+currentNoteTick)) //EVENT
							{
								String s = getEventAtTick(events, ""+currentNoteTick);
								eventLine.add(s);
								tickTimesUsed.add(""+currentNoteTick);
							}
							
							//NOTE
							line.add("-");
							bar_index++;//update bar_index to reflect adding the "-"
							gapBeforeFirst -= (ticks_per_beat/note_amount);
						}
					}
					else if (i == 0)//the very first index of an array for a note, ie "B |", "HH|", etc
					{
						start += masterList[i][j]; // "B |", "HH|", etc
						bar_index--; //printing out the first "|" will make bar_index = 1, when we want it to be 0
					}
					
					long currentNoteTick = Long.valueOf(masterList[i][0]); //the tick belonging to the current note
					if (j ==1 && !tickTimesUsed.contains(""+currentNoteTick)) //EVENT
					{
						String s = getEventAtTick(events, ""+currentNoteTick);
						eventLine.add(s);
						tickTimesUsed.add(""+currentNoteTick);
					}
					
					//NOTE
					line.add(masterList[i][j]);
					bar_index++; //update bar_index to reflect adding the note
					
					//if adding the note has ended the bar
					if (bar_index == (note_amount*note_type)) //every (note_amount*note_type)+1 character should be a bar line
					{
						line.add("|");
						if (j ==1) //EVENT
						{
							eventLine.add(" "); //have to add an additional gap to eventLine, to keep it the same length as line
						}
						
						bar_index = 0; //reset bar_index, as we are now in a new bar
						barCount++;
						
						if (barCount == amountOfBarsPerLine) //a new line
						{
							//int num = 1;
							if (j ==1) //EVENT
							{
								//NOTE
								//we want to start new line
								lineArray = new String[line.size()];
								lineArray = line.toArray(lineArray); //cast ArrayList to Array
								completeList.add(listIndex, lineArray);
								listIndex++;
								
								line = new ArrayList<String>();
								line.add(start); //always have which drum it is, at the start of the line
								barCount =0; //reset barCount for the current line
								
								
								
								//we want to start new line
								eventLineArray = new String[eventLine.size()];
								eventLineArray = eventLine.toArray(eventLineArray); //cast ArrayList to Array
								completeList.add(listIndex, eventLineArray);
								listIndex++;
								
								eventLine = new ArrayList<String>();
								eventLine.add("  "); //2 gaps
							}
							else
							{
								//NOTE
								//we want to start new line
								lineArray = new String[line.size()];
								lineArray = line.toArray(lineArray); //cast ArrayList to Array
								completeList.add(listIndex, lineArray);
								listIndex += j+1;// + num; //this orders the notes
								
								line = new ArrayList<String>();
								line.add(start); //always have which drum it is, at the start of the line
								barCount =0; //reset barCount for the current line
							}
						}
					}
					
					
					
					
					
					if (i == masterList.length-1) //the very last index of an array for a note. Could be a note, or a "-"
					{
							//we want to add this bar to the arrayList, because it is the end, regardless if it's a full bar
							lineArray = new String[line.size()];
							lineArray = line.toArray(lineArray); //cast ArrayList to Array
							completeList.add(listIndex, lineArray);
							listIndex += j; //this orders the notes
							
							line = new ArrayList<String>();
							line.add(start); //always have which drum it is, at the start of the line
							barCount =0; //reset barCount for the current line
					}
				}
			}

			complete = new String[completeList.size()][];
			complete = completeList.toArray(complete); //cast ArrayList to Array
			//complete is the tab with bar lines
			
			
			//PRINT
			for (int i = 0; i < complete.length; ++i)
			{
				if (i%(noteAmount+1)==0)//a new section. Add a gap to make it easier to read. Plus 1, for event line
				{
					System.out.println();
				}
				String line = ""; //reset line
				for (int j = 0; j < complete[i].length; j++) //create a whole line to print
				{
					line += complete[i][j]; //a single character
				}
				if (line.contains("O") || line.contains("X") || line.substring(3).matches(".*[a-z]+.*")) //the line contains a note
					//substring, so the [a-z]  isn't the drum part, of a blank line
				{
					System.out.println(line);
				}
				
			}
		}
	}

	
	public static void insert(String[] tickIndex, String line)
	{
		//TODO get other notes
		//index 0 will be tick time
		String instru = line.substring(line.lastIndexOf(' ')+1, line.length()-1); //<letter>[#]
		if (instru.equals("c"))
		{
			tickIndex[1] = "O";//"base";
		}
		else if (instru.equals("f"))
		{
			tickIndex[2] = "O";//""floor";
		}
		else if (instru.equals("d#"))
		{
			tickIndex[3] = "O";//""right-tom";
		}
		else if (instru.equals("c#"))
		{
			tickIndex[4] = "O";//""snare";
		}
		else if (instru.equals("d"))
		{
			tickIndex[5] = "X";//""hi-hat";
		}

		else if (instru.equals("e"))
		{
			tickIndex[6] = "X";//""crash";
		}
		else
		{
			System.out.println("Unknown note " + line);
			System.exit(1);
		}
	}

	//return the event at tick ___
	public static String getEventAtTick (ArrayList<String[]> events, String tick)
	{
		String s = " ";
		for (int i = 0; i < events.size(); ++i)
		{
			if (events.get(i)[0].equals(tick))
			{
				s = events.get(i)[1];
			}
		}
		return s;
	}
}


