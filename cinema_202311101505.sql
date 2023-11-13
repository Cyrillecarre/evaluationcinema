INSERT INTO EvaluationCinema.cinema (nom,adresse) VALUES
	 ('MEGA CGR','rue Freres Lumieres 86000 POITIERS'),
	 ('CGR Castille','rue des Chenes 86180 BUXEROLLES');

INSERT INTO EvaluationCinema.film (idFilm,nom,`style`,duree) VALUES
	 (1,'John Wick','Action',150),
	 (2,'Mission Impossible','Action',150),
	 (3,'La Famille Asada','Comedie',120),
	 (4,'The Créator','Aventure',130),
	 (5,'Empire Of Light','Romance',120),
	 (6,'Mad God','Fantastique',90);

INSERT INTO EvaluationCinema.horaire (début) VALUES
	 ('10:00:00'),
	 ('11:00:00'),
	 ('13:00:00'),
	 ('14:00:00'),
	 ('15:00:00'),
	 ('16:00:00'),
	 ('18:00:00'),
	 ('20:30:00');

INSERT INTO EvaluationCinema.salle (idSalle,numero,capacite,idCinema) VALUES
	 (1,1,200,1),
	 (2,2,200,1),
	 (3,3,200,1),
	 (4,4,100,1),
	 (5,5,50,1),
	 (6,6,50,1),
	 (7,1,200,2),
	 (8,2,200,2),
	 (9,3,100,2),
	 (10,4,50,2);

INSERT INTO EvaluationCinema.film_horaire_cinema_salle (idFilm,idHoraire,idCinema,idSalle) VALUES
	 (1,1,1,1),
	 (2,1,1,2),
	 (3,1,1,3),
	 (4,4,2,7);

