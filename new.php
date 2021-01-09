<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "film":
                        echo("<fieldset><legend>Добавить новый Фильм</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите Название: <input name='name'
                        type='text' maxlength='32' /> <br>");
                        
                        echo("Введите жанр: <input name='genre'
                        type='text' maxlength='32' /> <br>");
                        
                        echo("Введите режиссёр: <input name='regisseur'
                        type='text' maxlength='32' /> <br>");
                        
                        echo("Введите год выпуска: <input name='year'
                        type='number' min='1' max='2077' value='2020'/> <br>");
                        
                        echo("Введите кассовые сборы: <input name='cost'
                        type='number' min='1' max='9999999' value='1'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "cinema":
                        echo("<fieldset><legend>Добавить новый Кинозал</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите название зала: <input name='name'
                        type='text' maxlength='32'/> <br>");
                        
                        echo("Введите категорию: <input name='category'
                        type='text' maxlength='32'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "session":
                        $queryTab_0 = "film";
                        $queryTab_1 = "cinema";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить новый Киносеанс</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите дату и время начала показа фильма: <input id='date_s' name='date_s'
                        type='datetime-local'/> <br>");
                        
                        $id_0 = "film";
                        echo("<label for='$id_0'>Список Фильмов: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "cinema";
                        echo("<label for='$id_1'>Список Кинозалов: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        
                        echo("Введите количество мест: <input name='count_f'
                        type='number' min='1' max='9999999' value='1'/> <br>");
                        
                        echo("Введите количество занятых мест: <input name='count_b'
                        type='number' min='1' max='9999999' value='1'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
            }
            
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>