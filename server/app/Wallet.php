<?php

namespace App;

class Wallet {
    private $funds;
    public function __construct($funds){
        if($funds < 0){
            $this->funds = 0 ;    
        }else{
            $this->funds = $funds;            
        }
    }

    public function getFunds(){
        return $this->funds ;
    }

    public function addFunds($funds){
        if($funds > 0 )
            $this->funds += $funds;
    }
    public function reduceFunds($funds){        
        if ($funds > 0 )  
            if ($this->getFunds() >= $funds)
                $this->funds -= $funds;
    }
    
}


/*$test = new Wallet(2);
$test->addFunds(600);
echo $test->getFunds();
echo "\n";*/