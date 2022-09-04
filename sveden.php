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
            <div class="sveden">                    
                <h3 class = "sveden_title">Сведения об образовательной организации</h3>
                <ul class = "sveden_menu">
                    <li class = "sveden_menu_item"><a href="sveden/common.php" >Основные сведения</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/struct.php" >Структура и органы управления образовательной организацией</li></a>
                    <li class = "sveden_menu_item"><a href="sveden/document.php" >Документы</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Образование</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Образовательные стандарты</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Руководство. Педагогический (научно-педагогический) состав</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Материально-техническое обеспечение и оснащённость образовательного процесса</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Стипендии и меры поддержки обучающихся</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Платные образовательные услуги</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Финансово-хозяйственная деятельность</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Вакантные места для приёма (перевода) обучающихся</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Доступная среда</li></a>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Внутренняя независимая оценка качества образования ХГУ им. Н.Ф. Катанова</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Аттестация ППС</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Аттестация ПР</a></li>
                    <li class = "sveden_menu_item"><a href="sveden/education" >Замещение должностей научно-педагогических работников</a></li>
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