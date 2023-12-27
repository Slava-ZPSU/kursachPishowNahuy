<div class="content-wrapper">
    <div class="container-fluid">
        <div class="container mt-5">
            <h2 class="mb-4">Додавання товару</h2>
            <form action="/admin/add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Постер:</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="displayImage(this)">
                    <p class="help-block"></p>
                    <img id="selected-image" src="<?php echo $product['image']; ?>" alt="Selected Image" hidden="hidden">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="name">Назва:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="price">Ціна:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="creator">Розробник:</label>
                    <input type="text" class="form-control" id="creator" name="creator" required>
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="publisher">Видавець:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" required>
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="category">Категорія:</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label for="description">Опис:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    <p class="help-block"></p>
                </div>

                <button type="submit" class="btn btn-primary">Додати товар</button>
                <p class="help-block"></p>
            </form>
        </div>
    </div>
</div>