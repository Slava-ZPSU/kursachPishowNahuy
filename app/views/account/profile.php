<div class="container">
    <h1 class="mt-4 mb-3">Профіль</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/profile" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="nickname">Ім'я:</label>
                        <input id="nickname" type="text" class="form-control" name="nickname" value="<?php echo $_SESSION['account']['nickname']; ?>"/>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="login">Логін:</label>
                        <input id="login" type="text" class="form-control" name="login" value="<?php echo $_SESSION['account']['login']; ?>" disabled/>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="email">Адреса електронної пошти:</label>
                        <input id="email" type="text" class="form-control" name="email" value="<?php echo $_SESSION['account']['email']; ?>"/>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="password">Новий пароль:</label>
                        <input id="password" type="password" class="form-control" name="password"/>
                        <p class="help-block"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Зберегти</button>
                <p class="help-block"></p>
            </form>
        </div>
    </div>
</div>