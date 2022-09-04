<?php
    include("blocks/db_connect.php");

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
        require_once "blocks/header.php" 
    ?>

    <div class="content">
        <div class="container">
            <div class="abitur">                    
                <h3 class = "abitur_title">АБИТУРИЕНТУ</h3>
                <ul class = "abitur_menu">
                    <li class = "abitur_menu_item"><a href="sveden/common.php" >Приемная кампания 2022</a></li>
                    <li class = "abitur_menu_item"><a href="sveden/struct.php" >Информация о поступлении</li></a>
                    <li class = "abitur_menu_item"><a href="sveden/document.php" >Наши специальности</a></li>
                    <li class = "abitur_menu_item"><a href="sveden/education" >Перечень платных образовательных услуг</a></li>
                    <li class = "abitur_menu_item"><a href="sveden/education" >Приказы о зачислении 2022-2023</a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php 
        require_once "blocks/footer.php" 
    ?>

    <script src="js/script.js"></script>
</body>
</html>