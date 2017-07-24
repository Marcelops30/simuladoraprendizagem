<?php
/**
 * Description of Item
 *
 * @author MARCELO
 */
class Item {
        protected $tabela = 'tbl_item_atividade';
	private $nome_ias;
	private $seguencia_ias;
        
	function __construct($nome, $seguencia) {
		$this->nome = $nome;
		$this->seguencia = $seguencia;
	}
        
	public function __set($atrib, $value){
			$this->atrib = $value;
	}
	
	public function __get($atrib){
			return $this->atrib;
	}
	
        public function adicionar(){
        $sql = "INSERT INTO $this->tabela (nome_ias, seguencia_ias)"
                . "VALUES (:nome, :seguencia)";
        
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':seguencia', $this->seguencia);
        return $stmt->execute();
    }
    
    public function atualizar($id){
        $sql = "UPDATE $this->tabela SET nome_ias = :nome,
                                         seguencia_ias = :seguencia
                                         WHERE $this->id =:id";
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':seguencia', $this->seguencia);
        $stmt->bindParam (':id', $id);
        return $stmt->execute();
    }
    
   public function findUnit($id){ // Procurar
		$sql = "SELECT * FROM $this->tabela WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute ();
		return $stmt->fetch ();
	}
	public function findAll(){ // Listar
		$sql = "SELECT * FROM $this->tabela";
		$stmt = DB::prepare ( $sql );
		$stmt->execute ();
		return $stmt->fetchAll ();
	}
	public function deletar($id) {
		$sql = "DELETE FROM $this->tabela WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		return $stmt->execute ();
	}
}
