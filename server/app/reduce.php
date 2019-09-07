<?php

    include_once 'ApiWallet.php';
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");    
    $api = new ApiWallet();
    $nombre = '';
    $error = '';
    
    if(isset($_POST['funds'])){    
        
        $item = array(
            'funds' => $_POST['funds']            
        );        
            $api->insertReduceFunds($item);     
            
    }else{
        
        //$api->error('Error al llamar a la API');
    }
    
?>