use db_7285523_f15;


-- create and populate tables

create table Library
(
	libNo int primary key,
    libName varchar(30),
    location varchar(30),
    noRooms int
);

create table Author
(
	authorNo int primary key,
    authorName varchar(30)
);

create table Patron
(
	patronNo int primary key,
    patronName varchar(30)
);

create table Book
(
	bookNo int primary key,
	title varchar(30),
    noPages int,
    authorNo int references Author(authorNo)
);

create table CopyBook
(
	copyNo int primary key,
    libNo int references Library(libNo),
    bookNo int references Book(bookNo),
    cost decimal(10,2)
);

create table Loan
(
	loanNo int primary key,
    copyNo int references CopyBook(copyNo),
    patronNo int references Patron(patronNo),
	checkOutDate date,
    dueDate date
);

insert into Library values (1, 'LCLS-Cheyenne', 'Cheyenne', 10);
insert into Library values (2, 'LCLS-Burns', 'Burns', 5);
insert into Library values (3, 'Rapid City Public', 'Rapid City', 3);
insert into Library values (4, 'Deveraux', 'Rapid City', 3);
insert into Library values (5, 'Royal Library', 'Denmark', 50);
insert into Library values (6, 'Alexendrian Central', 'Alexandria', 50);
insert into Library values (7, 'Sterling Memorial', 'Yale', 160);

insert into Author values (1, 'Oscar Wilde');
insert into Author values (2, 'Edgar Po');
insert into Author values (3, 'Mary Shelley');
insert into Author values (4, 'Ray Bradbury');
insert into Author values (5, 'George Lucas');
insert into Author values (6, 'Gene Roddenberry');
insert into Author values (7, 'Isaac Asimov');

insert into Patron values (1, 'Ben Kaiser');
insert into Patron values (2, 'Morgan Nissen');
insert into Patron values (3, 'Mark Anzman');
insert into Patron values (4, 'Andrew Nissen');
insert into Patron values (5, 'Kailey Silvey');
insert into Patron values (6, 'Gabby Rolon');
insert into Patron values (7, 'Jared Johnson');

insert into Book values (1, 'Picture of Dorian Grey', 150, 1);
insert into Book values (2, 'The Decay of Lying', 10, 1);
insert into Book values (3, 'Frankenstein', 50, 3);
insert into Book values (4, 'A New Hope', 300, 5);
insert into Book values (5, 'I, Robot', 253, 7);
insert into Book values (6, 'Bicentennial Man', 20, 7);
insert into Book values (7, 'Farhenheit 451', 159, 4);
insert into Book values (8, 'The Motion Picture', 200, 6);

insert into CopyBook values (1, 2, 3, 2.50);
insert into CopyBook values (2, 2, 5, 2.50);
insert into CopyBook values (3, 4, 1, 3.50);
insert into CopyBook values (4, 5, 2, 4.50);
insert into CopyBook values (5, 5, 1, 45.50);
insert into CopyBook values (6, 3, 7, 12.25);
insert into CopyBook values (7, 2, 6, 11.50);

insert into Loan values (1, 4, 2, '15-12-05', '15-12-12');
insert into Loan values (2, 3, 1, '15-12-1' , '15-12-5');
insert into Loan values (3, 2, 1, '11-04-15', '11-11-15');
insert into Loan values (4, 7, 1, '15-10-4', '15-11-04');
insert into Loan values (5, 5, 5, '15-09-19', '16-09-11');
insert into Loan values (6, 6, 6, '14-06-22', '14-07-6');
insert into Loan values (7, 1, 2, '13-05-19', '13-05-25');