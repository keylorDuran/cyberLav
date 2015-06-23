CREATE TABLE song(
	id serial not null ,
	name VARCHAR(60) ,
	artist_id int not null ,
	url_source VARCHAR(1000) ,
	PRIMARY KEY (id) 
);

CREATE TABLE artist(
	id serial not null ,
	name VARCHAR(60) ,
	PRIMARY KEY (id) 
);

CREATE TABLE "user" (
	id serial NOT NULL,
	email VARCHAR(60) NOT NULL ,
	password VARCHAR(60) NOT NULL,	
	is_admin BOOLEAN NOT NULL DEFAULT FALSE ,
	PRIMARY KEY (id) ,
	UNIQUE(email)
);





ALTER TABLE song ADD constraint fk_song_artist FOREIGN KEY (artist_id) REFERENCES artist (id);