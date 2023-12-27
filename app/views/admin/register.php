<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-login mx-auto mt-5">
            <div class="card-body">
                <form action="/admin/register" method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="email">E-mail:</label>
                            <input id="email" type="text" class="form-control" name="email"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="nickname">Ім'я:</label>
                            <input id="nickname" type="text" class="form-control" name="nickname"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="login">Логін:</label>
                            <input id="login" type="text" class="form-control" name="login"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label for="password">Пароль:</label>
                            <input id="password" type="password" class="form-control" name="password"/>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Реєстрація</button>
                </form>
            </div>
        </div>
    </div>
</div>