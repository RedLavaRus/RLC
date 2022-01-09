
    <form action="/register/" method="post">
    <div class="register container">
        <div class="register_title">Регистрация</div>

        <div class="register_error">
        <?php if(isset($login)){ echo $login;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="register_username" id="username" name="login" required="required" type="text" placeholder="Имя" />
        </p>

        <div class="register_error">
        <?php if(isset($pass1)){ echo $pass1;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="register_password" id="password" name="password1" required="required" type="password" placeholder="Пароль" />
        </p>

        <div class="register_error">
        <?php if(isset($pass1)){ echo $pass1;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="register_password" id="password" name="password2" required="required" type="password" placeholder="Повторите пароль" />
        </p>

        <div class="register_error">
        <?php if(isset($email)){ echo $email;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="register_password" id="email" name="email" required="required" type="email" placeholder="E-mail" />
        </p>
        <p class="keep_register">
            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping"  required="required"/>
            <label for="loginkeeping">Даю согласие на обработку персональных данных</label>
        </p>
<?php /*
        <div class="register_captcha">
            <img class="register_captcha_img" src="img/captcha-internet-translate.jpg" alt="">
            <input class="register_captcha_input" id="captcha" name="captcha" required="required" type="captcha" placeholder=" Введите текст с картинки" />
        </div>
*/ ?>
        <div class="register_box_button">
            <a class="register_button_login" href="">Вход</a>
            <p class="register_button">
                <input class="register_button_input" name="submit" type="submit" value="Далее" />
            </p>
        </div>
    </div>
    </form>

