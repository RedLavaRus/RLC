<?php
//var_dump($data);


?>
    <div class="news container">
        <div class="main_news">
            <div class="main_news_title"><?php echo $data["heads"] ;?></div>
            <div class="main_news_data"><?php echo $data["datecreat"] ;?></div>
            <div class="main_news_text"><?php echo $data["texts"] ;?></div>
            <div class="main_news_panel">
                <div class="main_news_panel_left">
                    
                    <div class="main_news_panel_comment"><img class="main_news_panel_comment_img" src="img/comment.png" alt=""><?php echo $data["comment"] ;?></div>
                </div>
                <div class="main_news_panel_viewing"><img class="main_news_panel_viewing_img" src="img/wive.png" alt=""><?php echo $data["weiv"] ;?></div>
            </div>
            <?php /*
            <div class="main_news_comment">
                <div class="main_news_comment_users">
                    <div class="main_news_comment_users_avatar"></div>
                    <div class="main_news_comment_users_name">Иванов Иван</div>
                    <div class="main_news_comment_users_text">Господа, современная методология разработки позволяет выполнить важные задания по разработке существующих финансовых и административных условий. Следует отметить, что базовый вектор развития играет важную роль в формировании модели
                        развития.
                    </div>
                </div>
                <div class="main_news_comment_users">
                    <div class="main_news_comment_users_avatar"></div>
                    <div class="main_news_comment_users_name">Иванов Иван</div>
                    <div class="main_news_comment_users_text">И нет сомнений, что некоторые особенности внутренней политики могут быть смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности.
                    </div>
                </div>
                <div class="main_news_comment_users">
                    <div class="main_news_comment_users_avatar"></div>
                    <div class="main_news_comment_users_name">Иванов Иван</div>
                    <div class="main_news_comment_users_text">Прототип нового сервиса - это как детский заливистый смех
                    </div>
                </div>

                <div class="main_news_comment_box_form">
                    <div class="main_news_comment_avatar"></div>
                    <form class="main_news_comment_form">
                        <textarea class="main_news_comment_form_textarea" name="comment"></textarea>
                        <input class="main_news_comment_input" type="submit" value="Отправить">
                    </form>
                </div>
            </div>
            */?>
        </div>