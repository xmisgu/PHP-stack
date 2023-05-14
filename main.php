<?php
    class Stack{
        private $m_array;
        private $m_stackLimit;

        public function __construct($limit = 10){
            $this->m_stackLimit = $limit;
            $this->m_array = array();
        }

        public function pop(){
            if($this->isEmpty()) throw new Exception("Stack is empty!");

            $popValue = $this->m_array[0];
            array_splice($this->m_array, 0, 1);
            return $popValue;
        }


        public function push($value){
            if($this->isFull()) throw new Exception("Stack is full!");

            array_unshift($this->m_array, $value);
        }

        public function isEmpty(){
            return !$this->m_array;
        }

        public function isFull(){
            if(count($this->m_array) >= $this->m_stackLimit) return True;
            return False;
        }

        public function getSize(){
            return $this->m_stackLimit;
        }

        public function printStack(){
            if($this->isEmpty()) echo "Empty";

            foreach ($this->m_array as $arrElement){
                echo $arrElement, " ";
            }
        }
    }

    $stack = new Stack();
    while(True){
        echo "\nStack:\n";
        echo "  1. Push\n";
        echo "  2. Pop\n";
        echo "  3. Print\n";
        echo "  4. Wyjdz\n";
        $choice =  readline("Wybor: ");

        switch ($choice){
            case 1:
                $newValue =  readline("Wartosc do wpisania w stos (int): ");
                try {
                    $stack->push($newValue);
                } catch (Exception $e) {
                    echo $e, "\n";
                }
                break;

            case 2:
                try {
                    echo $stack->pop();
                } catch (Exception $e) {
                    echo $e, "\n";
                }
                break;

            case 3:
                echo $stack->printStack();
                break;

            case 4:
                break 2;

            default:
                echo "Nieprawidlowy wybor\n";
        }


    }

?>
