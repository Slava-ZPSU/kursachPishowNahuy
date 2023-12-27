<div class="container">
    <h1 class="mt-4 mb-3">Вхід</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/login" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="login">Логін:</label>
                        <input id="login" type="text" class="form-control" name="login"
                            <?php echo (isset($login) ? 'value=' .base64_decode($login) : '')?>
                        />
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="password">Пароль:</label>
                        <input id="password" type="password" class="form-control" name="password"
                            <?php echo (isset($password) ? 'value=' .base64_decode($password) : '')?>
                        />
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <input id="remember-me" type="checkbox" name="rememberMe"
                            <?php echo (isset($rememberMe) ? $rememberMe : '')?>
                        />
                        <label for="remember-me">Запам'ятати мене</label>
                        <p class="help-block"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Вхід</button>
                <a class="btn btn-secondary" href="/account/recovery">Забули пароль?</a>
            </form>
        </div>
    </div>
</div>

