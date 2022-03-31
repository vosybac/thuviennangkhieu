<?php
    // make sure the user is logged in as a valid administrator
    if (!isset($_SESSION['admin'])) {

        $admin_site = $doc_root . $app_path. 'admin/account/';

        header('Location: ' . $admin_site);
    }
?>
