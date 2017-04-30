drop database jamiehay;
create database jamiehay;

drop user 'jamiehay'@'localhost';
create user 'jamiehay'@'localhost' identified by 'Jfje39Fh39f8hF';
grant all privileges on jamiehay.* to 'jamiehay'@'localhost';

use jamiehay;


create table paragraph (
id mediumint(9) auto_increment,
title varchar(255) not null,
body text not null,
primary key (id)
);

create table cv (
id mediumint(9) auto_increment,
filename varchar(255) not null,
date_uploaded datetime not null,
primary key (id)
);

create table profilepic (
id mediumint(9) auto_increment,
filename varchar(255) not null,
date_uploaded datetime not null,
primary key (id)
);

create table work (
id mediumint(9) auto_increment,
program_title varchar(255) not null,
company varchar(255) not null,
channel varchar(255) not null,
date date not null,
primary key (id)
);

create table personal_details (
id mediumint(9) auto_increment,
username varchar(255) not null,
passwordHash varchar(255),
first_name varchar(255),
last_name varchar(255),
email varchar(255),
phone varchar(11),
primary key(id)
);



insert into personal_details (username, first_name, last_name, email, phone) values
('jamie', 'Jamie', 'Hay', 'jamiehaydocs@gmail.com', '07980169167');

insert into cv (filename, date_uploaded) values ('JamieHayCV_2017-01-01.pdf', '2017-01-01');

insert into paragraph (title, body) values ('About', "<p>I am a freelance offline documentary editor based in London. I spent 20 years at the BBC where I learned my craft and have had the privilege of working with many talented directors. Some of the key documentaries I have edited include 'The Nazis, A Warning From History' with Laurence Rees (BAFTA for best editing factual in 1997), 'Commando, On The Front Line' with Chris Terrill at Uppercut Films in 2005 and 'The Twins of the Twin Towers' with Olivia Lichtenstein at StoryVault Films in 2012. For more see my work page or download my CV.</p>
	<p>The highlight of editing for me is identifying the narrative and giving insight into character's lives. Please feel free to call or email me for a chat. My details are below.'</p>");

insert into work (program_title, company, channel, date) values 
('Great Canal Journeys','Spungold','Channel 4','2016-03-21'),
('The Last Dukes','Spungold','BBC Two','2015-10-26'),
('Royal Marine Wags & the Great Yomp','Uppercut Films','ForcesTV','2015-10-07'),
('We Were There: Return to the Jungle','Uppercut Films','ForcesTV','2015-06-30'),
('Melvyn Bragg: Wigton to Westminster','Storyvault Films','BBC 2','2015-07-18'),
('Reinventing the Royals','Genie Pictures','BBC 2','2015-03-31'),
('Inside Broadmoor','Shiver','ITV 1','2014-10-22'),
('Commando: Return to the Front Line','Uppercut Films','ITV 1','2014-05-28'),
('Shakespeare Uncovered: Antony and Cleopatra with Kim Cattrall','Blakeway Productions','Sky Arts','2014-02-13'),
('Living on the Edge','Uppercut Films','Channel 5','2013-08-13'),
('Battle Scarred','Uppercut Films','Channel 5','2013-04-15'),
('The Dark Charisma of Adolf Hitler','LR History LTD','BBC 2','2012-11-12'),
('Inside Guinness World Records','Storyvault Films','ITV 1','2012-12-11'),
('Shakespeare Uncovered: the Tempest with Trevor Nunn','Blakeway Productions','BBC 4','2011-06-26'),
('Royal Marines: Mission Afghanistan','Uppercut Films','Channel 5','2012-01-30'),
('Twins of the Twin Towers','Storyboard Films','ITV 1','2011-09-11'),
('Royal Navy: Caribbean Patrol','Uppercut Films','Channel 5','2011-02-28');