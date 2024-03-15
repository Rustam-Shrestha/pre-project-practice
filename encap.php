<?php

class Encap{
    public function Encap($a, $b){
        echo $b."haha0 ".$a;
    }
    private $name;
    public function setData($n){
        $this->name = $n;
    }
    public function getData(){
        echo "name is:".$this->name;
    }

}
$enc = new Encap();
$enc->setData("Rustam");
$enc->setData("rustam", "asdf");
$enc->getData();


?>