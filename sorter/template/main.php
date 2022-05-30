<?php 
    if ($link == false) {
        print("<h1>"."Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error()."</h1>"."<br>");
    } else {
        print("<h1>"."Соединение установлено успешно"."</h1>"."<br>");
    }
 ?>