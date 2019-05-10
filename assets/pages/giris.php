<?php

if (isset($_POST['kullanici'], $_POST['parola'])) {
    $kullanici = $_POST['kullanici'];
    $parola = $_POST['parola'];

    $query  = $db->query("SELECT * FROM tbl_kullanici WHERE kullanici=md5('$kullanici') and parola=md5('$parola')", PDO::FETCH_ASSOC);
    if ($say = $query->rowCount() > 0) {

        $_SESSION['kullanici'] = $_POST['kullanici'];

        $_SESSION['parola'] = $_POST['parola'];

        echo '<meta http-equiv="refresh" content="0;URL=anasayfa.php">';
      } else {
        echo "   <div class='alert alert-danger rounded' role='alert'>
                                Girilen bilgiler hatalı!
                              </div>";
      }
  }
