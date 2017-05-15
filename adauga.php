
 <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password,"registru1");

// Check connection
if ($mysqli->connect_errno) {
    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
    exit();
}

$query = "	SELECT * FROM facultate , catedra , grupa , leg1 , obiect, simestru WHERE nume = 'Fcim' AND nume_c = 'Cim' AND facultate.id_facultate = catedra.id_facultate AND grupa.nume_g = 'C141' AND grupa.id_catedra = catedra.id_catedra and simestru.nr = 1 and simestru.id_simestru = leg1.id_simestru  and leg1.id_obiect = obiect.id_obiect AND obiect.id_grupa = grupa.id_grupa ";

if ($result = $mysqli->query($query)) {

    /* извлечение ассоциативного массива */

    printf("%s%s%s%s\n" ,'"', " Nume  Prenume" , '"' ," , ");
    while ($row = $result->fetch_assoc()) {
        printf ("%s%s%s%s\n",  '"', $row["nume_o"] , '"' ,  " , ");
    } 

    /* удаление выборки */
    $result->free();
}
else{
	echo("Error description: " . $mysqli->error);
}

/* закрытие соединения */
$mysqli->close();
?>