<?php

/**
 * Description of Atividade.class.php
 *
 * @author MARCELO
 */
class Atividade {
    private $id_asm;
    private $nome_asm;
    private $tempo_asm;
    private $pontuacao_asm;
    private $imagem_asm;
    
 /*  function __construct(){
        $this->id_asm = "";
        $this->nome_asm = "";
        $this->tempo_asm = "";
        $this->pontuacao_asm = "";
        $this->imagem_asm = "";
    }*/
           
    function __construct($id_asm, $nome_asm, $tempo_asm, $pontuacao_asm, $imagem_asm) {
        $this->id_asm = $id_asm;
        $this->nome_asm = $nome_asm;
        $this->tempo_asm = $tempo_asm;
        $this->pontuacao_asm = $pontuacao_asm;
        $this->imagem_asm = $imagem_asm;
    }
    
    function getId_asm() {
        return $this->id_asm;
    }

    function getNome_asm() {
        return $this->nome_asm;
    }

    function getTempo_asm() {
        return $this->tempo_asm;
    }

    function getPontuacao_asm() {
        return $this->pontuacao_asm;
    }

    function getImagem_asm() {
        return $this->imagem_asm;
    }

    function setId_asm($id_asm) {
        $this->id_asm = $id_asm;
    }

    function setNome_asm($nome_asm) {
        $this->nome_asm = $nome_asm;
    }

    function setTempo_asm($tempo_asm) {
        $this->tempo_asm = $tempo_asm;
    }

    function setPontuacao_asm($pontuacao_asm) {
        $this->pontuacao_asm = $pontuacao_asm;
    }

    function setImagem_asm($imagem_asm) {
        $this->imagem_asm = $imagem_asm;
    }



}
