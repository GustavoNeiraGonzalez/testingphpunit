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
        $testing = new Testing(); 
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

    public function testDivideWithTwoValues(){
        $this->assertEquals(3, $this->op->divide(6,2), 'La division de dos valores debe devolver valores numericos');
    }

    public function testDivideWithNullValuesException(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide(NULL,NULL);
    }
    public function testDivideWithNotNumericValuesException(){
        $this->expectException(InvalidArgumentException::class);
        $this->op->divide('a','hello');
    }
    public function testDivideByZero(){
        $this->expectException(DivisionByZeroError::class);
        $this->op->divide(0,5);
    }
    // --- data providers --- 
        /**
     * @dataProvider divisionDataProvider
     * @expectedException DivisionByZeroError

     */

    /*
    public function testDivideWithTwoValuesDataProvider($dividend, $divisor, $expected)
    {
        $result = $this->op->divide($dividend, $divisor);
        $this->assertEquals($expected, $result);
    }
    */

    /*public function divisionDataProvider()
    {
        return [
            [6, 2, 3], // División válida
            [10, 5, 2], // División válida
            //[0, 5, 0], // División por cero (debe devolver 0) }error esperado}
            [8, 0, DivisionByZeroError::class], // División por cero (debe lanzar una excepción)
            ['a', 'hello', InvalidArgumentException::class], // Valores no numéricos (debe lanzar una excepción)
        ];
    }
    */

    // ----------------------------------
    // aqui haremos pruebas usando mock para simular una bdd
    public function testGetUserFullNameWithMock()
    {
        // Creamos un mock para simular la base de datos
        $dbMock = $this->getMockBuilder(DatabaseInterface::class)
                       ->getMock();

        // Configuramos el mock para retornar un usuario ficticio
        $dbMock->expects($this->once())
               ->method('getUserById')
               ->with(1)
               ->willReturn(['first_name' => 'John', 'last_name' => 'Doe']);

        // Creamos una instancia de UserService utilizando el mock de la base de datos
        $userService = new TestingMockDB($dbMock);

        // Probamos la función getUserFullName
        $result = $userService->getUserFullName(1);

        // Verificamos que el resultado sea el esperado
        $this->assertEquals('John Doe', $result);
    }

}
?>
