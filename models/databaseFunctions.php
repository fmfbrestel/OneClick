<?php

    function get_user_info($userName){
        global $db;
        $query = 'SELECT * from User WHERE Username=:user';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $userName);
        $statement->execute();
        $userInfo = $statement->fetch();
        $statement->closeCursor();

        return $userInfo;
    }
    
    function get_all_products(){
        global $db;
        $query = 'SELECT * from Products';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();

        return $products;
    }
    
    function get_prod_info($prodID){
        global $db;
        $query = 'SELECT * from Products WHERE ProductID=:ProdID';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':ProdID', $prodID);
        $statement->execute();
        $prodInfo = $statement->fetch();
        $statement->closeCursor();

        return $prodInfo;
    }
    
    function get_prod_image($prodID){
        global $db;
        $query = 'SELECT Image from Products WHERE ProductID=:ProdID';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':ProdID', $prodID);
        $statement->execute();
        $prodImage = $statement->fetch();
        $statement->closeCursor();

        return $prodImage;
    }
    
    function get_purchase_relation($prodID){
        global $db;
        $query = 'SELECT * from PurchaseRelate WHERE PurchID=:prodID';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':prodID', $prodID);
        $statement->execute();
        $purchRelate = $statement->fetch();
        $statement->closeCursor();

        return $purchRelate;
    }
    
    function get_view_relation($prodID){
        global $db;
        $query = 'SELECT * from ViewRelate WHERE ViewID=:prodID';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':prodID', $prodID);
        $statement->execute();
        $viewRelate = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        arsort($viewRelate);

        return $viewRelate;
    }
    
    function update_purchase_relation($purchID, $purchHist){
        foreach($purchHist as $relate){
            if($relate != $purchID){
               global $db;
                $sql = "UPDATE PurchaseRelate SET $relate=$relate+1 WHERE ProdID=:prodID";
                $statement = $db->prepare($sql);
                $statement->bindValue(':prodID', $purchID);
                $statement->execute(); 
            }
            
        }
    }
    
    function update_view_relation($purchID, $purchHist){
        foreach($purchHist as $relate){
            if($relate != $purchID){
               global $db;
                $sql = "UPDATE ViewRelate SET $purchID=$purchID+1 WHERE ViewID=:relate";
                $statement = $db->prepare($sql);
                $statement->bindValue(':relate', $relate);
                $statement->execute(); 
            }
            
        }
    }
    
    // gets the users hashed password from the database
    function get_user_password($Username){
        global $db;
        
        $query = 'SELECT UserPassword
                  FROM Member
                  WHERE Username = :userName';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $Username);
        $statement->execute();
        
        $userPassword = $statement->fetch();
        $statement->closeCursor();
        
        return $userPassword[0];
    }
    
    // checks to see if the password entered by the user matches the one in the database
   function validate_entered_password($hashedPassword, $plaintext_password){
       
       $is_valid = password_verify($plaintext_password, $hashedPassword);
       
       if ($is_valid) {
           return true;           
        }
        else{
            return false;
        }
   }
   function check_userName($userName) {
        global $db;

        $query = 'SELECT * FROM member WHERE Username = :userName';

        $statment = $db->prepare($query);
        $statment->bindValue(':userName', $userName);
        $statment->execute();
        $exists = $statment->fetch();
        $statment->closeCursor();

        if ($exists) {
            $value = true;
        } else {
            $value = false;
        }

        return $value;
    }
    
    // starts a new session and adds the user currently logged in
   function new_user_session($userName){
        global $db;
        
        $query = 'SELECT Username, FirstName, LastName, Email, UserPassword, DefaultPayment
                  FROM member
                  WHERE Username = :userName';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $userInfo = $statement->fetch();
        $statement->closeCursor();
        
        $_SESSION['userInfo'] = array("firstName" => $userInfo['FirstName'], "lastName" => $userInfo['LastName'], 
                  "email" => $userInfo['Email'], "userName" => $userInfo['Username'], "password" => $userInfo['UserPassword'], "defaultPayment" => $userInfo['DefaultPayment']);
        
        
   }

?>