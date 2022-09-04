<?php
    include("blocks/db_connect.php");
    include('blocks/path.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ГБПОУ "АГТ Ак-Довуракский горный техникум"</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>

    <?php 
        include("blocks/header.php"); 
    ?>

    <div class="content">
        <div class="container">
        <div class = "news">
            <h3 class = "news_title">Новости</h3>
            <div class="news_divider"></div>
            <div class="news_wrapper">
                <?php
                  $result = mysqli_query($link, "SELECT * FROM table_news LIMIT 6");
                  if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    do {
                        echo '
                            <div class = " card news_wrapper_card">
                                <div class = "card-img-top">
                                    <img class = " news_wrapper_card_img" src="img/news/'.$row["image"].'" alt="">
                                </div>
                                <h4 class = "news_wrapper_card_date">'.$row["datetime"].'</h4>
                                <a href="novosti.php?id='.$row["id"].'"><h3 class = "news_wrapper_card_title">'.$row["title"].'</h3></a>
                                <div class = "news_wrapper_card_descr">'.$row["mini_description"].'
                                </div>
                            </div>
                        ';
                    } while ($row = mysqli_fetch_array($result));
                  } else{
                      echo "Ошибка: " . mysqli_error($link);
                  }

                  mysqli_close($link);
                ?>
                
            </div>
            <a href="./novosti.php" class = "news_btn">Все новости</a>
        </div>

        </div>
    </div>

    <?php 
        include("blocks/footer.php"); 
    ?>

    <script src="js/script.js"></script>
</body>
</html>