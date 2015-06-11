import codecs
import locale
import csv

with codecs.open('data.sql', 'w', encoding='utf8') as dataFile:
    dataFile.write('USE ratp;\n')
    with codecs.open('data/line_utf8.csv', 'r') as lineFile:
        readerCsv = csv.reader(lineFile, delimiter=';')
        for row in readerCsv:
        	dataFile.write('INSERT INTO line(id_line, line_number, line_name) VALUES (\'' + row[0] + '\',\'' + row[1] + '\',"' + row[2].decode('utf8') + '");\n')

    with codecs.open('data/station_utf8.csv', 'r') as lineFile:
        readerCsv = csv.reader(lineFile, delimiter=';')
        for row in readerCsv:
        	dataFile.write('INSERT INTO station(id_station, station_name) VALUES (\'' + row[0] + '\',"' + row[1].decode('utf8') + '");\n')

    with codecs.open('data/line_station_utf8.csv', 'r') as lineFile:
        readerCsv = csv.reader(lineFile, delimiter=';')
        for row in readerCsv:
        	dataFile.write('INSERT INTO line_station(id_line, id_station) VALUES (\'' + str(int(row[0]) - 1) + '\',\'' + row[1] + '\');\n')


