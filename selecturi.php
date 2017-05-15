facultate.enable(true)
facultate.value()
$sql = "INSERT INTO `catedra` (`id_catedra`, `id_facultete`, `denumire_c`) VALUES (NULL, '1', 'energetica');
INSERT INTO `grupa` (`id_grupa`, `id_simestru`, `id_catedra`, `grupa`) VALUES (NULL, '1', '3', 'asda');
INSERT INTO `nota` (`id_nota`, `id_student`, `id_obiect`, `id_simestru`, `nota`) VALUES (NULL, '1', '2', '1', '7.77');
INSERT INTO `obiect` (`id_obiect`, `id_grupa`, `nume_o`) VALUES (NULL, '2', 'Biologie');
INSERT INTO `simestru` (`id_simestru`, `id_student`, `id_obiect`, `nr_simestru`) VALUES (NULL, '1', '2', '2');
INSERT INTO `student` (`id_student`, `id_grupa`, `nume`, `prenume`) VALUES (NULL, '3', 'Li', 'Brius'); ";

SELECT `nume_o`,`nota`,`nume`,`prenume` FROM `obiect`,`nota`,`student` WHERE student.id_student = id_nota and id_nota = obiect.id_obiect 