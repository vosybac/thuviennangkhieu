<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<main class="nofloat">
    <h1>Sách chọn lọc</h1>
    <p>Dưới đây là một số sách chọn lọc và chúng tôi sẽ cập nhật những quyển sách chất lượng nhất dành cho bạn.
    </p>
    <table>
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['listprice'];
        $discount_percent = $product['discountpercent'];
        $description = $product['description'];
        
        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
        $description_with_tags = add_tags($description);
        $i = strpos($description_with_tags, "</p>");
        $first_paragraph = substr($description_with_tags, 3, $i-3);        
    ?>
        <tr>
            <td class="product_image_column" >
                <img src="images/<?php echo htmlspecialchars($product['productcode']); ?>_s.png"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <a href="catalog?product_id=<?php echo
                           $product['productid']; ?>">
                        <?php echo htmlspecialchars($product['productname']); ?>
                    </a>
                </p>
                <p>
                    <b>Giá:</b>
                    <?php echo number_format($unit_price, 2); ?> VND
                </p>
                <p>
                    <?php echo $first_paragraph; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</main>
<?php include 'view/footer.php'; ?>