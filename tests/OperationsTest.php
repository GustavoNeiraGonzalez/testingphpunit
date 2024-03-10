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
        $this->assertEquals(7, $this->op->sum(5,2), 'La suma de dos valores debe devolver valores numericos');
    }
    //Verificar suma con valores nulos (solo a modo de prueba, realmente no 
    //se necesita que los valores sean nulos en una suma)
    //por lo que se debe arreglar dentro de la funcion suma para mandar una excepcion

    /*
    public function testSumWithNullValues(){
        $this->assertEquals(NULL, $this->op->sum(NULL, NULL));
    }
    */
    // esta funcion sirve para validar un error en especifico en este caso
    // invalidargument, que se refiere a que no es un valor numerico el cual
    // se espera en esta suma recordar que esta excecion se usa en los ifs dentro
    // de la funcion suma, por ejemplo si no validas que sean null o string no 
    // dara la excepción
    public function testSumWithNullValuesException(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum(NULL,NULL);
    }
    //aqui modifique la funcion suma para que verifique los strings tambien 
    public function testSumWithNotNumericValuesException(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->sum('a','hello');
    }
}
?>
