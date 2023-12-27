<div class="content-wrapper">
    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Редагування товарів</h2>
            <?php if(!empty($products)):?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Назва товару</th>
                        <th scope="col">Ціна</th>
                        <th scope="col">Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <th scope="row"><?php echo $product['id']; ?></th>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="/admin/edit/<?php echo $product['id']; ?>">
                                    Редагувати
                                </a>
                                <button type="button" class="btn btn-danger btn-sm">
                                    Видалити
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else:?>
                <p>Товарів немає</p>
            <?php endif; ?>
        </div>
    </div>
</div>