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
	StudentId   INT(9) NOT NULL PRIMARY KEY auto_increment, 
	FirstName   VARCHAR(20), 
	LastName    VARCHAR(30),
	MajorCode   INT(4),
	Birthdate   DATE,
	Gender      CHAR(1),
	City        VARCHAR(30),
	State       VARCHAR(2)
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


# select all records from student table
# SELECT * FROM students;





# MAJORS TABLE SECTION
#######################################################

# drop majors table if it exists
DROP TABLE IF EXISTS majors;

# create majors table
CREATE TABLE majors 
(
	MajorCode        INT(4) NOT NULL PRIMARY KEY, 
	MajorName        VARCHAR(30),
	DepartmentCode   INT(4)
);

# populate majors table
INSERT INTO majors VALUES	( 0001,  'B.S. in Biology',                           1001  );
INSERT INTO majors VALUES	( 0002,  'B.S. in Psychology',                        1002  );
INSERT INTO majors VALUES	( 0003,  'B.S. in Architecture',                      1003  );
INSERT INTO majors VALUES	( 0004,  'B.S. in Computer Science',                  1004  );
INSERT INTO majors VALUES	( 0005,  'B.S. in Mechanical Engineering',            1005  );
INSERT INTO majors VALUES	( 0006,  'B.S. in Automotive Technology Program',     1006  );
INSERT INTO majors VALUES	( 0007,  'B.S. in Computer Information Technology',   1007  );
INSERT INTO majors VALUES	( 0008,  'B.S. in Business Management',               1008  );
INSERT INTO majors VALUES	( 0009,  'B.S. in Art',                               1009  );
INSERT INTO majors VALUES	( 0010,  'B.S. in Interior Design',                   1010  );


# select all records from student table
# SELECT * FROM majors;





# COLLEGES TABLE SECTION
#######################################################

# drop majors table if it exists
DROP TABLE IF EXISTS colleges;

# create colleges table
CREATE TABLE colleges 
(
	CollegeCode    INT(4) NOT NULL PRIMARY KEY, 
	CollegeName    VARCHAR(30)
);

# populate colleges table
INSERT INTO colleges VALUES	( 0001,   'College of Agriculture and Life Sciences'     );
INSERT INTO colleges VALUES	( 0002,   'College of Education and Human Development'   );
INSERT INTO colleges VALUES	( 0003,   'College of Physical Sciences and Engineering' );
INSERT INTO colleges VALUES	( 0004,   'College of Business and Communication'        );
INSERT INTO colleges VALUES	( 0005,   'College of Performing and Visual Arts'        );





# DEPARTMENT TABLE SECTION
#######################################################

# drop department table if it exists
DROP TABLE IF EXISTS departments;

# create department table
CREATE TABLE departments
(
	DepartmentCode   INT(4) NOT NULL PRIMARY KEY, 
	DepartmentName   VARCHAR(30),
	CollegeCode      INT(4)
);

# populate department table
INSERT INTO departments VALUES	( 1001,   'Department of Biology',                                       0001 );
INSERT INTO departments VALUES	( 1002,   'Department of Psychology',                                    0002 );
INSERT INTO departments VALUES	( 1003,   'Department of Architecture & Construction',                   0003 );
INSERT INTO departments VALUES	( 1004,   'Department of Computer Science and Electrical Engineering',   0003 );
INSERT INTO departments VALUES	( 1005,   'Department of Mechanical Engineering',                        0003 );
INSERT INTO departments VALUES	( 1006,   'Department of Automotive Technology Program',                 0003 );
INSERT INTO departments VALUES	( 1007,   'Department of Computer Information Technology',               0004 );
INSERT INTO departments VALUES	( 1008,   'Department of Business Management',                           0004 );
INSERT INTO departments VALUES	( 1009,   'Department of Art',                                           0005 );
INSERT INTO departments VALUES	( 1010,   'Department of Interior Design',                               0005 );



# COURSE TABLE SECTION
#######################################################

# drop courses table if it exists
DROP TABLE IF EXISTS courses;

# create courses table
CREATE TABLE courses 
(
	CourseID         INT(4) NOT NULL PRIMARY KEY auto_increment, 
	CourseCode       VARCHAR(20), 
	CourseName       VARCHAR(30),
	DepartmentCode   INT(4)
);

# populate courses table
INSERT INTO courses VALUES	( NULL,   'BIO 240',     'Neurobiology',                              1001   );
INSERT INTO courses VALUES	( NULL,   'PSYCH 376',   'Neuroscience',                              1002   );
INSERT INTO courses VALUES	( NULL,   'CONST 230',   'Mechanical Environmental Systems',          1003   );
INSERT INTO courses VALUES	( NULL,   'ARCH 280',    'Building Information Modeling',             1003   );
INSERT INTO courses VALUES	( NULL,   'CS 271',      'Human-Computer Interaction',                1004   );
INSERT INTO courses VALUES	( NULL,   'CS 306',      'Algorythms and Complexity',                 1004   );
INSERT INTO courses VALUES	( NULL,   'CS 364',      'Software Engineering I',                    1004   );
INSERT INTO courses VALUES	( NULL,   'CS 213',      'Web Engineering I',                         1004   );
INSERT INTO courses VALUES	( NULL,   'CS 313',      'Web Engineering II',                        1004   );
INSERT INTO courses VALUES	( NULL,   'CS 246',      'Software Design and Development',           1004   );
      
INSERT INTO courses VALUES	( NULL,   'ME 332',      'Computer Numerical Control',                1005   );
INSERT INTO courses VALUES	( NULL,   'AUTO 231',    'Automotive Electrical Systems II',          1006   );
INSERT INTO courses VALUES	( NULL,   'CIT 320',     'Database Design and Development',           1007   );
INSERT INTO courses VALUES	( NULL,   'CIT 230',     'Web Design',                                1007   );
INSERT INTO courses VALUES	( NULL,   'CIT 310',     'Object Oriented Programming II',            1007   );
INSERT INTO courses VALUES	( NULL,   'CIT 356',     'Mobile Application Development',            1007   );
INSERT INTO courses VALUES	( NULL,   'CIT 370',     'Systems Security I',                        1007   );
INSERT INTO courses VALUES	( NULL,   'CIT 336',     'Web Page Development',                      1007   );
INSERT INTO courses VALUES	( NULL,   'B 250',       'Web Business I',                            1008   );
INSERT INTO courses VALUES	( NULL,   'ART 130',     'Introduction to Graphic Design',            1009   );
INSERT INTO courses VALUES	( NULL,   'ID 381',      'Contemporary Architecture and Furniture',   1010   );


# REGISTEREDCOURSES TABLE SECTION
#######################################################

# drop courses table if it exists
DROP TABLE IF EXISTS registeredcourses;

# create RegisteredCourses table
CREATE TABLE registeredcourses 
(
	ID               INT(4) PRIMARY KEY auto_increment, 
	StudentId        INT(9) NOT NULL, 
	CourseCode       VARCHAR(20) NOT NULL
);

# populate registeredcourses table
INSERT INTO registeredcourses VALUES	( NULL,  1, 'CS 271'    );
INSERT INTO registeredcourses VALUES	( NULL,  2, 'CIT 320'   );
INSERT INTO registeredcourses VALUES	( NULL,  3, 'ID 381'    );
INSERT INTO registeredcourses VALUES	( NULL,  5, 'CIT 370'   );
INSERT INTO registeredcourses VALUES	( NULL,  8, 'BIO 240'   );
INSERT INTO registeredcourses VALUES	( NULL, 13, 'PSYCH 376' );
INSERT INTO registeredcourses VALUES	( NULL, 21, 'CONST 230' );
INSERT INTO registeredcourses VALUES	( NULL,  2, 'ARCH 280'  );
INSERT INTO registeredcourses VALUES	( NULL,  4, 'CS 306'    );
INSERT INTO registeredcourses VALUES	( NULL,  6, 'CS 271'    );

INSERT INTO registeredcourses VALUES	( NULL,  8, 'CS 364'    );
INSERT INTO registeredcourses VALUES	( NULL, 10, 'CS 213'    );
INSERT INTO registeredcourses VALUES	( NULL, 12, 'CS 313'    );
INSERT INTO registeredcourses VALUES	( NULL, 14, 'ME 332'    );
INSERT INTO registeredcourses VALUES	( NULL, 16, 'CIT 310'   );
INSERT INTO registeredcourses VALUES	( NULL, 18, 'CIT 356'   );
INSERT INTO registeredcourses VALUES	( NULL, 20, 'CIT 370'   );
INSERT INTO registeredcourses VALUES	( NULL, 22, 'CIT 336'   );
INSERT INTO registeredcourses VALUES	( NULL, 24, 'B 250'     );
INSERT INTO registeredcourses VALUES	( NULL, 13, 'AUTO 231'  );

INSERT INTO registeredcourses VALUES	( NULL,  1,  'CS 271'    );
INSERT INTO registeredcourses VALUES	( NULL,  2, 'CIT 320'   );
INSERT INTO registeredcourses VALUES	( NULL,  3, 'ID 381'    );
INSERT INTO registeredcourses VALUES	( NULL,  4, 'CIT 370'   );
INSERT INTO registeredcourses VALUES	( NULL,  5, 'BIO 240'   );
INSERT INTO registeredcourses VALUES	( NULL,  6, 'CS 364'    );
INSERT INTO registeredcourses VALUES	( NULL,  7, 'CS 213'    );
INSERT INTO registeredcourses VALUES	( NULL,  8, 'CS 313'    );
INSERT INTO registeredcourses VALUES	( NULL,  9, 'ME 332'    );
INSERT INTO registeredcourses VALUES	( NULL, 10, 'CIT 310'   );

INSERT INTO registeredcourses VALUES	( NULL, 11, 'CS 364'    );
INSERT INTO registeredcourses VALUES	( NULL, 12, 'CS 213'    );
INSERT INTO registeredcourses VALUES	( NULL, 13, 'CS 313'    );
INSERT INTO registeredcourses VALUES	( NULL, 14, 'ME 332'    );
INSERT INTO registeredcourses VALUES	( NULL, 15, 'CIT 310'   );
INSERT INTO registeredcourses VALUES	( NULL, 16, 'CIT 356'   );
INSERT INTO registeredcourses VALUES	( NULL, 17, 'CIT 370'   );
INSERT INTO registeredcourses VALUES	( NULL, 18, 'CIT 336'   );
INSERT INTO registeredcourses VALUES	( NULL, 19, 'B 250'     );
INSERT INTO registeredcourses VALUES	( NULL, 20, 'AUTO 231'  );


# Add foreign keys once all tables have been built and populated
ALTER TABLE majors
ADD FOREIGN KEY (DepartmentCode)
REFERENCES departments(DepartmentCode);

ALTER TABLE departments
ADD FOREIGN KEY (CollegeCode)
REFERENCES colleges(CollegeCode);

ALTER TABLE courses
ADD FOREIGN KEY (DepartmentCode)
REFERENCES departments(DepartmentCode);

ALTER TABLE registeredcourses
ADD FOREIGN KEY (StudentId)
REFERENCES students(StudentId);

ALTER TABLE registeredcourses
ADD FOREIGN KEY (CourseCode)
REFERENCES courses(CourseCode);


commit;


# describe all tables
describe students;
describe colleges;
describe departments;
describe majors;
describe courses;
describe registeredcourses;


# select all records from each table
SELECT * FROM students;

SELECT * FROM colleges;

SELECT * FROM departments;

SELECT * FROM majors;

SELECT * FROM courses;

SELECT * FROM registeredcourses;




































