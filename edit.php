<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if((isset($_GET['id']))&&(isset($_GET['query']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                switch($index){
                    case "Banks":
                        $query = "SELECT * FROM $database.$index WHERE id_bank='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rows = array();
                        echo("<fieldset><legend>Изменить банк</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите наименование: <input name='bank_name'
                        type='text' maxlength='60' value='$rows[1]' /> <br>");
                        
                        echo("Введите ИНН: <input name='bank_INN'
                        type='text' maxlength='50' value='$rows[2]' /> <br>");
                        
                        echo("Введите страну: <input name='bank_strana'
                        type='text' maxlength='60' value='$rows[3]'/> <br>");
                        
                        echo("Введите класс надежности: <input name='bank_class'
                        type='number' min='1' max='9' value='$rows[4]' /> <br>");
                        
                        echo("Введите объем активов: <input name='bank_obiem'
                        type='text' maxlength='40' value='$rows[5]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "deposit_programs_info":
                        $index = "deposit_programs";
                        $query = "SELECT * FROM $database.$index WHERE id_deposit='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rws = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rws = $row;
                        }
                        $queryTab = "Banks";
                        $query = "SELECT * FROM $database.$queryTab";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        
                        echo("<fieldset><legend>Изменить программу депозита</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите название: <input name='deposit_name'
                        type='text' maxlength='50' value='$rws[1]' /> <br>");
                        
                        echo("Введите % годовых: <input name='percent'
                        type='number' min='1' max='9999999' size='11' value='$rws[2]' /> %<br>");
                        
                        $id = "Banks";
                        echo("<label for='$id'>Список банков: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите банк--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            if($rws[3]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "сontribution_info":
                        $index = "сontribution";
                        $query = "SELECT * FROM $database.$index WHERE id_сontribution='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rws = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rws = $row;
                        }
                        $queryTab = "deposit_programs";
                        $query = "SELECT * FROM $database.$queryTab";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        
                        echo("<fieldset><legend>Изменить вклад</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите дату создания вклада: <input name='date'
                        type='date'  value='$rws[1]'/> <br>");
                        
                        $id = "deposit_programs";
                        echo("<label for='$id'>Список программ депозитов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите программу депозита--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            if($rws[2]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        echo("</select><br>");
                        
                        echo("Введите  стартовую сумму вклада: <input name='count'
                        type='number' min='1' max='9999999' value='$rws[3]' size='11' ><br>");
                        
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