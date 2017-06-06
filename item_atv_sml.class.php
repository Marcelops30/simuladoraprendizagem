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
    

    function getNome_ias() {
        return $this->nome_ias;
    }

    function getSeguencia_ias() {
        return $this->seguencia_ias;
    }

    function setNome_ias($nome_ias) {
        $this->nome_ias = $nome_ias;
    }

    function setSeguencia_ias($seguencia_ias) {
        $this->seguencia_ias = $seguencia_ias;
    }
}
