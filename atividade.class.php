<?php
/**
 * Description of Atividade
 *
 * @author MARCELO
 */
public class Atividade {
    private $id_asm;
    private $nome_asm;
    private $tempo_asm;
    private $pontuacao_asm;
    private $imagem_asm;
    
    public function __construct(){
    
    }
    
    public function __construct($nome_asm, $tempo_asm, $pontuacao_asm, $imagem_asm){
        $this->nome_asm = $nome_asm;
        $this->tempo_asm = $tempo_asm;
        $this->pontuacao_asm = $pontuacao_asm;
        $this->imagem_asm = $imagem_asm;
    }
    
    public function __construct($id){
        $this->id = $id;
    }
    
   public function __set($atrib, $value){
        $this->$atrib = $value;
    }
    
    public function __get(atrib){
        return $this->$atrib;
    }
}
