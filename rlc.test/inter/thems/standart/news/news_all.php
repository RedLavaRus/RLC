<?php
//echo $data1;
?>
    <div class="news_all container">
        <div class="news_all_contant">
            
            <?php
foreach($data as $d){
    

    echo '<div class="news_all_contant_element"><div class="news_all_contant_element_title">'.$d["heads"].'</div>';
    echo '<div class="news_all_contant_element_data">'.$d["datecreat"].'</div>';
    echo '<div class="news_all_contant_element_text">'.$d["texts"].'</div>';
    echo '<a class="news_all_contant_element_link" href="/blog/topic/?thems='.$d["url"].'">Читать полностью</a></div>';
}
?>
 <div class="pagination">          
<?php
//var_dump($data1,$data2,$data3,$data4);
if($data2 != 1){
    $p=$data2-1;
    echo '<a class="pagination_link"  href="/blog/?page='.$p.'">«</a>';
}

foreach($data1 as $a1){
    if($a1 == $data5){
        echo '<a class="pagination_link" id = "pagination_link_in" href="#">'. $a1.'</a>';
    }else{
    echo '<a class="pagination_link"href="/blog/?page='.$a1.'">'. $a1.'</a>';
    }
}
if($data4 == "no"){
    $p=$data3+1;
    echo '<a class="pagination_link" href="/blog/?page='.$p.'">»</a>';
}
?>
  </div>
        </div>          
              
                
            
