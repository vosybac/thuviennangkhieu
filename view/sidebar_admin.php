<aside>
    <h2>Liên kết</h2>
    <ul>
        <li>
        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'admin/account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['admin'])) :
        ?>
            <a href="<?php echo $logout_url; ?>">Đăng xuất</a>
        <?php else: ?>
            <a href="<?php echo $account_url; ?>">Đăng nhập</a>
        <?php endif; ?>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>">Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo $app_path; ?>admin">Trang quản  trị</a>
        </li>
    </ul>
    
    <?php if (isset($categories)) : ?>
    <!-- display links for all categories -->
    <h2>Danh mục</h2>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo $app_path .
                'admin/product?action=list_products' .
                '&amp;category_id=' . $category['categoryID']; ?>">
                <?php echo htmlspecialchars($category['categoryName']); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</aside>
