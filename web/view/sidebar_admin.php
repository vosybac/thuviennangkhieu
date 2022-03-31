<aside>
    <h2>Liên kết</h2>
    <ul>
        <li>
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path_base . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Đăng xuất</a>
        <?php else: ?>
            <a href="<?php echo $account_url; ?>">Đăng nhập</a>
        <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo $app_path_base; ?>">Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo $app_path_base; ?>admin">Trang quản  trị</a>
        </li>
    </ul>
    
    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <h2>Danh mục</h2>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo $app_path_base .
                'admin/product?action=list_products' .
                '&amp;category_id=' . $category['categoryid']; ?>">
                <?php echo htmlspecialchars($category['categoryname']); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</aside>
