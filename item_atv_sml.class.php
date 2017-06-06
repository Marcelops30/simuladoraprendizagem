<?php
/**
 * Description of Item
 *
 * @author MARCELO
 */
class Item {
    private $nome_ias;
    private $seguencia_ias;
    
    function __construct( $nome_ias, $seguencia_ias){
        $this->nome_ias = $nome_ias;
        $this->seguencia_ias = $seguencia_ias;
    }
    
    public function __set($atrib, $value){
        $this->$atrib = $value;
    }
    
    public function __get(atrib){
        return $this->$atrib;
    }

}
