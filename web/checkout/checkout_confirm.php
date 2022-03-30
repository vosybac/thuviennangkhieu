<?php include '../view/header.php'; ?>
<main>
    <h1>Xác nhận đơn hàng</h1>
    <table id="cart">
        <tr id="cart_header">
            <th class="left" >Mặt hàng</th>
            <th class="right">Giá</th>
            <th class="right">Số lượng</th>
            <th class="right">Tổng</th>
        </tr>
        <?php foreach ($cart as $product_id => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $item['unit_price']); ?>
                </td>
                <td class="right">
                    <?php echo $item['quantity']; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $item['line_price']); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer">
            <td colspan="3" class="right"><b>Tổng</b></td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right"><?php echo $state; ?> Thuế</td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $tax); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="right">Phí vận chuyển</td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $shipping_cost); ?>
            </td>
        </tr>
            <tr>
            <td colspan="3" class="right"><b>Tổng cuối</b></td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $total); ?>
            </td>
        </tr>
</table>
    <p>
        Thực hiện: <a href="<?php echo '?action=payment'; ?>">Thanh Toán</a>
    </p>
</main>
<?php include '../view/footer.php'; ?>