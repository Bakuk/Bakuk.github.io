<?php
    include("blocks/db_connect.php");

    //код пагинации
    $num = 3; // Здесь указываем сколько хотим выводить карточек.
    $page = (int)$_GET['page'];              
    
	$count = mysqli_query($link, "SELECT COUNT(*) FROM table_news");
    $temp = mysqli_fetch_array($count);

	If ($temp[0] > 0)
	{  
	$tempcount = $temp[0];

	// Находим общее число страниц
	$total = (($tempcount - 1) / $num) + 1;
	$total =  intval($total);

	$page = intval($page);

	if(empty($page) or $page < 0) $page = 1;  
       
	if($page > $total) $page = $total;
	 
	// Вычисляем начиная с какого номера
    // следует выводить товары 
	$start = $page * $num - $num;

	$qury_start_num = " LIMIT $start, $num"; 
	}


    //вывод контента новость
    $id_new = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ГБПОУ "АГТ Ак-Довуракский горный техникум"</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
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
        <?php
             echo '<ul class = "news_list">';
                
                  if($id_new == ""){
                    $result = mysqli_query($link, "SELECT * FROM table_news $qury_start_num");
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                        do {
                            echo '
                                <li>
                                    <a href="novosti.php?id='.urlencode($row["id"]).'">
                                            <img class = "news_list_card_img"  src="img/news/'.$row["image"].'" alt="">
                                    </a>
                                    <div>
                                        <h4 class = "news_list_card_date">'.$row["datetime"].'</h4>
                                        <a href="novosti.php?id='.urlencode($row["id"]).'"><h3 class = "news_wrapper_card_title">'.$row["title"].'</h3></a>
                                        <div class = "news_list_card_descr">'.$row["mini_description"].'</div>
                                    </div>
                                </li>
                            ';
                        } while ($row = mysqli_fetch_array($result));
                    } else{
                        echo "Ошибка: " . mysqli_error($link);
                    }

                    mysqli_close($link);
                     //вывод пагинации
        
                     if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="novosti.php?page='.($page - 1).'">&lt;</a></li>';}
                     if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="novosti.php?page='.($page + 1).'">&gt;</a></li>';
 
 
                     // Формируем ссылки со страницами
                     if($page - 5 > 0) $page5left = '<li><a href="novosti.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
                     if($page - 4 > 0) $page4left = '<li><a href="novosti.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
                     if($page - 3 > 0) $page3left = '<li><a href="novosti.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
                     if($page - 2 > 0) $page2left = '<li><a href="novosti.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
                     if($page - 1 > 0) $page1left = '<li><a href="novosti.php?page='.($page - 1).'">'.($page - 1).'</a></li>';
 
                     if($page + 5 <= $total) $page5right = '<li><a href="novosti.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
                     if($page + 4 <= $total) $page4right = '<li><a href="novosti.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
                     if($page + 3 <= $total) $page3right = '<li><a href="novosti.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
                     if($page + 2 <= $total) $page2right = '<li><a href="novosti.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
                     if($page + 1 <= $total) $page1right = '<li><a href="novosti.php?page='.($page + 1).'">'.($page + 1).'</a></li>';
 
 
                     if ($page+5 < $total)
                     {
                         $strtotal = '<li><p class="nav-point">...</p></li><li><a href="novosti.php?page='.$total.'">'.$total.'</a></li>';
                     }else
                     {
                         $strtotal = ""; 
                     }
 
                     if ($total > 1)
                     {
                         echo '
                         <div class="pstrnav">
                         <ul>
                         ';
                         echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='novosti.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
                         echo '
                         </ul>
                         </div>
                         ';
                     }   
                echo '</ul>';
                }

                  else{
                    $res = mysqli_query($link, "SELECT * FROM table_news WHERE id = '$id_new'");
                    $res_img = mysqli_query($link, "SELECT * FROM uploads_images WHERE news_id = '$id_new'");
                     
                    if(mysqli_num_rows($res) > 0){
                        $row_new = mysqli_fetch_array($res);
                        do {
                            echo '
                                <h4 class = "new_date">'.$row_new["datetime"].'</h4>
                                <h3 class = "new_title">'.$row_new["title"].'</h3>
                                <img class = "img-thumbnail new_img" src="img/news/'.$row_new["image"].'" alt="">
                                
                                <div class = "new_mini_descr">'.$row_new["mini_description"].'</div>
                                <div class = "new_descr">'.$row_new["description"].'</div>

                            ';
                           
                            if(mysqli_num_rows($res_img) > 0){
                                $row_img = mysqli_fetch_array($res_img);
                                echo '
                                    
                                    <ul class = "image_slid">';
                                do{
                                    echo '
                                        <li>
                                        <a data-fancybox="gallery" data-width="640" data-height="480" href="img/news/'.$row_img["image"].' "><img class ="img_item" src="img/news/'.$row_img["image"].' "/></a>
                                        </li>
                                        
                                    ';
                                    
                                    
                                }while($row_img = mysqli_fetch_array($res_img));
                                echo '
                                    </ul>
                                    
                                ';
                            }
                        } while ($row_new = mysqli_fetch_array($res));
                    } else{
                        echo "Ошибка: " . mysqli_error($link);
                    }

                    mysqli_close($link);
                    
                  }
                ?>
                
            
        </div>
        </div>
    </div>

    <?php 
        include("blocks/footer.php"); 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="js/script.js"></script>

</body>
</html>