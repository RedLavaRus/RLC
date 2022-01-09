
    <form action="/login/" method="post"><div class="login container">
        <div class="login_title">Вход</div>

        <div class="login_error">
            <?php if(isset($login)){ echo $login;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="login_username" id="username" name="login" required="required" type="text" placeholder="Имя" />
        </p>
        <div class="login_error"><?php if(isset($pass1)){ echo $pass1;}else {echo "&nbsp;";}?>
        </div>
        <p>
            <input class="login_password" id="password" name="password1" required="required" type="password" placeholder="Пароль" />
        </p>
        <div class="login_error">&nbsp;
        </div>

        <div class="login_box_button">
            <a class="login_button_register" href="/register/">Регистрация</a>
            <p class="login_button">
                <input class="login_button_input" type="submit" name="submit" value="Далее" />
            </p>
        </div>
    </div>
    </form>