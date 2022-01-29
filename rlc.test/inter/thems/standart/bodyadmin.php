
<body class="body_admin">
    

<div class="menu_lvl-21" id="content_load_menu">
        
    </div>

    <div class="menu_lvl-1">
        <div class="menu_lvl-1_up">
            <img class="logo" src="/src/img/redlavalogo.png" alt="">
            <ul class="menu_lvl-1_ul">

                
                    <li class="menu_lvl-1_li" id="el1">
                        <div class="menu_lvl-1_li_icon"  id="el1"></div>
                        заказы
                    </li>
                

                
                    <li class="menu_lvl-1_li"  id="el2">
                        <div class="menu_lvl-1_li_icon"   id="el2"></div>
                        магазин
                    </li>

					<li class="menu_lvl-1_li"  id="el6"   id="el4">
                        <div class="menu_lvl-1_li_icon"></div>
                        блог
                    </li>

                
                    <li class="menu_lvl-1_li"  id="el3"   id="el3">
                        <div class="menu_lvl-1_li_icon"></div>
                        пользователь
                    </li>
                

                
                    <li class="menu_lvl-1_li"  id="el4"   id="el4">
                        <div class="menu_lvl-1_li_icon"></div>
                        настройки
                    </li>
               

                
                    <li class="menu_lvl-1_li"  id="el5"   id="el5">
                        <div class="menu_lvl-1_li_icon"></div>
                        маркетплейс
                    </li>
                

            </ul>
        </div>
        <div class="menu_lvl-1_help">
            <div class="menu_lvl-1_help_icon"></div>
            <a class="menu_lvl-1_help_link" href="">помощь</a>
        </div>
        
    </div>
    

    
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

        <script type="text/javascript">
$(function(){		
	$('#el1').on('click', function(){		
		$.ajax({
			url: '/ajax/?act=el1',
			type: 'GET',
			beforeSend: function(){
				$('#content_load_menu').empty();		
			},
			success: function(responce){		
					$('#content_load_menu').append(responce);
			},
			error: function(){
				alert('Error!');			
			}
		});
	});
	$('#el2').on('click', function(){	//При клике по элементу с id=price выполнять...
		$.ajax({
			url: '/ajax/?act=el2', //Путь к файлу, который нужно подгрузить
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
	$('#el3').on('click', function(){		
		$.ajax({
			url: '/ajax/?act=el3',
			type: 'GET',
			beforeSend: function(){
				$('#content_load_menu').empty();		
			},
			success: function(responce){		
					$('#content_load_menu').append(responce);
			},
			error: function(){
				alert('Error!');			
			}
		});
	});
    
	$('#el4').on('click', function(){		
		$.ajax({
			url: '/ajax/?act=el4',
			type: 'GET',
			beforeSend: function(){
				$('#content_load_menu').empty();		
			},
			success: function(responce){		
					$('#content_load_menu').append(responce);
			},
			error: function(){
				alert('Error!');			
			}
		});
	});
    
	$('#el5').on('click', function(){		
		$.ajax({
			url: '/ajax/?act=el5',
			type: 'GET',
			beforeSend: function(){
				$('#content_load_menu').empty();		
			},
			success: function(responce){		
					$('#content_load_menu').append(responce);
			},
			error: function(){
				alert('Error!');			
			}
		});
	});
	$('#el6').on('click', function(){		
		$.ajax({
			url: '/ajax/?act=el6',
			type: 'GET',
			beforeSend: function(){
				$('#content_load_menu').empty();		
			},
			success: function(responce){		
					$('#content_load_menu').append(responce);
			},
			error: function(){
				alert('Error!');			
			}
		});
	});
});

const popup = document.querySelector('.menu_lvl-2_ul');

document.onclick = function(e){
    if ( event.target.className != 'pop-up' ) {
        popup.style.display = 'none';
    };
};



</script>
<script type="text/javascript">
$(document).mouseup(function (event) {
        if ($(".menu_lvl-2").has(event.target).length === 0){
            $(".menu_lvl-2").hide();
        }
    });
    </script>


</body>
</html>