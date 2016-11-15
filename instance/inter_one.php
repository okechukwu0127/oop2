<?php
/* */
interface inter_one
{	

const value1="I am from interface one";
	
public function func1();

public function func2();	
	
	
}

interface inter_two
{
	
	const value2="I am from insterface two";

	public function func3();
	
	public function func4();
	
}
abstract class abst_const_picker implements inter_one, inter_two
{
	
	
}



interface inter_three 
{
	
	const value3="I am from interface three";	
	
	
}


class InterClass extends abst_const_picker implements inter_three
{
	const value1="Interface constant 1";
	/*const value1="Interface constant 1";
	const value2="Interface constant 2";
	const value3="Interface constant 3";*/
	/* */
	
	
	const value4="Interface Class constant 4";
	
	
	
	
	
	public function func1()
	{
	
	return "i am function 1 interface 1<br>".InterClass::value1."<br><br>".inter_one::value1;
		
	}
	
	
	public function func2()
	{
	 return "i am function 2 interface 1";	
		
	}
	
	public function func3()
	{
		
	 return "i am function 3 interface 2";	
	}
	
	public function func4()
	{
		
	 return "i am function 4 interface 2";	
	}
	
	
	
	
}


$obj= new InterClass;

//echo $obj->$value1;

echo $obj->func1();




/*




interface inter1 {

    const interface1 = "I am from interface 1";

    function foo1();

    function bar1();
}

interface inter2 extends inter1 {

    function foo2();

    function bar2();
}

interface inter3 {

    function foo3();

    function bar3();
}

interface inter4 {

    function foo4();

    function bar4();
}

abstract class AbsClass implements inter2 {
   
}

class Test extends AbsClass implements inter3, inter4 {

    const interface1 = "I am from test class";

    public function foo1() {
       
    }

    public function foo2() {
       
    }

    public function foo3() {
       
    }

    public function foo4() {
       
    }

    public function bar1() {
       
    }

    public function bar2() {
       
    }

    public function bar3() {
       
    }

    public function bar4() {
       
    }

    public function display() {
        echo inter1::interface1;
        echo PHP_EOL;
        echo Test::interface1;
    }

}

$Obj = new Test();
$Obj->display(); //I am from interface 1 \n I am from test class
*/
?>