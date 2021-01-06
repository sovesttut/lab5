<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "Banks":
                        echo("<fieldset><legend>Добавить новый банк</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите наименование: <input name='bank_name'
                        type='text' maxlength='60' /> <br>");
                        
                        echo("Введите ИНН: <input name='bank_INN'
                        type='text' maxlength='50' /> <br>");
                        
                        echo("Введите страну: <input name='bank_strana'
                        type='text' maxlength='60' /> <br>");
                        
                        echo("Введите класс надежности: <input name='bank_class'
                        type='number' min='1' max='9' value='1'/> <br>");
                        
                        echo("Введите объем активов: <input name='bank_obiem'
                        type='text' maxlength='40' /> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "deposit_programs":
                        $queryTab = "Banks";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id_bank ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить нового программу депозита</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите название: <input name='deposit_name'
                        type='text' maxlength='50'/> <br>");
                        
                        echo("Введите % годовых: <input name='percent'
                        type='number' min='1' max='9999999' value='1' size='11' /> %<br>");
                        
                        $id = "Banks";
                        echo("<label for='$id'>Список банков: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите банк--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "сontribution":
                        $queryTab = "deposit_programs";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id_deposit ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить новый вклад</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите дату создания вклада: <input name='date'
                        type='date'/> <br>");
                        
                        $id = "deposit_programs";
                        echo("<label for='$id'>Список программ депозитов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите программу депозита--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        echo("Введите  стартовую сумму вклада: <input name='count'
                        type='number' min='1' max='9999999' value='1' size='11' ><br>");
                        
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