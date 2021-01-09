<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
        <?
            echo("<div>");
            $queryTab = "film";
            $headText = "Таблица Фильмы";
            $arrayTitle = array("№",  "Название", "жанр", "режиссёр", "год выпуска", "кассовые сборы", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."film"."'> Добавить новый Фильм</a> </div>");
            echo("</div>");
            
            $queryTab = "cinema";
            $headText = "Таблица Кинозалы";
            $arrayTitle = array("№", "название зала", "категория", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."cinema"."'> Добавить новый Кинозал</a> </div>");
            echo("</div>");
            
            $queryTab = "session_info";
            $headText = "Таблица Киносеансы";
            $arrayTitle = array("№", "дата и время начала показа фильма", "фильм", "кинозал", "количество мест"," количество занятых мест", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."session"."'> Добавить новый Киносеанс</a> </div>");
            echo("</div>");
            echo("</div>");
           
            echo("<div>");
            echo("<div> <a href='/lab5/gen_pdf.php'> Открыть PDF - файл </a> </div>");
            echo("<div> <a href='/lab5/gen_xls.php'> Загрузить XLS - файл </a> </div>");
            echo("</div>");
            echo("</div>");
        ?>
    </body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>