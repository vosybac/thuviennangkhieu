<?php include '../view/header.php'; ?>
<main>
  
    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        <div id="left_column">
            <?php include '../view/sidebar.php'; ?>      
        </div>
        <div id="right_column">
              <h1><?php echo htmlspecialchars($category_name); ?></h1>
        <div class="card">
        <?php foreach ($products as $product) : ?>
            <?php
                // Parse data
                $category_id = $product['categoryid'];
                $product_code = $product['productcode'];
               

                // Get image URL and alternate text
                $image_filename = $product_code . '_m.png';
                $image_path = $app_path_base . 'images/' . $image_filename;
                $image_alt = 'Image filename: ' . $image_filename;
            ?>
           
                <img class="card-img-top" src="<?php echo $image_path; ?>"
                            alt="<?php echo $image_alt; ?>" />
              
                <div class="card-body">
                     <h5 class="card-title"><?php echo htmlspecialchars($category_name); ?></h5>
                      <p class="card-text"><?php echo htmlspecialchars($product['productname']); ?></p>
                    <a class="btn btn-primary" href="<?php echo '?product_id=' . $product['productid']; ?>">Xem
                    </a>
                </div>
            
        <?php endforeach; ?>
        </div>
        </div>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>