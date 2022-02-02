<?php

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
                <a class="pagination_link" href="#">«</a>
                <a class="pagination_link" href="#">1</a>
                <a class="pagination_link" href="#">2</a>
                <a class="pagination_link" href="#">3</a>
                <a class="pagination_link" href="#">4</a>
                <a class="pagination_link" href="#">5</a>
                <a class="pagination_link" href="#">6</a>
                <a class="pagination_link" href="#">»</a>
            </div>
        </div>
