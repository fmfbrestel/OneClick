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
    
    function get_purchase_relation($prodID){
        global $db;
        $query = 'SELECT * from PurchRelate WHERE prodID=:prodID';
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
        $query = 'UPDATE * from PurchRelate WHERE prodID=:prodID';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':prodID', $prodID);
        $statement->execute();
        $viewRelate = $statement->fetch();
        $statement->closeCursor();

        return $viewRelate;
    }
    
    function update_purchase_relation($prodID){
        global $db;
        
    }

?>