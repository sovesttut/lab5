<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if((isset($_GET['id']))&&(isset($_GET['query']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                switch($index){
                    case "film":
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rows = array();
                        echo("<fieldset><legend>Изменить Фильм</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите Название: <input name='name'
                        type='text' maxlength='32' value='$rows[1]'/> <br>");
                        
                        echo("Введите жанр: <input name='genre'
                        type='text' maxlength='32' value='$rows[2]'/> <br>");
                        
                        echo("Введите режиссёр: <input name='regisseur'
                        type='text' maxlength='32' value='$rows[3]'/> <br>");
                        
                        echo("Введите год выпуска: <input name='year'
                        type='number' min='1' max='2077' value='$rows[4]'/> <br>");
                        
                        echo("Введите кассовые сборы: <input name='cost'
                        type='number' min='1' max='9999999' value='$rows[5]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "cinema":
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rows = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<fieldset><legend>Изменить программу депозита</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите название зала: <input name='name'
                        type='text' maxlength='32' value='$rows[1]'/> <br>");
                        
                        echo("Введите категорию: <input name='category'
                        type='text' maxlength='32' value='$rows[2]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "session_info":
                        $query_2 = "SELECT * FROM $database.$index WHERE id='$id'";
                        $index = "session";
                        $queryTab_0 = "film";
                        $queryTab_1 = "cinema";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        $result_2 = mysqli_query($link, $query_2) or die("Не могу выполнить запрос!");
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                    
                        $rows = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                    
                        $rws = array();
                        while ($row=mysqli_fetch_array($result_2)){
                            $rws = $row;
                        }
                        
                        echo("<fieldset><legend>Изменить</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите дату и время начала показа фильма: <input id='date_s' name='date_s'
                        type='datetime-local' value='$rows[1]'/> <br>");
                        
                        $id_0 = "film";
                        echo("<label for='$id_0'>Список разрешенных характеристик: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            if($rws[2]==$row[1]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                            
                        }
                        echo("</select><br>");
                        $id_1 = "cinema";
                        echo("<label for='$id_1'>Список соответствующих значений: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                    
                        while ($row=mysqli_fetch_array($result_1)){
                            if($rws[3]==$row[1]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                                
                        }
                        echo("</select><br>");
                        
                        echo("Введите количество мест: <input name='count_f'
                        type='number' min='1' max='9999999' value='$rows[4]'/> <br>");
                        
                        echo("Введите количество занятых мест: <input name='count_b'
                        type='number' min='1' max='9999999' value='$rows[5]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
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