<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
            <p class="store-logo">BitBazar</p>
            <p>Панель адміністратора</p>
        </div>
        <div class="card-body">
            <form action="/admin/login" method="post">
                <div class="form-group">
                    <label for="login">Логін:</label>
                    <input id="login" type="text" class="form-control" name="login"
                        <?php echo (isset($login) ? 'value=' .base64_decode($login) : '')?>
                    />
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input id="password" type="password" class="form-control" name="password"
                        <?php echo (isset($password) ? 'value=' .base64_decode($password) : '')?>
                    />
                    <p class="help-block"></p>
                </div>
                <div class="form-group">
                    <input id="remember-me" type="checkbox" name="rememberMe"
                        <?php echo (isset($rememberMe) ? $rememberMe : '')?>
                    />
                    <label for="remember-me">Запам'ятати мене</label>
                    <p class="help-block"></p>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Вхід</button>
            </form>
        </div>
    </div>
</div>