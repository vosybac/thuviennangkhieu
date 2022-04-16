<?php include '../view/header.php'; ?>
<?php include '../view/sidebar.php'; ?>
<main>
    <h1><?php echo htmlspecialchars($category_name); ?></h1>
    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        <?php foreach ($products as $product) : ?>
        <p>

            <?php
                // Parse data
                $category_id = $product['categoryid'];
                $product_code = $product['productcode'];
               

                // Get image URL and alternate text
                $image_filename = $product_code . '_m.png';
                $image_path = $app_path_base . 'images/' . $image_filename;
                $image_alt = 'Image filename: ' . $image_filename;
            ?>
            <h1><?php echo htmlspecialchars($product_name); ?></h1>
            <div id="left_column"  class="row cart-item-row" >
                <div class="col-md-6">
                    <p ><img src="<?php echo $image_path; ?>"
                            alt="<?php echo $image_alt; ?>" /></p>
                </div>
                 <div class="col-md-4">
                    <a  href="<?php echo '?product_id=' . $product['productid']; ?>">
                    <?php echo htmlspecialchars($product['productname']); ?>
                    </a>
                </div>
            </div>

            
        </p>
        <?php endforeach; ?>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>