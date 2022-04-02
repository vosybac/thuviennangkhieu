<?php
function is_valid_customer_email($email) {
    global $db;
    $query = '
        SELECT customerid FROM customers
        WHERE emailaddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function is_valid_customer_login($email, $password) {
    global $db;
    $password = sha1($email . $password);
    $query = '
        SELECT * FROM customers
        WHERE emailaddress = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers WHERE customerid = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_customer_by_email($email) {
    global $db;
    $query = 'SELECT * FROM customers WHERE emailaddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function customer_change_shipping_id($customer_id, $address_id) {
    global $db;
    $query = 'UPDATE customers SET shipaddressid = :address_id
              WHERE customerid = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

function customer_change_billing_id($customer_id, $address_id) {
    global $db;
    $query = 'UPDATE customers SET billingAddressid = :address_id
              WHERE customerid = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_customer($email, $first_name, $last_name,
                      $password_1) {
    global $db;
    $password = sha1($email . $password_1);
    $query = '
        INSERT INTO customers (emailaddress, password, firstname, lastname)
        VALUES (:email, :password, :first_name, :last_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $customer_id = $db->lastInsertId();
    $statement->closeCursor();
    return $customer_id;
}

function update_customer($customer_id, $email, $first_name, $last_name,
                      $password_1, $password_2) {
    global $db;
    $query = '
        UPDATE customers
        SET emailaddress = :email,
            firstname = :first_name,
            lastname = :last_name
        WHERE customerid = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();

    if (!empty($password_1) && !empty($password_2)) {
        $password = sha1($email . $password_1);
        $query = '
            UPDATE customers
            SET password = :password
            WHERE customerid = :customer_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>