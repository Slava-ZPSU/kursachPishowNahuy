<div class="content-wrapper">
    <div class="container-fluid">
        <div class="container mt-5">
            <h2 class="mb-4">Форма редагування товару</h2>
            <form action="/admin/edit/<?php echo $product['id']?>" method="post">
                <div class="form-group">
                    <label for="name">Назва:</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $product['name']?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="price">Ціна:</label>
                    <input type="number" class="form-control" id="price" name="price" required value="<?php echo $product['price']?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="creator">Розробник:</label>
                    <input type="text" class="form-control" id="creator" name="creator" required value="<?php echo $product['creator']?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="publisher">Видавець:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" required value="<?php echo $product['publisher']?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="category">Категорія:</label>
                    <input type="text" class="form-control" id="category" name="category" required value="<?php echo $product['category']?>">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="description">Опис:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $product['description']?></textarea>
                    <p class="help-block"></p>
                </div>

                <button type="submit" class="btn btn-primary">Редагувати товар</button>
                <p class="help-block"></p>
            </form>
        </div>
    </div>
</div>