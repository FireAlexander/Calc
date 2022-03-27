<?php

// Search file in ./
function myAutoload($classname) {
    $filename = __DIR__ . '/' . str_replace('\\', '/',$classname) . '.php';
    include_once ($filename);
}

//register Loader
spl_autoload_register('myAutoload');

include_once ('./lib/send_post.php');


class Calc
{

    public function __construct(float $operand1, float $operand2, \calc_interface\math_operation $operation)
    {
        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
        $this->operation = $operation;
    }

    // Get Class name from "operaions" directory.
    public static function get_operations () {

        $array_operations = [];
        $dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./operations'));
        foreach ($dirs as $name => $file) {
            $ext = $file->getExtension();
            if (in_array($ext, ['php']) && !is_dir($file))
                $array_operations[] = pathinfo($name)['filename'];
                    }
        return $array_operations;
    }

    // return result
    public function result() {
        return $this->operation->operation($this->operand1, $this->operand2);
    }

}

/*$obj = new Calc();
$array_operations = $obj->get_operations();
echo $array_operations[0] . $array_operations[1];

foreach($array_operations as $classname) {
    $classname = "\operations\\" . $classname;
    $obj = new $classname();
    echo $obj->getName();
    echo $obj->operation(1,5);
}
*/

/*$array_operations = Calc::get_operations(); // list of operation from file name in "directory operations"

//initialize all operations class for loader
foreach ($array_operations as $index => $classname) {
    $classname = "\operations\\" . $classname;
    $obj = new $classname();
   } */


if(isset($_POST['submit'])) {
    //filing value
    $number1 = $_POST['First_number'];
    $number2 = $_POST['Second_number'];
    $operation = $_POST['operation'];

    //Are fields filed?
        //Are fields filed?
    if(empty($operation) || (empty($number1) && $number1 != '0') || (empty($number2) && $number2 != '0')) {
        $error_message = 'One or more fields are not filed';
    }
    else {
        //Are there number in the fields?
        if (!is_numeric($number1) || !is_numeric(($number2))) {
            $error_message = 'One or more operands are not number';
        }
    }
    if(isset($error_message)) {
        echo $error_message;
    } else{
        //Create object Calc
        $classname = "\operations\\" .$operation;
        $obj = new Calc($number1, $number2, new $classname() );
        $urlArray = parse_url($_SERVER['HTTP_REFERER']);
        $newUrl = $urlArray['scheme'].'://'.$urlArray['host'].$urlArray['path'];
        echo $newUrl;
        $array_operations = Calc::get_operations();
        $str_param = ""; // initialization
        foreach ($array_operations as $index => $classname) {
            $classname = "\operations\\" . $classname;
            $str_param .= "name" . $index . "=" . $classname::Name . "&operator" . $index . "=" . urlencode($classname::Operator) ;
            if (!($index == count($array_operations)-1)) // don't add "&" if last element in massive
                $str_param .= "&";
        }
        //echo 'Location: ' . $newUrl . "?" .  $str_param . '&Result=' . $obj->result();
        header("Location: " . $newUrl . "?" .  $str_param . '&Result=' . $obj->result() ); // Возвращаеся на станицу калькулятора и возвращаем результат
        exit;
    }

}

if (isset($_GET['loadoperator'])) {

    $array_operations = Calc::get_operations(); // list of operation from file name in "directory operations"

    $str_param = ""; // initialization
    //build string with GET parameters
    foreach ($array_operations as $index => $classname) {
        $classname = "\operations\\" . $classname;
        $obj = new $classname();
        $str_param .= "name" . $index . "=" . $classname::Name . "&operator" . $index . "=" . urlencode($classname::Operator) ;
        if (!($index == count($array_operations)-1)) // don't add "&" if last element in massive
            $str_param .= "&";
    }
    header("Location: /index2.php?" .$str_param);

}