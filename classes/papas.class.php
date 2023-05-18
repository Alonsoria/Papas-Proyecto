<?php
    class Papas implements JsonSerializable{

        private $tamaño;
        private $P_ingrediente;
        private $S_ingrediente;
        private $catsup;
        private $quesoAm;
        private $buffalo;
        private $ranch;
        private $chipotle;
        private $bbq;

        function __construct($tam, $P_ing, $S_ing, $cats, $queAm, $buff, $ran, $chipo, $barbe){
            $this -> tamaño = $tam;
            $this -> P_ingrediente = $P_ing;
            $this -> S_ingrediente = $S_ing;
            $this -> catsup = $cats;
            $this -> quesoAm = $queAm;
            $this -> buffalo = $buff;
            $this -> ranch = $ran;
            $this -> chipotle = $chipo;
            $this -> bbq = $barbe;
        }

        function getPapas(){
                    echo "<tr>";
                    echo "<td>$this->tamaño</td>";
                    echo "<td>$this->P_ingrediente</td>";
                    echo "<td>$this->S_ingrediente</td>";
                    echo "<td>$this->catsup</td>";
                    echo "<td>$this->quesoAm</td>";
                    echo "<td>$this->buffalo</td>";
                    echo "<td>$this->ranch</td>";
                    echo "<td>$this->chipotle</td>";
                    echo "<td>$this->bbq</td>";
                    echo "</tr>";
                }
        function jsonSerialize(){
            return get_object_vars($this);
        }
    }
?>