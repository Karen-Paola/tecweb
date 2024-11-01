<?php
class Cuerpo{
    private $lineas = NULL;

    public function __construct(){
        $this->lineas = array();
    }

    public function instertar_parrafo($line){
        $this->lineas[] = $line;
    }

    public function graficar(){
        for($i=0; $i<count($this->lineas); $i++){
            echo '<p>'.$this->lineas[$i].'</p>';
        }
    }
}
?>