<?php

include_once 'Wallet.php';
include_once 'DB.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

class ApiWallet {
    public function getFundsDB(){
        $db = new DB();
        $query = $db->connect()->query("SELECT * FROM wallet");
        return $query ;
    }
    public function actualFunds(){
        $getfunds = $this->getFundsDB();
        while ($row = $getfunds->fetch(PDO::FETCH_ASSOC)){    
            $item= $row['funds'];       
            $fundsBase['funds'] = $item;
        }
        return $fundsBase['funds'] ;
    }
    public function insertAddFunds($funds){
        
        $actualFunds = $this->actualFunds();
        $db = new DB();
        $wallet = new Wallet($actualFunds);
        $wallet->addFunds($funds['funds']);
        $actualFunds = $wallet->getFunds();
        $query = $db->connect()->prepare('UPDATE wallet SET funds = (:funds) WHERE ID= 1 ');
        $query->execute(['funds' => $actualFunds]);
        $actualFunds = $this->actualFunds();
        echo json_encode(array('mensaje' => 'Adicion realizada Correctamente' , 'actualFunds' => $actualFunds ));
        //$this->exito('Adicion realizada Correctamente');        
    }    
    public function insertReduceFunds($funds){
        $actualFunds = $this->actualFunds();        
        $db = new DB();
        $wallet = new Wallet($actualFunds);
        $wallet->reduceFunds($funds['funds']);
        $actualFunds = $wallet->getFunds();
        $query = $db->connect()->prepare('UPDATE wallet SET funds = (:funds) WHERE ID= 1 ');
        $query->execute(['funds' => $actualFunds]);                
        $actualFunds = $this->actualFunds();
        echo json_encode(array('mensaje' => 'Retiro realizado Correctamente' , 'actualFunds' => $actualFunds ));     
    }
    function exito($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }
    public function getAll(){
        
        $res = $this->getFundsDB();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item= $row['funds'];       
                $funds['funds'] = $item;
                //array_push($funds['fundss'], $item);
            }
        
            echo json_encode($funds);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }            
    }

    public function apiAddFunds($newFunds){
        
        $res = $this->getFundsDB();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item= $row['funds']             ;       
                $funds['funds'] = $item       ;
                //array_push($funds['fundss'], $item);
            }
            $wallet = new Wallet($item);            
            echo json_encode($funds);
        }
    }
}