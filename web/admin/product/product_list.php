<?php include '../../view/header_admin.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<main>
    <h1 class="top">Product Manager - List Products</h1>
    <p>To view, edit, or delete a product, select the product.</p>
    <p>To add a product, select the "Add Product" link.</p>
    <?php if (count($products) == 0) : ?>
        <p>There are no products for this category.</p>
    <?php else : ?>
        <h1>
            <?php echo htmlspecialchars($current_category['categoryname']); ?>
        </h1>
            <?php foreach ($products as $product) : ?>
            <p>
                <a href="?action=view_product&amp;product_id=<?php
                          echo $product['productid']; ?>">
                    <?php echo htmlspecialchars($product['productname']); ?>
                </a>
            </p>
            <?php endforeach; ?>
    <?php endif; ?>

    <h1>Links</h1>
    <p><a href="index.php?action=show_add_edit_form">Add Product</a></p>

</main>
<?php include '../../view/footer.php'; ?>