


        <div class="other_news">
        <?php
            
            foreach($data6 as $d){
                
            
                echo '<div class="other_news_content"><div class="other_news_content_title">'.$d["heads"].'</div>';
                echo '<div class="other_news_content_data">'.$d["datecreat"].'</div>';
                echo '<div class="other_news_content_text">'.$d["texts"].'</div>';
                echo '<a class="other_news_content_link" href="/blog/topic/?thems='.$d["url"].'">Читать полностью</a></div>';
            }
            
?>