/**********************************************************************************************************/
/*  Date          Name          Description                                                               */
/*  ----------------------------------------------------------------------------------------------------- */
/*                                                                                                        */
/*  01/17/2020    WMoreno       Initial deployment of dementedDesign.    		     		              */
/**********************************************************************************************************/

DROP DATABASE IF EXISTS dementedDesign;
Create DATABASE dementedDesign;
use dementedDesign;

#create the employee table
CREATE TABLE IF NOT EXISTS employee
(
	employeeID             INT NOT NULL PRIMARY KEY  AUTO_INCREMENT,
	firstName              VARCHAR(255) NOT NULL,
	lastName               VARCHAR(255) NOT NULL
);

#create the vistor table
CREATE TABLE IF NOT EXISTS vistor
(
	vistorID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	vistorName             VARCHAR(255) NOT NULL,
	vistorEmail            VARCHAR(255) NOT NULL,
	vistorMsg              VARCHAR(500) NOT NULL,
	vistorPhone            VARCHAR(15) NOT NULL,
	operativeRating		   TINYINT NOT NULL,
	eventsListing          Boolean NOT NULL,
	employeeID             INT NOT NULL REFERENCES employee(employeeID)
);

#insert employee rows
INSERT INTO employee
	(firstName, lastName)
VALUES
	('James',   'Kirk'),
	('Marcus',  'Fenix'),
	('Big',     'Bertha'),
	('JD',      'Fenix'),
	('Bucky',   'Barnes'),
	('Jack',    'Sparrow'),
	('Green',   'Arrow'),
	('Black',   'Canary'),
	('Rip',     'Hunter'),
	('Brutus',  'Maximus'),
	('Jack',    'Napier'),
	('Victor',  'Freeze'),
	('Psycho',  'Mantis'),
	('Martian', 'Man-Hunter'),
	('Mon-El',  'Daxam'),
	('Kara',    'Zor-El'),
	('Damien',  'Darhk'),
	('Robert',  'House'),
	('Lone',    'Wanderer'),
	('Johan',   'Hex');
	
#insert vistor rows
INSERT INTO vistor 
	(vistorName, vistorEmail, vistorPhone, vistorMsg, employeeID, operativeRating, eventsListing)
VALUES
	('Mickey',      'mickey@mouse.com',      '207-625-0531',  'Hello',         1, 2, 1),
	('Picard',      'captain@picard.com',    '208-523-6715',  'Hi',            1, 3, 0),
	('Hector',      'hector@barbossa.com',   '666-123-8426',  'Welcome',       1, 0, 0),
	('Cross',       'alex@cross.com',        '312-519-6341',  'Ace n Eights',  1, 4, 1),
	('Mastermind',  'kyle@reese.com',        '242-697-4273',  'Goodbye',       1, 8, 0),
	('King',        'elvis@presley.com',     '726-315-8279',  'Oh baby',       1, 4, 1),
	('Xavier',      'charles@xavier.com',    '812-972-6314',  'Nowhere',       1, 5, 0),
	('Pearl',       'black@pearl.com',       '212-625-0521',  'Freedom',       1, 8, 1),
	('Ripper',      'jack@ripper.com',       '173-221-0891',  'Darline',       1, 0, 1),
	('Einstien',    'albert@einstien.com',   '615-873-0021',  'Eureka',        1, 3, 1),
	('Santa',       'saint@nick.com',        '915-237-0185',  'HoHo HO',       1, 5, 0),
	('Grinch',      'crooked@grin.com',      '332-810-0113',  'MeanOne',       1, 9, 1),
	('Robin',       'jason@Todd.com',        '222-318-6245',  'Boy Wonder',    1, 10, 1),
	('Batman',      'dark@knight.com',       '222-319-6164',  'Im Batman',     1, 8, 1),
	('Doctor',      'oncoming@storm.com',    '111-222-3333',  'tardis',        1, 2, 1),
	('Rose',        'rose@tyler.com',        '444-555-666',   'Bad Wolf',      1, 2, 1),
	('Darlek',      'skaro@homeworld.com',   '777-888-9999',  'Exterminate',   1, 0, 1),
	('Kingsman',    'lancelot@two.com',      '313-678-9428',  'Good Day Chap', 1, 9, 0),
	('Shazam',      'black@adam.com',        '228-915-3753',  'Awesome',       1, 3, 0),
	('Vault-Boy',   'mascot@vault.com',      '101-784-6195',  'Vault-Tec',     1, 2, 1);
	