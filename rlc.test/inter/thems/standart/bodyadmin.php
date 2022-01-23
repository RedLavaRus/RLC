
<body>
    <div class="menu_lvl-1">
        <div class="menu_lvl-1_up">
            <img class="logo" src="/src/img/redlavalogo.png" alt="">
            <ul class="menu_lvl-1_ul">

                <a class="menu_lvl-1_link" href="" id="el1">
                    <li class="menu_lvl-1_li">
                        <div class="menu_lvl-1_li_icon"></div>
                        заказы
                    </li>
                </a>

                <a class="menu_lvl-1_link" href=""  id="el2">
                    <li class="menu_lvl-1_li">
                        <div class="menu_lvl-1_li_icon"></div>
                        магазин
                    </li>
                </a>

                <a class="menu_lvl-1_link" href=""  id="el3">
                    <li class="menu_lvl-1_li">
                        <div class="menu_lvl-1_li_icon"></div>
                        пользователь
                    </li>
                </a>

                <a class="menu_lvl-1_link" href=""  id="el4">
                    <li class="menu_lvl-1_li">
                        <div class="menu_lvl-1_li_icon"></div>
                        настройки
                    </li>
                </a>

                <a class="menu_lvl-1_link" href=""  id="el5">
                    <li class="menu_lvl-1_li">
                        <div class="menu_lvl-1_li_icon"></div>
                        маркетплейс
                    </li>
                </a>

            </ul>
        </div>
        <div class="menu_lvl-1_help">
            <div class="menu_lvl-1_help_icon"></div>
            <a class="menu_lvl-1_help_link" href="">помощь</a>
        </div>
    </div>
    <div class="content_load_menu"></div>
<script>
    $('#el1').on('click', function(){ //При клике по элементу с id=price выполнять...
        $.ajax({
            url: 'price.html', //Путь к файлу, который нужно подгрузить
            type: 'GET',
            beforeSend: function(){
                $('#content_load_menu').empty(); //Перед выполнением очищает содержимое блока с id=content
            },
            success: function(responce){        
                    $('#content_load_menu').append(responce); //Подгрузка внутрь блока с id=content
            },
            error: function(){
                alert('Error!');            
            }
        });
    });
</script>
    
    <div class="main_page">
        <div class="main_page_navigation">
            <div class="main_page_navigation_search">
                <form class="main_page_navigation_search_form" method="get">
                    <input class="main_page_navigation_search_input" type="text" placeholder="Искать здесь...">
                    <button class="main_page_navigation_search_button" type="submit"></button>
                </form>
            </div>
            <div class="main_page_navigation_notification">
                <img class="main_page_navigation_notification_image" src="/src/img/premium-icon-notification-bell-386091.png" alt=""> 85
            </div>
            <div class="main_page_navigation_user">
                <div class="main_page_navigation_user_name"> Иванов Иван</div>
                <div class="main_page_navigation_user_photo"></div>
            </div>
        </div>
</body>

</html>