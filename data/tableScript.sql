# Name: MySQL Database Table Creation Script
# Author: Jakob Anderson
# Assignment: #3
# Description: creates tables, fields and data

# use my database on jordan
# USE skabone;

# STUDENTS TABLE SECTION
#######################################################

# drop student table if it exists
DROP TABLE IF EXISTS students;

# create student table
CREATE TABLE students 
(
	StudentId INT(9) NOT NULL PRIMARY KEY auto_increment, 
	FirstName VARCHAR(20), 
	LastName VARCHAR(30),
	MajorCode INT(4),
	Birthdate DATE,
	Gender CHAR(1),
	City VARCHAR(30),
	State VARCHAR(2)
);

# populate student table
INSERT INTO students VALUES (NULL,      'Albin',     'Gustavstrohm',    1001,   '1980-06-01',   'M',   'Tacoma',          'WA'     );
INSERT INTO students VALUES (NULL,      'Alvar',     'Haakonsen',       1002,   '1981-05-02',   'M',   'Steilacoom',      'AR'     );
INSERT INTO students VALUES (NULL,      'Anders',    'Halldorsson',     1003,   '1982-04-03',   'M',   'Seattle',         'WA'     );
INSERT INTO students VALUES (NULL,      'Annika',    'Hedvigsen',       1004,   '1983-03-04',   'F',   'Lakewood',        'KS'     );
INSERT INTO students VALUES	(NULL,      'Asbjorn',   'Hegeson',         1005,   '1984-02-05',   'M',   'Kirkland',        'IL'     );
INSERT INTO students VALUES (NULL,      'Astrid',    'Helgagren',       1006,   '1985-01-06',   'F',   'Kent',            'ID'     );
INSERT INTO students VALUES (NULL,      'Axel',      'Hemmingsson',     1007,   '1986-12-07',   'M',   'Fircrest',        'OR'     );
INSERT INTO students VALUES (NULL,      'Beata',     'Henrikssen',      1008,   '1987-11-08',   'F',   'Forks',           'CA'     );
INSERT INTO students VALUES (NULL,      'Bergljot',  'Henrikeson',      1009,   '1988-10-09',   'M',   'Fife',            'WY'     );
INSERT INTO students VALUES (NULL,      'Bernhardt', 'Heinrichtssen',   1010,   '1989-09-10',   'M',   'Federal Way',     'WA'     );
INSERT INTO students VALUES (NULL,      'Bjorg',     'Herleifson',      1001,   '1990-08-11',   'M',   'Everett',         'OR'     );
INSERT INTO students VALUES (NULL,      'Brita',     'Hildegardestedt', 1002,   '1991-07-12',   'F',   'Ellensburg',      'ID'     );
INSERT INTO students VALUES (NULL,      'Brynjar',   'Hjalmarsson',     1003,   '1992-06-13',   'M',   'Enumclaw',        'GA'     );
INSERT INTO students VALUES (NULL,      'Karina',    'Hjordistrohm',    1004,   '1993-05-14',   'F',   'Eatonville',      'LA'     );
INSERT INTO students VALUES (NULL,      'Cecilia',   'Ingasen',         1005,   '1994-04-15',   'F',   'Duvall',          'AL'     );
INSERT INTO students VALUES (NULL,      'Dagfinn',   'Ingeborgson',     1006,   '1995-03-16',   'M',   'Des Moines',      'TX'     );
INSERT INTO students VALUES (NULL,      'Dagrun',    'Ingemarssen',     1007,   '1996-02-17',   'M',   'Cosmopolis',      'WI'     );
INSERT INTO students VALUES (NULL,      'Edvard',    'Ingvarsen',       1008,   '1997-01-18',   'M',   'Centralia',       'OR'     );
INSERT INTO students VALUES (NULL,      'Enok',      'Hjordisthenson',  1009,   '1998-12-19',   'M',   'Centralia',       'CA'     );
INSERT INTO students VALUES (NULL,      'Erika',     'Jannicksson',     1010,   '1999-11-20',   'F',   'Burlington',      'MA'     );
INSERT INTO students VALUES (NULL,      'Erling',    'Jenstrohm',       1001,   '1980-10-21',   'M',   'Burien',          'FL'     );
INSERT INTO students VALUES (NULL,      'Esbjorn',   'Jesperstedt',     1002,   '1981-09-22',   'M',   'Bremerton',       'MT'     );
INSERT INTO students VALUES (NULL,      'Evelina',   'Joranbaardsson',  1003,   '1982-08-23',   'F',   'Bothell',         'CA'     );
INSERT INTO students VALUES (NULL,      'Frans',     'Jorgsson',        1004,   '1983-07-24',   'M',   'Bonney Lake',     'CO'     );
INSERT INTO students VALUES (NULL,      'Fredrik',   'Josefsen',        1005,   '1984-06-25',   'M',   'Black Diamond',   'NV'     );
INSERT INTO students VALUES (NULL,      'Gerhard',   'Katarinadotter',  1006,   '1985-05-26',   'M',   'Bellingham',      'CA'     );
INSERT INTO students VALUES (NULL,      'Gunborg',   'Katjatsten',      1007,   '1986-04-27',   'M',   'Bellevue',        'OR'     );
INSERT INTO students VALUES (NULL,      'Gunhilda',  'Kennethberg',     1008,   '1987-03-28',   'F',   'Auburn',          'HI'     );
INSERT INTO students VALUES (NULL,      'Gunnar',    'Kettilesen',      1009,   '1988-02-29',   'M',   'Anacortes',       'MI'     );
INSERT INTO students VALUES	(NULL,      'Hallvard',  'Kjerstiman',      1010,   '1989-01-30',   'M',   'Aberdeen',        'WI'     );

commit;

# select all records from student table
SELECT * FROM students;



# MAJORS TABLE SECTION
#######################################################

# drop majors table if it exists
# DROP TABLE IF EXISTS majors;

# create majors table
# CREATE TABLE majors 
# (
# 	majorCode
# );

# populate student table
# INSERT INTO majors 
# (id, first_name, last_name) VALUES (1, 'John', 'Doe');
# INSERT INTO majors 
# (id, first_name, last_name) VALUES (2, 'Bob', 'Smith');
# INSERT INTO majors 
# (id, first_name, last_name) VALUES (3, 'Jane', 'Doe');

# select all records from student table
# SELECT * FROM majors;