<?php include '../../view/header_admin.php'; ?>
<?php include '../../view/sidebar_admin.php'; ?>
<main>
    <h1>Đơn hàng chờ vận chuyển.</h1>
    <?php if (count($new_orders) > 0 ) : ?>
        <ul>
            <?php foreach($new_orders as $order) :
                $order_id = $order['orderid'];
                $order_date = strtotime($order['orderdate']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path_base . 'admin/orders' .
                       '?action=view_order&amp;order_id=' . $order_id;
                ?>
                <li>
                    <a href="<?php echo $url; ?>">Order # 
                    <?php echo $order_id; ?></a> for
                    <?php echo $order['firstname'] . ' ' .
                               $order['lastname']; ?> placed on
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có đơn hàng nào chưa chuyển.</p>
    <?php endif; ?>
    <h1>Đơn hàng đã chuyển.</h1>
    <?php if (count($old_orders) > 0 ) : ?>
        <ul>
            <?php foreach($old_orders as $order) :
                $order_id = $order['orderid'];
                $order_date = strtotime($order['orderdate']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path_base . 'admin/orders' .
                       '?action=view_order&amp;order_id=' . $order_id;
                ?>
                <li>
                    <a href="<?php echo $url; ?>">Order #
                    <?php echo $order_id; ?></a> for
                    <?php echo htmlspecialchars($order['firstname']) . ' ' .
                               htmlspecialchars($order['lastname']); ?> placed on
                    <?php echo $order_date; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có đơn hàng nào đã chuyển.</p>
    <?php endif; ?>
</main>
<?php include '../../view/footer_admin.php'; ?>