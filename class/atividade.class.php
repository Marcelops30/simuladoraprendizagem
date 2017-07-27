<?php
/**
 * Description of Atividade.class.php
 *
 * @author MARCELO
 */
class Atividade {
    protected $tabela = 'tbl_atividade';
    private $nome;
    private $tempo;
    private $pontuacao;
    private $imagem;
        
    function __construct( $nome, $tempo, $pontuacao, $imagem) {
        $this->nome = $nome;
        $this->tempo = $tempo;
        $this->pontuacao = $pontuacao;
        $this->imagem = $imagem;
    }
    
    public function __set($atrib, $value) {
        $this->$atrib = $value;
    }
    
    public function __get($atrib) {
        return $this->$atrib ;
    }
    
    public function adicionar(){
        $sql = "INSERT INTO $this->table (nome_asm, tempo_asm, pontuacao_asm, imagem_asm)"
                . "VALUES (:nome, :tempo, :pontuacao, :imagem)";
        
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':tempo', $this->tempo);
        $stmt->bindParam (':pontuacao', $this->pontuacao);
        $stmt->bindParam (':imagem', $this->imagem);
        return $stmt->execute();
    }
    
    public function atualizar($id) {
        $sql = "UPDATE $this->table SET nome_asm = :nome,
                                         tempo_asm = :tempo,
                                         pontuacao_asm = :pontuacao,
                                         imagem_asm = :imagem
                                         WHERE $this->id =:id";
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':tempo', $this->tempo);
        $stmt->bindParam (':pontuacao', $this->pontuacao);
        $stmt->bindParam (':imagem', $this->imagem);
        $stmt->bindParam (':id', $id);
        return $stmt->execute();
    }
    
   public function procurar($id){ // Procurar
		$sql = "SELECT * FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute ();
		return $stmt->fetch ();
	}
	public function listarTodos(){ //listar
		$sql = "SELECT * FROM $this->table";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}
}