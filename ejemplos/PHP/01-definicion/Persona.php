<?php
class Persona{
    private $nombre;

    public function inicializar($name){
        $this->nombre = $name;  //Siempre se usa this porque hace refencia a los atributos de clase
    }

    public function mostrar(){
        echo '<p>'.$this->nombre.'</p>'; }
}
?>  