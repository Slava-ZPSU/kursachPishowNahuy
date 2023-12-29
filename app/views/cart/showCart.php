<div class="container mt-5">
    <h2>Товари в кошику</h2>
    <?php if (!empty($products)): ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Постер</th>
                <th scope="col">Назва</th>
                <th scope="col">Ціна</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <th><img src="<?php echo $product[0]['image']; ?>" alt="Poster" style="height: 100px; width: 50px;"></th>
                    <td><?php echo $product[0]['name']; ?></td>
                    <td><?php echo $product[0]['price']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Кошик порожній</p>
    <?php endif; ?>
</div>