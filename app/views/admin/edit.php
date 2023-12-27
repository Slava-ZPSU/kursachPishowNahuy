<div class="content-wrapper">
    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Форма редагування товару</h2>
            <form>
                <div class="form-group">
                    <label for="productName">Назва товару:</label>
                    <input type="text" class="form-control" id="productName" value="<?php echo $product['name']; ?>" >
                </div>
                <div class="form-group">
                    <label for="productPrice">Ціна:</label>
                    <input type="text" class="form-control" id="productPrice" value="<?php echo $product['price']; ?>">
                </div>
                <div class="form-group">
                    <label for="productCategory">Категорія:</label>
                    <input type="text" class="form-control" id="productCategory" value="<?php echo $product['category']; ?>">
                </div>
                <div class="form-group">
                    <label for="productDeveloper">Розробник:</label>
                    <input type="text" class="form-control" id="productDeveloper" value="<?php echo $product['creator']; ?>">
                </div>
                <div class="form-group">
                    <label for="productPublisher">Видавець:</label>
                    <input type="text" class="form-control" id="productPublisher" value="<?php echo $product['publisher']; ?>">
                </div>
                <div class="form-group">
                    <label for="productDescription">Опис:</label>
                    <textarea class="form-control" id="productDescription" rows="3"><?php echo $product['description']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </form>
        </div>
    </div>
</div>