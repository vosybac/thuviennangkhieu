<?php
    // Parse data
    $category_id = $product['categoryid'];
    $product_code = $product['productcode'];
    $product_name = $product['productname'];
    $description = $product['description'];
    $list_price = $product['listprice'];
    $discount_percent = $product['discountpercent'];

    // Add HMTL tags to the description
    $description_with_tags = add_tags($description);

    // Calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100), 2);
    $unit_price = $list_price - $discount_amount;

    // Format discounts
    $discount_percent_f = number_format($discount_percent, 0);
    $discount_amount_f = number_format($discount_amount, 2);
    $unit_price_f = number_format($unit_price, 2);

    // Get image URL and alternate text
    $image_filename = $product_code . '_m.png';
    $image_path = $app_path_base . 'images/' . $image_filename;
    $image_alt = 'Image filename: ' . $image_filename;
?>
<h1><?php echo htmlspecialchars($product_name); ?></h1>
<div id="left_column">
    <p><img src="<?php echo $image_path; ?>"
            alt="<?php echo $image_alt; ?>" /></p>
</div>

<div id="right_column">
    <p><b>Giá niêm yết:</b>
        <?php echo  $list_price.'VND' ; ?></p>
    <p><b>Phần trăm khuyến mãi:</b>
        <?php echo $discount_percent_f . '%'; ?></p>
    <p><b>Giá đơn vị:</b>
        <?php echo  $unit_price_f.'VND'; ?>
        (Bạn tiết kiệm được:
        <?php echo   $discount_amount_f.'VND'; ?>)</p>
    <form action="<?php echo $app_path . 'cart' ?>" method="get" 
          id="add_to_cart_form">
        <input type="hidden" name="action" value="add" />
        <input type="hidden" name="product_id"
               value="<?php echo $product_id; ?>" />
        <b>Số lượng:</b>&nbsp;
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" />
    </form>
    <h2>Mô tả:</h2>
    <?php echo $description_with_tags; ?>
</div>
