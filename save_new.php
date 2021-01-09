<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
		    if(isset($_POST['index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "film":
                        if((isset($_POST['name']))&&(isset($_POST['genre']))&&(isset($_POST['regisseur']))&&(isset($_POST['year']))&&(isset($_POST['cost']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $genre = htmlentities(mysqli_real_escape_string($link, $_POST['genre']));
                            $regisseur = htmlentities(mysqli_real_escape_string($link, $_POST['regisseur']));
                            $year = htmlentities(mysqli_real_escape_string($link, $_POST['year']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            if((strlen($name)==0)||(strlen($genre)==0)||(strlen($regisseur)==0)||(strlen($year)==0)||(strlen($cost)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, genre, regisseur, year, cost) VALUES (NULL, '$name', '$genre', '$regisseur', '$year', '$cost')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "cinema":
                        if((isset($_POST['name']))&&(isset($_POST['category']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $category = htmlentities(mysqli_real_escape_string($link, $_POST['category']));
                            if((strlen($category)==0)||(strlen($name)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, category) VALUES (NULL, '$name', '$category')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "session":
                        if((isset($_POST['count_f']))&&(isset($_POST['date_s']))&&(isset($_POST['film']))&&(isset($_POST['cinema']))&&(isset($_POST['count_b']))){
                            $date_s = htmlentities(mysqli_real_escape_string($link, $_POST['date_s']));
                            $count_f = htmlentities(mysqli_real_escape_string($link, $_POST['count_f']));
                            $film = htmlentities(mysqli_real_escape_string($link, $_POST['film']));
                            $cinema = htmlentities(mysqli_real_escape_string($link, $_POST['cinema']));
							$count_b = htmlentities(mysqli_real_escape_string($link, $_POST['count_b']));
                            if(($film=="")||($cinema=="")){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, date_s, film, cinema, count_f, count_b) VALUES (NULL, '$date_s', '$film', '$cinema', '$count_f', '$count_b')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
            }
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>