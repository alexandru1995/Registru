CREATE TABLE `facultate` (
	`id_facultate` INT NOT NULL,
	`denumirea_f` varchar NOT NULL,
	PRIMARY KEY (`id_facultate`)
);

CREATE TABLE `obiect` (
	`id_obiect` INT NOT NULL,
	`id_grupa` INT NOT NULL,
	`denumirea` varchar NOT NULL,
	PRIMARY KEY (`id_obiect`)
);

CREATE TABLE `student` (
	`id_student` INT NOT NULL,
	`id_grupa` INT NOT NULL,
	`nume` varchar(70) NOT NULL,
	`prenume` varchar(70) NOT NULL,
	PRIMARY KEY (`id_student`)
);

CREATE TABLE `grupa` (
	`id_grupa` INT NOT NULL,
	`id_an` INT NOT NULL,
	`grupa` varchar(70) NOT NULL,
	`id_catedra` INT NOT NULL,
	PRIMARY KEY (`id_grupa`)
);

CREATE TABLE `catedra` (
	`id_catedra` INT NOT NULL,
	`id_facultate` INT NOT NULL,
	`denumire_c` varchar NOT NULL,
	PRIMARY KEY (`id_catedra`)
);

CREATE TABLE `note` (
	`id_note` INT NOT NULL,
	`id_student` INT NOT NULL,
	`id_obiect` INT NOT NULL,
	`nota` FLOAT NOT NULL,
	PRIMARY KEY (`id_note`)
);

CREATE TABLE `simestru` (
	`id_simestru` INT NOT NULL,
	`id_student` INT NOT NULL,
	`id_obiect` INT NOT NULL,
	`nota_s1` FLOAT NOT NULL,
	`nota_s2` FLOAT NOT NULL,
	`nota_an` FLOAT NOT NULL,
	PRIMARY KEY (`id_simestru`)
);

ALTER TABLE `obiect` ADD CONSTRAINT `obiect_fk0` FOREIGN KEY (`id_grupa`) REFERENCES `grupa`(`id_grupa`);

ALTER TABLE `student` ADD CONSTRAINT `student_fk0` FOREIGN KEY (`id_grupa`) REFERENCES `grupa`(`id_grupa`);

ALTER TABLE `grupa` ADD CONSTRAINT `grupa_fk0` FOREIGN KEY (`id_an`) REFERENCES `anul`(`id_an`);

ALTER TABLE `grupa` ADD CONSTRAINT `grupa_fk1` FOREIGN KEY (`id_catedra`) REFERENCES `catedra`(`id_catedra`);

ALTER TABLE `catedra` ADD CONSTRAINT `catedra_fk0` FOREIGN KEY (`id_facultate`) REFERENCES `facultate`(`id_facultate`);

ALTER TABLE `note` ADD CONSTRAINT `note_fk0` FOREIGN KEY (`id_student`) REFERENCES `student`(`id_student`);

ALTER TABLE `note` ADD CONSTRAINT `note_fk1` FOREIGN KEY (`id_obiect`) REFERENCES `obiect`(`id_obiect`);

ALTER TABLE `simestru` ADD CONSTRAINT `simestru_fk0` FOREIGN KEY (`id_student`) REFERENCES `student`(`id_student`);

ALTER TABLE `simestru` ADD CONSTRAINT `simestru_fk1` FOREIGN KEY (`id_obiect`) REFERENCES `obiect`(`id_obiect`);




CREATE TABLE `restantieri`. ( `dsadasd` INT NULL 
	AUTO_INCREMENT , `asdsdasd` INT NOT NULL 
	AUTO_INCREMENT , PRIMARY KEY (`dsadasd`), 
	INDEX (`asdsdasd`)) ENGINE = InnoDB;