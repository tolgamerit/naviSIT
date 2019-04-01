<?php

if (isset($_POST['kullanici'], $_POST['parola'])) {
    $kullanici = $_POST['kullanici'];
    $parola = $_POST['parola'];

    $query  = $db->query("SELECT * FROM user_login WHERE username=md5('$kullanici') and pass=md5('$parola')", PDO::FETCH_ASSOC);
    if ($say = $query->rowCount() > 0) {

        $_SESSION['kullanici'] = $_POST['kullanici'];

        $_SESSION['parola'] = $_POST['parola'];

        echo '<meta http-equiv="refresh" content="0;URL=home.php">';
      } else {
        echo "   <div class='alert alert-danger rounded' role='alert'>
                                Girilen bilgiler hatalı!
                              </div>";
      }
  }
