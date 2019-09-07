<?php

include_once 'Wallet.php';
include_once 'DB.php';

class ApiWallet {


    public function getFundsDB(){
        $db = new DB();
        $query = $db->connect()->query("SELECT * FROM wallet");
        return $query ;
    }
    public function insertAddFunds($funds){
        $getfunds = $this->getFundsDB();
        while ($row = $getfunds->fetch(PDO::FETCH_ASSOC)){    
            $item= $row['funds'];       
            $fundsBase['funds'] = $item;
        }
        $db = new DB();
        $wallet = new Wallet($fundsBase['funds']);
        $wallet->addFunds($funds['funds']);
        $actualFunds = $wallet->getFunds();
        $query = $db->connect()->prepare('UPDATE wallet SET funds = (:funds) WHERE ID= 1 ');
        $query->execute(['funds' => $actualFunds]);
        $this->exito('Adicion realizada Correctamente');        
    }
    public function insertReduceFunds($funds){
        $getfunds = $this->getFundsDB();
        while ($row = $getfunds->fetch(PDO::FETCH_ASSOC)){    
            $item= $row['funds'];       
            $fundsBase['funds'] = $item;
        }
        $db = new DB();
        $wallet = new Wallet($fundsBase['funds']);
        $wallet->reduceFunds($funds['funds']);
        $actualFunds = $wallet->getFunds();
        $query = $db->connect()->prepare('UPDATE wallet SET funds = (:funds) WHERE ID= 1 ');
        $query->execute(['funds' => $actualFunds]);
        $this->exito('Retiro realizado Correctamente');        
    }
    function exito($mensaje){
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; 
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