<?php

// Classe Usuario
// Autor: Pablo (modificada pelo professor glauco) 
// A classe Usuario é o modelo a ser seguido para construir as outras classes
class Usuario {
	protected $table = 'tb_usuarios'; // nome da tabela do banco de dados
	protected $id = 'usuario_id'; // atributo chave primária da tabela do banco de dados
	
	// atributos da classe de acordo com a tabela, não precisa usar os mesmos nomes da tabela.
	private $nome;
	private $email;
	private $cpf;
	private $avatar;
	
	// métodos gets e sets
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}

	// métodos dos cruds
	public function adicionar() {
		$sql = "INSERT INTO $this->table (nome,email,cpf,avatar)
			VALUES    (:nome, :email, :cpf, :avatar)";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome);
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':avatar', $this->avatar );
		return $stmt->execute();
	}
	public function atualizar($id) {
		$sql = "UPDATE $this->table SET nome = :nome,
			email = :email, cpf=:cpf, avatar = :avatar WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':nome', $this->nome );
		$stmt->bindParam ( ':email', $this->email );
		$stmt->bindParam ( ':cpf', $this->cpf );
		$stmt->bindParam ( ':avatar', $this->avatar );
		$stmt->bindParam ( ':id', $this->id );
		return $stmt->execute ();
	}
	public function procurar($id) {
		$sql = "SELECT * FROM $this->table WHERE $this->id = :id";
		$stmt = DB::prepare ( $sql );
		$stmt->bindParam ( ':id', $id, PDO::PARAM_INT );
		$stmt->execute ();
		return $stmt->fetch ();
	}
	public function listarTodos() {
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

// Classe Atividades do simulador
// Autor: Marcelo
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

// classe Componente curricular
// Autor: 
class ComponenteCurricular {
	private $id_ccr;
	private $nome_ccr;
	private $cargaHoraria_ccr;
	public function __construct() {
		$this->id_ccr = 0;
		$this->nome_ccr = "";
		$this->cargaHoraria_ccr = 0;
	}
	public function __construct($id_ccr, $nome_ccr, $cargaHoraria_ccr) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
		$this->cargaHoraria_ccr = $cargaHoraria_ccr;
	}
	public function __construct($id_ccr) {
		$this->id_ccr = $id_ccr;
	}
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
}

// Classe Competências Norteadoras
// Autor:
class CompetenciaNorteadora {
	private $idCnr;
	private $nomeCnr;
	public function getIdCnr() {
		return $this->idCnr;
	}
	public function getNomeCnr() {
		return $this->nomeCnr;
	}
	public function setIdCnr() {
		return $this->idCnr;
	}
	public function setNomeCnr() {
		return $this->nomeCnr;
	}
}

// Classe Curso
// Autor: 
class Curso {
	private $id_cur;
	private $nome_cur;
	public function __construct() {
		$this->id_cur = 0;
		$this->nome_cur = "";
	}
	public function __construct($id_cur, $nome_cur) {
		$this->id_cur = $id_cur;
		$this->nome_cur = $nome_cur;
	}
	public function __construct($id_cur) {
		$this->id_cur = $id_cur;
	}
	public function __set($atrib, $value) {
		$this->$atrib = $value;
	}
	public function __get($atrib) {
		return $this->$atrib;
	}
}


// Classe Item
// Autor: Marcelo
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
        $sql = "INSERT INTO $this->table (nome_ias, seguencia_ias)"
                . "VALUES (:nome, :seguencia)";
        
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':seguencia', $this->seguencia);
        return $stmt->execute();
    }
    
    public function atualizar($id){
        $sql = "UPDATE $this->table SET nome_ias = :nome,
                                         seguencia_ias = :seguencia
                                         WHERE $this->id =:id";
        $stmt = DB::prepare ($sql);
        $stmt->bindParam (':nome', $this->nome);
        $stmt->bindParam (':seguencia', $this->seguencia);
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
	public function listarTodos(){ // Listar
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

// Classe Perfil
class Perfil {
	
		private $table = 'tb_perfil';
		private $id = 'perfil_id';
		private $descricao;
	
		public function __set($atrib, $value){
			$this->atrib = $value;
		}
	
		public function __get($atrib){
			return $this->atrib;
		}
	
		public function __construct(){
			$this->descricao = "";
		}
	
		public function  __construct($descricao){
			$this->descricao = $descricao;
		}
	
		public function adicionar() {
	          $sql = "INSERT INTO $this->table (descricao)
			VALUES    (:descricao)";
	          $stmt = DB::prepare ( $sql );
	          $stmt->bindParam ( ':descricao', $this->__get ( $descricao ) );
	          return $stmt->execute ();
        }
	
		public function atualizar($id){
			$sql  = "UPDATE $this->table SET descricao = :descricao WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':descricao', $this->__get($descricao));
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
	
		public function procurar($id){
			$sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
		}
	
		public function listarTodos(){
			$sql  = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	
		public function deletar($id){
			$sql  = "DELETE FROM $this->table WHERE $this->id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
	}

// Classe Realizar Ciclo
// Autor
class RealizarCiclo {
		private $idRcc;
		private $pontuacaoAlcancadaRcc;
	
		public function getIdRcc(){
			return $this->idRcc;
		}
	
		public function getPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}
	
	
		public function setIdRcc(){
			return $this->idRcc;
		}
	
		public function setPontuacaoAlcancadaRcc(){
			return $this->pontuacaoAlcancadaRcc;
		}
}	

// Classe Usuario
// Autor: 
class Usuario {
		
			protected $table = 'tb_usuarios';
			protected $id = 'usuario_id';
			private $nome;
			private $email;
			private $cpf;
			private $avatar;
		
			public function __set($atrib, $value){
				$this->$atrib = $value;
			}
		
			public function __get($atrib){
				return $this->$atrib;
			}
		
			public function __construct($nome, $email, $cpf, $avatar){
				$this->nome = $nome;
				$this->email = $email;
				$this->cpf = $cpf;
				$this->avatar = $avatar;
			}
			 
			public function adicionar(){
				$sql  = "INSERT INTO $this->table (nome,email,cpf,avatar)
				VALUES    (:nome, :email, :cpf, :avatar)";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':nome', $this->__get($nome));
				$stmt->bindParam(':email', $this->__get($mail));
				$stmt->bindParam(':cpf', $this->__get($cpf));
				$stmt->bindParam(':avatar', $this->__get($avatar));
				return $stmt->execute();
		
			}
		
			public function atualizar($id){
				$sql  = "UPDATE $this->table SET nome = :nome,
				email = :email
				cpf = :cpf
				avatar = :avatar
				WHERE $this->id = :id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':nome', $this->__get($nome));
				$stmt->bindParam(':email', $this->__get($mail));
				$stmt->bindParam(':cpf', $this->__get($cpf));
				$stmt->bindParam(':avatar', $this->__get($avatar));
				$stmt->bindParam(':id', $id);
				return $stmt->execute();
		
			}
		
			public function procurar($id){
				$sql  = "SELECT * FROM $this->table WHERE $this->id = :id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();
				return $stmt->fetch();
			}
		
			public function listarTodos(){
				$sql  = "SELECT * FROM $this->table";
				$stmt = DB::prepare($sql);
				$stmt->execute();
				return $stmt->fetchAll();
			}
		
			public function deletar($id){
				$sql  = "DELETE FROM $this->table WHERE $this->id = :id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				return $stmt->execute();
			}
		
		
}
