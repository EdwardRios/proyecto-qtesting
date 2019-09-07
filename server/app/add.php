<?php

    include_once 'ApiWallet.php';
    
    $api = new ApiWallet();
    $nombre = '';
    $error = '';
    
    if(isset($_POST['funds'])){    
        
        $item = array(
            'funds' => $_POST['funds']            
        );        
            $api->insertAddFunds($item);     
            
    }else{
        
        //$api->error('Error al llamar a la API');
    }
    
?>