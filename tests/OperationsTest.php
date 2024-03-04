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
    //agregado mensaje en caso de error: "la suma de dos..." este mensaje se 
    //lanza si el error del test no pasa la prueba
    public function testSumWithTwoValues(){
        $this->assertEquals(7, $this->op->sum(2,NUll), 'La suma de dos valores debe devolver valores numericos');
    }
    //Verificar suma con valores nulos (no da error por valor nulo Y si esperas
    //un valor numerico dara error de numero no esperado, lo cual es erroneo,
    //y si esperas un valor nulo, dara un ok si das 2 valores nulos)
    //por lo que se debe arreglar dentro de la funcion sum

    public function testSumWithNullValues(){
        $this->assertEquals(NULL, $this->op->sum(NULL, NULL));
    }
    public function testSumWithNullValuesException(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum(NULL,NULL);

    }
}
?>
