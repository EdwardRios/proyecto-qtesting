<?php

use PHPUnit\Framework\TestCase;
use App\Wallet;

class WalletTest extends TestCase{
    public function testWalletInitial(){

        $wallet = new Wallet(0);

        $expected = 0 ; 

        $this->assertEquals($expected , $wallet->getFunds());
    }
    public function testWalletAddFunds(){

        $wallet = new Wallet(0);
        $wallet->addFunds(200);
        $expected = 200 ; 

        $this->assertEquals($expected,$wallet->getFunds());
    }
    public function testWalletReduceFunds(){

        $wallet = new Wallet(200);
        $wallet->reduceFunds(200);
        $expected = 0 ; 

        $this->assertEquals($expected , $wallet->getFunds());
    }
    public function testWalletAddFundsNegativeNumber(){

        $wallet = new Wallet(0);
        $wallet->addFunds(-200);
        $expected = 0 ; 

        $this->assertEquals($expected , $wallet->getFunds());
    }
    public function testWalletReduceFundsNegativeNumber(){

        $wallet = new Wallet(0);
        $wallet->reduceFunds(-200);    
        $expected = 0 ; 

        $this->assertEquals($expected , $wallet->getFunds());
    }


}