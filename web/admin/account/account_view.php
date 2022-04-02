<?php 
include '../../view/header_admin.php';
include '../../view/sidebar_admin.php';
?>


<main>
    <h1>Administrator Accounts</h1>
    <?php if (isset($_SESSION['admin'])) : ?>
    <h2>My Account</h2>
    <p><?php echo $_SESSION['admin']['firstname'] . ' ' .
            $_SESSION['admin']['lastname'] .
            ' (' . $_SESSION['admin']['emailaddress'] . ')'; ?></p>
    <form action="." method="post">
        <input type="hidden" name="action" value="view_edit">
        <input type="hidden" name="admin_id" 
               value="<?php echo $_SESSION['admin']['adminid']; ?>">
        <input type="submit" value="Edit">
    </form>
    <?php endif; ?>
    <?php if ( count($admins) > 1 ) : ?>
        <h2>Other Administrators</h2>
        <table>
        <?php foreach($admins as $admin):
            if ($admin['adminid'] != $_SESSION['admin']['adminid']) : ?>
            <tr>
                <td><?php echo $admin['lastname'] . ', ' .
                           $admin['firstname']; ?>
                </td>
                <td>
                    <form action="." method="post" class="inline">
                        <input type="hidden" name="action"
                            value="view_edit">
                        <input type="hidden" name="admin_id"
                            value="<?php echo $admin['adminid']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                    <form action="." method="post" class="inline">
                        <input type="hidden" name="action"
                            value="view_delete_confirm">
                        <input type="hidden" name="admin_id"
                            value="<?php echo $admin['adminid']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <h2>Add an Administrator</h2>
    <form action="." method="post" id="add_admin_user_form">
        <input type="hidden" name="action" value="create">
        <label>E-Mail:</label>
        <input type="text" name="email"
               value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $email_message; ?></span>
        <?php echo $fields->getField('email')->getHTML(); ?><br>
        
        <label>First Name:</label>
        <input type="text" name="first_name"
               value="<?php echo htmlspecialchars($first_name); ?>">
        <?php echo $fields->getField('first_name')->getHTML(); ?><br>
        
        <label>Last Name:</label>
        <input type="text" name="last_name"
               value="<?php echo htmlspecialchars($last_name); ?>">
        <?php echo $fields->getField('last_name')->getHTML(); ?><br>
        
        <label>Password:</label>
        <input type="password" name="password_1">
        <span><?php echo htmlspecialchars($password_message); ?></span>
        <?php echo $fields->getField('password_1')->getHTML(); ?><br>
        
        <label>Retype password:</label>
        <input type="password" name="password_2">
        <?php echo $fields->getField('password_2')->getHTML(); ?><br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Admin User">
    </form>
</main>

<?php include '../../view/footer_admin.php'; ?>