<div class="container">
    <h1 class="mt-4 mb-3">Реєстрація</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/register" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="email">E-mail:</label>
                        <input id="email" type="text" class="form-control" name="email"/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="nickname">Ім'я:</label>
                        <input id="nickname" type="text" class="form-control" name="nickname"/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="login">Логін:</label>
                        <input id="login" type="text" class="form-control" name="login"/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="password">Пароль</label>
                        <input id="password"  type="password" class="form-control" name="password"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Реєстрація</button>
            </form>
        </div>
    </div>
</div>