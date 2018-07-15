<?php

/**
 * login short summary.
 *
 * login description.
 *
 * @version 1.0
 * @author Віталік
 */


?>
<div class="text-center">
    <h1>Авторизація</h1>
    <form class="login">
        <input type="text" name = "user" placeholder="Ім'я" />
        <input type="password" name = "password" placeholder="Пароль" />
        <input type="submit" value="Вхід" class="btn btn-success btn-lg" />
        <div class="remember-forgot">
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"/>
                            не виходити
                        </label>
                    </div>
                </div>
                <div class="col-md-6 forgot-pass-content">
                    <a href="javascription:void(0)" class="forgot-pass">забув пароль</a>
                </div>
            </div>
        </div>
    </form>
</div>