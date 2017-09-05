<?php

    function get_user_info($userName){
        global $db;
        $query = 'SELECT * from User WHERE Username=:user';
        //prepare the query, bind the values, then you execute
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $userName);
        $statement->execute();
        $userInfo = $statement->fetchAll();
        $statement->closeCursor();

        return $userInfo;
    }

?>