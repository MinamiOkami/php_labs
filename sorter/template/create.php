<div class="creat">
    <h1>Привязать любой # к области «знаний»</h1>
    <table class="hashtag" id="withRelation">
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
                    }elseif( in_array($row['id'], $hashtags_with_fields)){
                        echo  "<td>" . $row['id'] . "</td>";
                        echo  "<td>" . $row['name'] . "</td>";
                        echo  "<td>" . $row['date'] . "</td>";
                        // $sql1 = "SELECT * FROM relation,Field WHERE relation.id_field = Field.id";
                        $sql1 = "SELECT * FROM relation LEFT JOIN Field ON (relation.id_field = Field.id)";
                        $result1 = mysqli_query($link, $sql1);
                        echo  "<td>";
                        while ($row1 = mysqli_fetch_array($result1)) {
                            if( $row['id']== $row1['id_hashtag']){
                                echo  $row1['name'] . "<br>";
                            }
                        }
                        echo  "</td>";
                    }
                    echo  "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    <form action="" method="post" class="relation">
    <fieldset class="relation__fieldset">
      <legend class="relation__legend">Привязать любой # к области «знаний»</legend>
      <div>
        <label class="relation__label" for="relationHashtag">Хэштег</label>
        <select class="relation__hashtag" name="relation-hashtag" id="relationHashtag" require>
          <option value="" selected="true" disabled="disabled">Выберите #</option>
          <?php 
          $sql = "SELECT * FROM hashtag";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_array($result)) {
            echo  "<option value=" . $row['id'] . ">" .$row['name']."</option>";
          }
          ?>
        </select>
      </div>
      <div>
        <label class="relation__label" for="relationField">Область "знаний"</label>
        <select class="relation__field" name="relation-field" id="relationField" require>
          <option value="" selected="true" disabled="disabled">Выберите область "знаний"</option>
          <?php 
          $sql = "SELECT * FROM Field";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_array($result)) {
            echo  "<option value=" . $row['id'] . ">" .$row['name']."</option>";
          }
          ?>
        </select>
      </div>
      <button class="relation__button" type="submit" name="relation" value="true">Привязать</button>
    </fieldset>
  </form>
  <?php 
  if(isset($_POST['relation'])) {
    $id_hashtag= $_POST["relation-hashtag"]; 
    $id_field = $_POST["relation-field"]; 
    $sql = "insert into relation (id_hashtag, id_field) values ('$id_hashtag','$id_field')";
    $link->query($sql); 
    $link->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  ?>
  <form action="" method="post" class="add-field">
    <fieldset class="add-field__fieldset">
      <legend class="add-field__legend">Создание новой области "знаний"</legend>
      <div>
        <label for="fieldName" class="add-field__label">Название области</label>
        <input type="text" class="add-field__input" id="fieldName" name="field-name" placeholder="пример" require>
      </div>
      <div>
        <label for="fieldDescription" class="add-field__label">Описание области</label>
        <textarea class="add-field__textarea" id="fieldDescription" name="field-description" placeholder="про пример больше текста" require></textarea>
      </div>
      <button class="add-field__button" type="submit" name="add-field" value="true">Добавить область "знаний"</button>
    </fieldset>
  </form>
  <?php 
  if(isset($_POST['add-field'])) {
    $name = $_POST["field-name"]; 
    $description = $_POST["field-description"]; 
    $date = date("Y/m/d");
    $sql = "insert into Field (name,description, date) values ('$name','$description', '$date')";
    $link->query($sql); 
    $link->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  ?>

</div>
