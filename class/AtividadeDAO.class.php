<?php
    require './PdoConexao.class.php';
    require './atividade.class.php';
/**
 * Description of AtividadeDAO.class
 *
 * @author MARCELO
 */
class AtividadeDAO implements iDAOModeCrud {
    
    private $instanciaConexaoPdoAtiva;
    private $tabela;
    
    function __construct($instanciaConexaoPdoAtiva, $tabela) {
        $this->instanciaConexaoPdoAtiva = PdoConexao::getInstancia();
        $this->tabela = $tabela;
    }

    
    public function create($object) {
        $id_asm = $this->getId_asm();
        $nome_asm = $object->getNome_asm();
        $tempo_asm = $object->getTempo_asm();
        $pontuacao_asm = $object->getPonntuacao_asm();
        $imagem_asm = $object->getImagem_asm();
        
        $sqlStmt = "INSERT INTO{$this->tabela}(id, nome,tempo, pontuacao, imagem)"
        . "VALUE(:id, :nome, :tempo, :pontuacao, :imagem))";
        
    try {
        $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
        $operacao = bindValue(":id",$id_asm, PDO::PARAM_INT);
        $operacao = bindValue("nome", $nome_asm, PDO::PARAM_STR);
        $operacao = bindValue("tempo", $tempo_asm, PDO::PARAM_STR);
        $operacao = bindValue("pontuacao", $pontuacao_asm, PDO::PARAM_STR);
        $operacao = bindValue("imagem", $imagem_asm, PDO::PARAM_STR);
        if($operacao->execute()){
            if($operacao->rowCount()>0){
                $objeto->setId($id_asm);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }catch (PDOException $excecao) {
        echo $excecao->getMessage();
}
        
    }

    public function delete($id_asm) {
        $sqlStmt = "DELETE FROM {$this->tabela} WHERE ID=:id";
        try {
           $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
           $operacao-bindValue("id", $id_asm, PDO::PARAM_INT);
           if($operacao->execute()){
            if($operacao->rowCount()>0){
                $objeto->setId($id_asm);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
           
        } catch ( PDOException $excecao ) {
          echo $excecao->getMessage();
       }
    }

    public function read($id_asm) {
        $sqlStmt = "SELECT * FROM {$this->tabela} WHERE ID=:id";
        try {
          $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
          $operacao-bindValue("id", $id_asm, PDO::PARAM_INT);
          $operacao->execute();
          $getRow = $operacao->fetch(PDO::FETCH_OBJ);
          $nome_asm = $getRow->nome;
          $tempo_asm = $getRow->tempo;
          $pontuacao_asm = $getRow->pontuacao;
          $imagem_asm = $getRow->imagem;
          $ojeto = new Atividade($nome_asm, $tempo_asm, $pontuacao_asm, $imagem_asm);
          $objeto->setId($id_asm);
        } catch ( PDOException $excecao) {
            echo $excecao->getMessage();
        }
        
        
    }

    public function update($object) {
        $id_asm = $this->getId_asm();
        $nome_asm = $object->getNome_asm();
        $tempo_asm = $object->getTempo_asm();
        $pontuacao_asm = $object->getPonntuacao_asm();
        $imagem_asm = $object->getImagem_asm();
        $sqlStmt = "UPDATE {$this->tabela} SET NOME=:nome, TEMPO=:tempo, PONTUACAO=:pontuacao, IMAGEM=:imagem WHERE ID=:id";
           try {
          $operacao = $this->instanciaConexaoPdoAtiva->prepare($sqlStmt);
          $operacao->bindValue(":id", $id_asm, PDO::PARAM_INT);
          $operacao->bindValue(":nome", $nome_asm, PDO::PARAM_STR);
          $operacao->bindValue(":tempo", $tempo_asm, PDO::PARAM_STR);
          $operacao->bindValue(":pontuacao", $pontuacao_asm, PDO::PARAM_STR);
          $operacao->bindValue(":imagem", $imagem_asm, PDO::PARAM_STR);
          if($operacao->execute()){
             if($operacao->rowCount() > 0){
                return true;
             } else {
                return false;
             }
          } else {
             return false;
          }
       } catch ( PDOException $excecao ) {
          echo $excecao->getMessage();
       }
    }

    }
