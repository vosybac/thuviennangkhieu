<aside>
    <h2>Liên kết</h2>
    <ul>
        <li>
            <a href="<?php echo $app_path . 'cart'; ?>">Xem giỏ hàng</a>
        </li>
            <?php
            // Check if user is logged in and
            // display appropriate account links
            $account_url = $app_path . 'account';
            $logout_url = $account_url . '?action=logout';
            if (isset($_SESSION['user'])) :
            ?>
                <li><a href="<?php echo $account_url; ?>">Tài khoản của tôi</a></li>
                <li><a href="<?php echo $logout_url; ?>">Đăng xuất</a>
            <?php else: ?>
                <li><a href="<?php echo $account_url; ?>">Đăng nhập</a></li>
            <?php endif; ?>
        <li>
            <a href="<?php echo $app_path; ?>">Trang chủ</a>
        </li>
    </ul>
        
    <h2>Danh mục:</h2>
    <ul>
        <!-- display links for all categories -->
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['categoryName'];
                $id = $category['categoryid'];
                $url = ltrim($app_path,"/web") . 'catalog?category_id=' . $id;
        ?>
        <li>
            <a href="<?php echo $url; ?>">
               <?php echo htmlspecialchars($name); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Liên kết</h2>
    <ul>
        <li>
            <!-- This link is for testing only.
                 Remove it from a production application. -->
            <a href="<?php echo $app_path; ?>admin">Trang quản trị</a>
        </li>        
    </ul>
</aside>
