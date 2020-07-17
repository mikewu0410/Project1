<?php
class Father{
    //不需建立物件可以直接使用
    static $static_value = "static";
    //需要建立物件，但是在類別以外也可以用
    public $public_value = "public";
    //只有這個類別才能使用
    private $private_value = "private";
    //只有這個類別和子類別才能使用
    protected $protected_value = "protected";
    function __get($name)
    {
        return $this->$name;
    }
    function __set($name,$value)
    {
        $this->$name=$value;
    }
    //private 變數只能在類別內的函數使用
    function getprivate(){
          return $this->private_value;
    }
}
  // static 變數不需建立物件可以直接使用
  echo Father::$static_value."<br>";
  //建立後可以直接呼叫 public 變數讓類別外的函數使用
  $testFather = new Father();
  echo $testFather->public_value."<br>";
  //使用protected變數的繼承特性之前，必須先建立子類別來繼承父類別
  class son extends Father{
        function __construct(){
              //可直接從父類別取得變數
              echo $this->protected_value."子類別<br>";
        }
        function testextend(){
              return  $this->protected_value."來自testextend";
        }
  }
  //當子物件被建立時會直接從父類別取得變數，下面是兩種不同的做法
  $testSon = new son();
  echo $testSon->testextend()."<br>";
  //private 變數只能在類別內的函數使用，不能像 public 變數直接使用也無法被繼承
  // echo $testFather->private_value; 這行會失敗
  echo $testFather->getprivate()."<br>";
  echo $testSon->protected_value."<br>";
  echo $testFather->private_value;