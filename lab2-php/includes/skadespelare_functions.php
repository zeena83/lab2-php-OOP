
<?php
/*
 * Visar alla skadespelare
*/
function getAllSkadespelare($conn){
    $query = "SELECT * FROM skadespelare ORDER BY skadespelareNamn ASC";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    return $result;
}

//hämta varje skådspelaren data by id
function getSkadespelareById($conn,$id){
    $query = "SELECT * FROM skadespelare
    INNER JOIN filmskadespelare ON filmskadespelare.skadespelareId = skadespelare.skadespelareId
    INNER JOIN film ON film.filmId = filmskadespelare.filmId
    WHERE filmskadespelare.skadespelareId = $id";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    return $result;
}

//hämta varje film data by id
function getFilmById($conn,$id){
    $query = "SELECT * FROM film
    INNER JOIN filmskadespelare ON filmskadespelare.filmId = film.filmId
    INNER JOIN film ON skadespelare.skadespelareId = filmskadespelare.skadespelareId
    WHERE filmskadespelare.filmId = $id";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    return $result;
}

/*
 * Hämtar en skadespelare
 */

function getSkadespelareData($conn,$skadespelareId){
    $query = "SELECT * FROM skadespelare
       WHERE skadespelareId = $skadespelareId";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $row = mysqli_fetch_assoc($result);

    return $row;
}
function getFilmerByActorID($conn,$Id){
    $query = "SELECT * FROM filmskadespelare
         INNER JOIN film ON film.filmId = filmskadespelare.filmId
       WHERE filmskadespelare.skadespelareId = $Id";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    ;
    $i = 0;
    $list = array();
while ($row = mysqli_fetch_assoc($result)) {
  // code...
  $list[$i] =  $row;
  $i++;
}
return $list;
}

/*
 * Sparar en skadespelare
*/
function saveSkadespelare($conn){
    $skadespelareNamn = escapeInsert($conn,$_POST['skadespelareNamn']);
    $skadespelareAlder = escapeInsert($conn,$_POST['skadespelareAlder']);
    $skadespelareAdress = escapeInsert($conn,$_POST['skadespelareAdress']);

    // Sparar lösenordet med password_hash
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO skadespelare
			(skadespelareNamn,skadespelareAlder,skadespelareAdress)
			VALUES('$skadespelareNamn','$skadespelareAlder','$skadespelareAdress')";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    $insId = mysqli_insert_id($conn);

    return $insId;
}

/*
 * Uppdaterar en skadespelare
*/
function updateSkadespelare($conn){
    $skadespelareNamn = escapeInsert($conn,$_POST['skadespelareNamn']);
    $skadespelareAlder = escapeInsert($conn,$_POST['skadespelareAlder']);
    $skadespelareAdress= escapeInsert($conn,$_POST['skadespelareAdress']);
    $editid = $_POST['updateid'];

    $query = "UPDATE skadespelare
			SET skadespelareNamn='$skadespelareNamn', skadespelareAlder='$skadespelareAlder', skadespelareAdress='$skadespelareAdress'
			WHERE skadespelareId=". $editid;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Raderar skadespelare
*/
function deleteSkadespelare($conn,$skadespelareId){
    $query = "DELETE FROM skadespelare WHERE skadespelareId=". $skadespelareId;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

/*
 * Tar bort oönskade html-tecken
 *
 * mysqli_real_escape_string motverkar SQLInjection
 */
function escapeInsert($conn,$insert) {
    $insert = htmlspecialchars($insert);

    $insert = mysqli_real_escape_string($conn,$insert);

    return $insert;
}
