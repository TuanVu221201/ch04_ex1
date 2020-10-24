<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $name = filter_input(INPUT_POST, 'name');
    if($name == null){
        $error = "Invalid category data. Check all fields and try again.";
        include ('./error.phpp');
    }
    else{
        require_once ('./database.php');
        
        $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $name);
        $statement->execute();
        $statement->closeCursor();
        include ('./category_list.php');
    }
?>

