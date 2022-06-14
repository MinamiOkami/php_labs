<?php
   class Rectangle
   {
       private $x;
       private $y;

       public function __construct(float $x, float $y)
       {
           $this->x = $x;
           $this->y = $y;
       }

       public function calculateSquare(): float
       {
           return $this->x * $this->y;
       }

       public function class()
        {
            echo "My class is " , get_class($this) , "\n";
        }
   }
   
   class Square
   {
       private $x;

       public function __construct(float $x)
       {
           $this->x = $x;
       }

       public function notCalculateSquare()
        {
            echo 'Объект класса ' .get_class($this).' не реализует интерфейс CalculateSquare.';
        }
   }

   $Rectangle1 = new Rectangle(5, 7);
   echo $Rectangle1->calculateSquare(). '<br>';
   echo $Rectangle1->class(). '<br>';

   $Square1 = new Square(3, 4);
    echo $Square1 -> notCalculateSquare();
?>