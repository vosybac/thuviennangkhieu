<?php include '../view/header.php'; ?>

<div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <?php include '../view/sidebar.php'; ?>      
</div>

<main>
  <div class="home container">
  <div class="row">
  <div class="col-md-9 pt-5">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">

    <?php if (count($products) == 0) : ?>
        <p>There are no products in this category.</p>
    <?php else: ?>
        
        
        
        <div class="col mb-4">
              <h1><?php echo htmlspecialchars($category_name); ?></h1>
        
        

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
            
            <div class="card">
            
           
                <img class="card-img-top" src="<?php echo $image_path; ?>"
                            alt="<?php echo $image_alt; ?>" />
              
                <div class="card-body">
                     <h5 class="card-title"><?php echo htmlspecialchars($category_name); ?></h5>
                      <p class="card-text"><?php echo htmlspecialchars($product['productname']); ?></p>
                    <a class="btn btn-primary" href="<?php echo '?product_id=' . $product['productid']; ?>">Xem
                    </a>
                </div>
            </div>

            
            
        <?php endforeach; ?>
        
        
        </div>
    <?php endif; ?>

</div>
</div>
</div>
</div>
</main>
<?php include '../view/footer.php'; ?>