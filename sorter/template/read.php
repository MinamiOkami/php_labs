<div class="read">
    <h1>Не привязаны к области "Знаний"</h1>
    <table class="hashtag" id="withoutRelation">
        <tbody>
            <tr>
                <th>id</th>
                <th>Хэштег</th>
                <th>Дата</th>
                <th>Область "знаний"</th>
            </tr>
            <tr>
                <?php
                $hashtags_with_fields = [];

                $sql = "SELECT id_hashtag FROM relation";
                $result = mysqli_query($link, $sql);
                $c = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $hashtags_with_fields[$c] = $row[0];
                    $c += 1;
                }

                $sql = "SELECT * FROM hashtag";
                $result = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo  "<tr>";
                    if (!in_array($row['id'], $hashtags_with_fields)) {
                        echo  "<td>" . $row['id'] . "</td>";
                        echo  "<td>" . $row['name'] . "</td>";
                        echo  "<td>" . $row['date'] . "</td>";
                        echo  "<td>" . '----' . "</td>";
                    }
                    echo  "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <form action="" method="post" class="add-hashtag">
    <fieldset class="add-hashtag__fieldset">
      <legend class="add-hashtag__legend">Создание нового "#"</legend>
        <label for="hashtagName" class="add-hashtag__label">Название "#"</label>
        <input type="text" class="add-hashtag__input" id="hashtagName" name="hashtag-name" placeholder="toma" require>
      <button class="add-hashtag__button" type="submit" name="add-hashtag" value="true">Добавить "#"</button>
    </fieldset>
  </form>
  <?php 
  if(isset($_POST['add-hashtag'])) {
    $name = $_POST["hashtag-name"]; 
    $date = date("Y/m/d");
    $sql = "insert into hashtag (name, date) values ('$name', '$date')";
    $link->query($sql);
    $link->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  ?>

</div>

