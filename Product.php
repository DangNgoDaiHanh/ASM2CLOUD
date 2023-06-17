<?php
namespace ProductSpace;
class Product{
    public $pNo;
    public $pName;
    public $pPrice;
    public $pStatus;
    public $pCat;
}

    const VAT = 0.1;
    public function __construct($name, $value)
    {
        $this ->pNo =$pNo;
        $this ->pName =$pName;
        $this ->pPrice =$pPrice;
    }
    public function total(): float{
        
        return $this->pPrice
        +$this->pPrice*$this::VAT;
    }
class Stock{
    public $pName;
    public $pQuantity;
    public function __set($nameproperty, $valueofproperty)
    {
        this->$nameproperty = $valueofproperty;
    }
    public function __get($nameproperty)
    {
        echo $this->$nameproperty;
    }
    function printName(): string{
        return $this->pName;
    }
}



    // $p1 = new Product('P001', 'Iphone14', 799);
    // echo $p1->total();


//         $this->pNo = array();
//         echo "this is construct";
//         echo"<br>";
//     }
// }
// $p1 = new Product();
// var_dump(is_null($p1->pNo));
// echo "<br>";
// var_dump(isset($p1->pNo));
// echo "<br>";
// var_dump(empty($p1->pNo));
// echo "<br>";
// var_dump($p1 instanceof Product);
?>