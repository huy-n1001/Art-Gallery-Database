CREATE TABLE Artist (
	artistID CHAR(100) PRIMARY KEY,
	name CHAR(100),
	age INTEGER,
	rating REAL);

CREATE TABLE ArtForm (
	artName CHAR (100) PRIMARY KEY);

CREATE TABLE Curator (
	cID INTEGER PRIMARY KEY,
	fname CHAR(20),
	lname CHAR(20),
	education CHAR(100)
	departmentID int,
	staff_members int);

CREATE TABLE Museum (
	mID CHAR(100) PRIMARY KEY,
	name CHAR(50), 
	opHrs CHAR(30),
	Capacity INTEGER);

CREATE TABLE Artwork_Create_IsIn (
	artID CHAR(100),
	artistID CHAR(100),
	mID CHAR(100),
	title CHAR(100),
	material CHAR(30),
	PRIMARY KEY (artID, artistID, mID),
	FOREIGN KEY (artistID) REFERENCES Artist(artistID),
	FOREIGN KEY (mID) REFERENCES Museum(mID));

CREATE TABLE BelongsTo (
	artID CHAR(100),
	artName CHAR(100),
	PRIMARY KEY (artID, artName),
	FOREIGN KEY (artID) REFERENCES  Artwork_create_IsIn(artID) ON DELETE CASCADE,	
	FOREIGN KEY (artName) REFERENCES ArtForm(artName) ON DELETE CASCADE);

CREATE TABLE Exhibition_Held (
	exID CHAR(100),
	mID CHAR(100),
	dateOf DATE,
	location CHAR(100),
	exName CHAR(100),
	exTheme CHAR(100),
	PRIMARY KEY (exID, mID),
	FOREIGN KEY (mID) REFERENCES Museum(mID));

CREATE TABLE Ticket_Sells (
	exID CHAR(100),
	ticketNum INTEGER,
	price INTEGER,
	ticketType CHAR(30),
	PRIMARY KEY (exID, ticketNum),
	FOREIGN KEY (exID) REFERENCES Exhibition_Held(exID) ON DELETE CASCADE);

CREATE TABLE  Staff_ManagedBy (
	sID INTEGER,
	cID INTEGER, 	
	fname CHAR(100),
	lname CHAR(100),
	PRIMARY KEY (sID, cID),
	FOREIGN KEY (cID) REFERENCES Curator(cID));

CREATE TABLE Organizes (
	sID INTEGER,
	exID CHAR(100),
	PRIMARY KEY (sID, exID),
	FOREIGN KEY (sID) REFERENCES Staff_Managedby(sID),
	FOREIGN KEY (exID) REFERENCES Exhibition_Held(exID));
	
CREATE TABLE users (
    idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uidUsers TINYTEXT NOT NULL,
    emailUsers TINYTEXT NOT NULL,
    passwrd LONGTEXT NOT NULL);
	
INSERT INTO Artist VALUES ('367d89w', 'Rodney Graham', 73, 3);
INSERT INTO Artist VALUES ('568k21s', 'Miquel Barcelo', 65, 4.7);
INSERT INTO Artist VALUES ('998t33y', 'Takashi Murakami', 60, 3.2);
INSERT INTO Artist VALUES ('874u42u', 'Sean Scully', 76, 4.9);
INSERT INTO Artist VALUES ('909p87w', 'Zhou Chunya', 67, 4.8);

INSERT INTO ArtForm VALUES ('Clay Sculpture');
INSERT INTO ArtForm VALUES ('Watercolour Painting');
INSERT INTO ArtForm VALUES ('Paper Sculpture');
INSERT INTO ArtForm VALUES ('Short Film');
INSERT INTO ArtForm VALUES ('Acrylic Painting');

INSERT INTO Curator VALUES (2985, 'Sarah', 'Marsh', 'Master of Arts', 1, 20);
INSERT INTO Curator VALUES (1236, 'Jason', 'Lee', 'Master of Archeology', 2, 32);
INSERT INTO Curator VALUES (4574, 'Josh', 'Retrick', 'Master of Arts', 2, 35);
INSERT INTO Curator VALUES (5632, 'Lisa', 'Lans', 'Master of Museum Studies', 3, 45);
INSERT INTO Curator VALUES (5698, 'Ann', 'Bane', 'Master of Museum Studies', 3, 40);

INSERT INTO Museum VALUES ('mus1', 'Museum of Artistic History', '10am-5pm', 200);
INSERT INTO Museum VALUES ('mus2', 'Museum of Natural History', '12pm-6pm', 300);
INSERT INTO Museum VALUES ('mus3', 'National Gallery', '9am-6pm', 1500);
INSERT INTO Museum VALUES ('mus4', 'Modern Artistry Museum', '8am-4pm', 1000);
INSERT INTO Museum VALUES ('mus5', 'Structural Art Gallery', '1pm-9pm', 3000);

INSERT INTO Artwork_Create_IsIn VALUES ('001', '367d89w', 'mus1', 'Pipe Cleaner Construction', 'Gesso');
INSERT INTO Artwork_Create_IsIn VALUES ('002', '568k21s', 'mus2', 'Il trionfo della morte', 'Watercolor');
INSERT INTO Artwork_Create_IsIn VALUES ('003', '998t33y', 'mus3', 'Chinese Perch After Kitaōji Rosanjin', 'Clay');
INSERT INTO Artwork_Create_IsIn VALUES ('004', '874u42u', 'mus4', 'Shutter', 'Film');
INSERT INTO Artwork_Create_IsIn VALUES ('005', '909p87w', 'mus5', 'SOMEWHERE PEACH BLOSSOMS BLOOM', 'Acrylic');

INSERT INTO BelongsTo VALUES ('001', 'Clay Sculpture');
INSERT INTO BelongsTo VALUES ('002', 'Watercolour Painting');
INSERT INTO BelongsTo VALUES ('003', 'Paper Sculpture');
INSERT INTO BelongsTo VALUES ('004', 'Short Film');
INSERT INTO BelongsTo VALUES ('005', 'Acrylic Painting');

INSERT INTO Exhibition_Held VALUES ('A01', 'mus1', '2022-06-30', 'Vancouver', 'The Space of Creativity', 'Fantasy');
INSERT INTO Exhibition_Held VALUES ('B02', 'mus2', '2022-05-29', 'Richmond', 'Dessert Art Exhibit', 'Food');
INSERT INTO Exhibition_Held VALUES ('C03', 'mus2', '2022-07-03', 'Richmond', 'Interfaith Art Exhibit', 'Nature');
INSERT INTO Exhibition_Held VALUES ('D04', 'mus4', '2022-04-20', 'Burnaby', 'Oriental Adventures', 'Stories');
INSERT INTO Exhibition_Held VALUES ('E05', 'mus5', '2022-03-25', 'Coquitlam', 'Head in the Clouds', 'Space and Beyond');

INSERT INTO Ticket_Sells VALUES ('A01', 10001, 25, 'Adult');
INSERT INTO Ticket_Sells VALUES ('B02', 10002, 19, 'Student');
INSERT INTO Ticket_Sells VALUES ('C03', 10003, 17, 'Children');
INSERT INTO Ticket_Sells VALUES ('D04', 10004, 20, 'Senior');
INSERT INTO Ticket_Sells VALUES ('E05', 10005, 25, 'Adult');

INSERT INTO Staff_ManagedBy VALUES (8412, 2985, 'Fiona', 'Williams');
INSERT INTO Staff_ManagedBy VALUES (4156, 1236, 'Joey', 'Gafford');
INSERT INTO Staff_ManagedBy VALUES (7142, 4574, 'Ajay', 'Che');
INSERT INTO Staff_ManagedBy VALUES (1713, 5632, 'Candice', 'Nuts');
INSERT INTO Staff_ManagedBy VALUES (1001, 5698, 'Ben', 'Dover');

INSERT INTO Organizes VALUES (8412, 'A01');
INSERT INTO Organizes VALUES (7142, 'B02');
INSERT INTO Organizes VALUES (7142, 'C03');
INSERT INTO Organizes VALUES (1713, 'D04');
INSERT INTO Organizes VALUES (1001, 'E05');
