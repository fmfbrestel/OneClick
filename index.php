<?php
    require_once('models/database.php');
    require_once('models/databaseFunctions.php');
    session_start();
    
    $action = filter_input(INPUT_POST, 'action');
    
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'mississippi';
        }
    }
    
    switch ($action) {
        case 'mississippi':
            if(!isset($_SESSION['products'])){
                $_SESSION['products'] = get_all_products();
            }
            include('./views/Mississippi.php');
            break;
        case 'save_mississippi':
            if(!isset($_SESSION['products'])){
                $_SESSION['products'] = get_all_products();
                $prodID = filter_input(INPUT_POST, 'product');
                update_view_relation($prodID, $_SESSION['Views']);
            }
            
            include('./views/Mississippi.php');
            break;
        case 'login':
            $error_message = '';
            $userName = '';
            $password = '';
            include('./views/login.php');
            break;
        case 'login-validation':
            $userName = filter_input(INPUT_POST, 'login_username');
            $password = filter_input(INPUT_POST, 'login_password');

            if (!isset($userName)) {
                $userName = '';
                $username_error_message = 'Please enter a username';
            }
            if (!isset($password)) {
                $password = '';
                $password_error_message = 'Please enter a password';
            }
            if ($userName == '' || $password == ''){
                include ('./views/login.php');
                break;
            }
            $userName_exists = check_userName($userName);

            if ($userName_exists == false) {
                $password = '';
                $password_error_message = '';
                $username_error_message = "That username doesn\'t exist";
                include ('./views/login.php');
                break;
            }
            //$hashedPassword = get_user_password($userName);
            $isValidPassword = validate_entered_password(get_user_password($userName), $password);

            if ($isValidPassword) {
                new_user_session($userName);
                //$firstName = $_SESSION['userInfo']['firstName'];
                //$lastName = $_SESSION['userInfo']['lastName'];
                //$email = $_SESSION['userInfo']['email'];
                //$profileImage = $_SESSION['userInfo']['profileImage'];
                include ('./views/Mississippi.php');
                break;
            } else {
                $password_error_message = 'The password you entered is incorrect. Try again.';
                $password = '';
                include ('./views/login.php');
                break;
            }
        case 'view_product':
            $prodID = filter_input(INPUT_GET, 'product');
            $prodInfo = get_prod_info($prodID);
            if(!isset($_SESSION['Views'])){
               $_SESSION['Views'] = array($prodID);
            } else {
                array_push($_SESSION['Views'], $prodID);
            }
            $purchRelates = get_purchase_relation($prodID);
            $viewRelates = get_view_relation($prodID);
            array_shift($viewRelates);
            $viewRelates = array_slice($viewRelates, 0, 3, $preserve_keys = TRUE);
            include('./views/product.php');
            break;
        case 'one_click':
            $prodID = filter_input(INPUT_POST, 'product');
            update_view_relation($prodID, $_SESSION['Views']);
            include ('./views/order_confirmation.php');
            break;
        case 'cart_checkout':
            break;
            
    }
?>
