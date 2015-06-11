import sys
import codecs
import locale


line_array = []
station_array = []
line_station_array = []

def findLine(line_name_input):
    for (line_id, line_number, line_name) in line_array:
        if line_name == line_name_input:
        	return True
    return False

with codecs.open('ratp_station.csv', 'r', encoding='latin-1') as stationFile:
    station_id = 0
    for line in stationFile:
        station_split = line[:-1].split('#')
        if station_split[5] == 'metro':
        	station_id = station_split[0]
        	station_name = station_split[3]
        	station_array.append((station_id, station_name))
        	print station_id + " => " + station_name

with codecs.open('ratp_line.csv','r', encoding='latin-1') as lineFile:
    line_id = 0
    for line in lineFile:
        line_split = line[:-1].split('#')
        if line_split[2] == 'metro':
        	station_id = line_split[0]
        	split = line_split[1].split(' ', 1)
        	line_number = split[0]
        	line_name = split[1]
        	if not findLine(line_name):
        		line_array.append((line_id, line_number, line_name))
        		line_id = line_id + 1
        	line_station_array.append((line_id, station_id))

with codecs.open('station.csv','w',encoding='latin-1') as stationFile:
    stationFile.write('id;station_name\n')
    for (station_id, station_name) in station_array:
    	stationFile.write(station_id + ';' + station_name + '\n')

with codecs.open('line.csv','w',encoding='latin-1') as lineFile:
    lineFile.write('id;line_number;line_name\n')
    for (line_id, line_number, line_name) in line_array:
    	lineFile.write(str(line_id) + ';' + str(line_number) + ';' + line_name + '\n')

with codecs.open('line_station.csv','w',encoding='latin-1') as stationLineFile:
    stationLineFile.write('line_id;station_id\n')
    for (line_id, station_id) in line_station_array:
    	stationLineFile.write(str(line_id) + ';' + str(station_id) + '\n')
