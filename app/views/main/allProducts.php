<link href="/public/css/products.css" rel="stylesheet">
<h3>Page Store</h3>
<div class="container-fluid col-12">
    <?php if(!empty($products)):?>
        <div class="row">
            <?php foreach($products as $product): ?>
                <div class="card product-card  nb-3 col-12 col-md-6 col-lg-3">
                    <img class="product-image" src="<?php echo $product['image']; ?>" alt="Product Image">
                    <div class="product-title" data-toggle="tooltip" data-placement="top" title="Product Description">
                        <?php echo $product['name']; ?>
                    </div>
                    <div class="product-price"><?php echo $product['price']; ?> грн.</div>
                </div>
                <!-- Add more product cards as needed -->
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Товарів немає</p>
    <?php endif;?>
</div>
