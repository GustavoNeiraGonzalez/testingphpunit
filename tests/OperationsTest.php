<?php
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase{
    private $op;

    //funcion de phpunit para inicializar objetos que requeriremos 
    //en los tests donde new Testing indica el archivo de src Testing
    public function setUp():void{
        $this->op = new Testing();
    }
    //--------- 
    //aqui la funcion de phpunit assertEquals busca que el valor sea 7
    //despues de la coma se busca la funcion sum que creamos anteriormente
    //la cual sumara valores
    public function testSumWithTwoValues(){
        $this->assertEquals(7, $this->op->sum(24,5));
    }
}
?>