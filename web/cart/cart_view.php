<?php include '../view/header.php'; ?>
<main>
    <h1>Giỏ hàng của bạn</h1>
    <?php if (cart_product_count() == 0) : ?>
        <p>Không có mặt hàng nào được chọn.</p>
    <?php else: ?>
        <p>Để xóa mặt hàng, để số lượng của mặt hàng đó bằng 0.</p>
        <form action="." method="post">
            <input type="hidden" name="action" value="update">
            <table id="cart">
            <tr id="cart_header">
                <th class="left">Mặt hàng</th>
                <th class="right">Giá</th>
                <th class="right">Số lượng</th>
                <th class="right">Tổng tiền</th>
            </tr>
            <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $item['unit_price']); ?>
                </td>
                <td class="right">
                    <input type="text" size="3" class="right"
                           name="items[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>">
                </td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $item['line_price']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" class="right" ><b>Tổng cộng</b></td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', cart_subtotal()); ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="right">
                    <input type="submit" value="Update Cart">
                </td>
            </tr>
            </table>
        </form>
        
    <?php endif; ?>

    <p>Về trang: <a href="../">Trang chủ</a></p>

    <!-- display most recent category -->
    <?php if (isset($_SESSION['last_category_id'])) :
            $category_url = '../catalog' .
                '?category_id=' . $_SESSION['last_category_id'];
        ?>
        <p>Về trang to: <a href="<?php echo $category_url; ?>">
            <?php echo $_SESSION['last_category_name']; ?></a></p>
    <?php endif; ?>

    <!-- if cart has items, display the Checkout link -->
    <?php if (cart_product_count() > 0) : ?>
        <p>
            Đến trang: <a href="../checkout">Checkout</a>
        </p>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>