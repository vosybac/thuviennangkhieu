<?php include '../../view/header_admin.php'; ?>
<main>
    <h1>Thông tin đơn hàng.</h1>
    <p>Số đơn hàng: <?php echo $order_id; ?></p>
    <p>Ngày tạo đơn: <?php echo $order_date; ?></p>
    <p>Khách hàng: <?php echo htmlspecialchars($name) . ' (' . 
            htmlspecialchars($email) . ')'; ?></p>
    <h2>Chuyển đến</h2>
    <?php if ($order['shipdate'] === NULL) : ?>
        <p>Ngày đặt chuyển: vẫn chưa chuyển</p>
        <form action="." method="post" >
            <input type="hidden" name="action" value="set_ship_date">
            <input type="hidden" name="order_id"
                   value="<?php echo $order_id; ?>">
            <input type="submit" value="Ship Order">
        </form>
        <form action="." method="post" >
            <input type="hidden" name="action" value="confirm_delete">
            <input type="hidden" name="order_id"
                   value="<?php echo $order_id; ?>">
            <input type="submit" value="Delete Order">
        </form>

    <?php else:
        $ship_date = date('M j, Y', strtotime($order['shipdate']));
        ?>
        <p>Ship Date: <?php echo $ship_date; ?></p>
    <?php endif; ?>
    <p><?php echo htmlspecialchars($ship_line1); ?><br>
        <?php if ( strlen($ship_line2) > 0 ) : ?>
            <?php echo htmlspecialchars($ship_line2); ?><br>
        <?php endif; ?>
        <?php echo htmlspecialchars($ship_city); ?>, <?php 
              echo htmlspecialchars($ship_state); ?>
        <?php echo htmlspecialchars($ship_zip); ?><br>
        <?php echo htmlspecialchars($ship_phone); ?>
    </p>
    <h2>Thanh toán</h2>
    <p>Số CARD: <?php echo htmlspecialchars($card_number) . ' (' . 
            htmlspecialchars($card_name) . ')'; ?></p>
    <p>Ngày hết hạn: <?php echo htmlspecialchars($card_expires); ?></p>
    <p><?php echo htmlspecialchars($bill_line1); ?><br>
        <?php if ( strlen($bill_line2) > 0 ) : ?>
            <?php echo htmlspecialchars($bill_line2); ?><br>
        <?php endif; ?>
        <?php echo htmlspecialchars($bill_city); ?>, <?php 
              echo htmlspecialchars($bill_state); ?>
        <?php echo htmlspecialchars($bill_zip); ?><br>
        <?php echo htmlspecialchars($bill_phone); ?>
    </p>
    <h2>Mặt hàng</h2>
    <table id="cart">
        <tr id="cart_header">
            <th class="left">Mặt hàng</th>
            <th class="right">Giá</th>
            <th class="right">Khuyến Mãi</th>
            <th class="right">Chi phí</th>
            <th class="right">Số lượng</th>
            <th class="right">Tổng cộng</th>
        </tr>
        <?php
        $subtotal = 0;
        foreach ($order_items as $item) :
            $product_id = $item['productid'];
            $product = get_product($product_id);
            $item_name = $product['productname'];
            $list_price = $item['itemprice'];
            $savings = $item['discountamount'];
            $your_cost = $list_price - $savings;
            $quantity = $item['quantity'];
            $line_total = $your_cost * $quantity;
            $subtotal += $line_total;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item_name); ?></td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $list_price); ?>
                </td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $savings); ?>
                </td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $your_cost); ?>
                </td>
                <td class="right">
                    <?php echo $quantity; ?>
                </td>
                <td class="right">
                    <?php echo sprintf('%.2f VND', $line_total); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer">
            <td colspan="5" class="right">Subtotal:</td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="right">
                <?php echo htmlspecialchars($ship_state); ?> Tax:
            </td>
            <td class="right">
                <?php echo sprintf('%.2f VND', $order['taxamount']); ?>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="right">Shipping:</td>
            <td class="right">
                <?php echo sprintf('$%.2f', $order['shipamount']); ?>
            </td>
        </tr>
            <tr>
            <td colspan="5" class="right">Total:</td>
            <td class="right">
                <?php
                    $total = $subtotal + $order['taxamount'] +
                             $order['shipamount'];
                    echo sprintf('%.2f VND', $total);
                ?>
            </td>
        </tr>
</table>
</main>
<?php include '../../view/footer_admin.php'; ?>