<?php
//inclue as classes necessarias
include_once ("modelo/ConnectionFactory.class.php");
include_once ("modelo/Livro.class.php");
include_once ("modelo/Menu.class.php");

class LivroDAO{
    //ira receber uma conexao
    public $con = null;
    
    //construtor
    public function LivroDAO(){
        $conexao = new ConnectionFactory();
        //cria um new PDO e faz a conexao
        $this->con = $conexao->getConnection();
    }
    //realiza um inserção
    public function Up($id)
	{
		        try{
                $stmt = $this->con->query("SELECT * FROM livros WHERE id=".$id);

            foreach ($stmt as $reg){
                $cont = new Livro();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
                $cont->setAutor($reg["autor"]);
                $cont->setCategoria($reg["categoria"]);
				$cont->setDescricao($reg["descricao"]);
				
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
	}
	public function Down($id)
	{
		
	}
    public function inserir($livro){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO livros (nome, autor, categoria, descricao, arquivo) VALUES (:nome, :autor, :categoria, :descricao, :arquivo)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":nome", $livro->getNome());
            $stmt->bindValue(":autor", $livro->getAutor());
			$stmt->bindValue(":categoria", $livro->getCategoria());
			$stmt->bindValue(":descricao", $livro->getDescricao());
            $stmt->bindValue(":arquivo", $livro->getArquivo());
			
            //executo a query preparada
            
            $stmt->execute();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
            
            
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
        public function InserirMenu($livro){
        try{
            //evitando SQL INJECTION
            //dois pontos significa rotulo, armazena o local onde vai inserir as informações
            $stmt = $this->con->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
            
            //sequencia de indices que representam cada valor de minha query
            //bindValue = vincular valor
            $stmt->bindValue(":nome", $livro->getNome());
			
            //executo a query preparada
            
            $stmt->execute();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
            
            
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //realiza um update
    public function alterar($livro){
        try{
            $stmt = $this->con->prepare("UPDATE livros SET nome=:nome, autor=:autor, categoria=:categoria, descricao=:descricao, arquivo=:arquivo WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":nome", $livro->getNome());
            $stmt->bindValue(":autor", $livro->getAutor());
			$stmt->bindValue(":categoria", $livro->getCategoria());
			$stmt->bindValue(":descricao", $livro->getDescricao());
			$stmt->bindValue(":arquivo", $livro->getArquivo());
            $stmt->bindValue(":id", $livro->getId());
            
            $stmt->execute();
            
            $this->con->commit();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
        public function AlterarMenus($livro){
        try{
            $stmt = $this->con->prepare("UPDATE categorias SET nome=:nome WHERE id=:id");
            //beginTransation - transação para que toda a ação seja completada
            $this->con->beginTransaction();
            
            $stmt->bindValue(":nome", $livro->getNome());
            $stmt->bindValue(":id", $livro->getId());
            
            $stmt->execute();
            
            $this->con->commit();
            
            //fecho a conexao
            //$this->con = null;
            //caso ocorra um erro, retorna o erro;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //remove um registro
    public function excluir ($id){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM livros WHERE id=".$id);
            
            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
	    public function excluirmenu ($id){
        try{
            //$this->con-exec = retorno de linhas afetadas
            $num = $this->con->exec("DELETE FROM categorias WHERE id=".$id);
            
            if($num >= 1){
                return $num;
            }else{
                return 0;
            }
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
        }
    }
    //jquery recebe num significa que não quero filtrar a resposta
    //se fosse passar sql - executo a sql
    //query é uma consulta/retorno de um result set
    public function listar($query=null){
        try{
            if($query == null){
                $stmt = $this->con->query("SELECT * FROM livros");
            }else{
                $stmt = $this->con->con->query($query);
            }
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Livro();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
                $cont->setAutor($reg["autor"]);
				$cont->setCategoria($reg["categoria"]);
                $cont->setArquivo($reg["arquivo"]);
				
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	    public function ListarMenus($query=null){
        try{
            if($query == null){
                $stmt = $this->con->query("SELECT * FROM categorias");
            }else{
                $stmt = $this->con->con->query($query);
            }
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Menu();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
				
                
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	public function ListarCategoria($query=null){
        try{
            if($query == null){
                $stmt = $this->con->query("SELECT * FROM livros");
            }else{
                $stmt = $this->con->query($query);
            }
            //desconecta
            //$this->con = null;
            //gera um array de objetos
            $lista = array();
            
            foreach ($stmt as $reg){
                $cont = new Livro();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
                $cont->setAutor($reg["autor"]);
				$cont->setCategoria($reg["categoria"]);
				$cont->setArquivo($reg["arquivo"]);
                
                $lista[] = $cont;
            }
            
            //retorna o resultado da query
            return $lista;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
    public function exibir($id){
        try{
                $stmt = $this->con->query("SELECT * FROM livros WHERE id=".$id);

            foreach ($stmt as $reg){
                $cont = new Livro();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
                $cont->setAutor($reg["autor"]);
                $cont->setCategoria($reg["categoria"]);
				$cont->setDescricao($reg["descricao"]);
				$cont->setArquivo($reg["arquivo"]);
				
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
	    public function ExibirMenu($id){
        try{
                $stmt = $this->con->query("SELECT * FROM categorias WHERE id=".$id);

            foreach ($stmt as $reg){
                $cont = new Livro();
                $cont->setId($reg["id"]);
                $cont->setNome($reg["nome"]);
				
                $exibe[] = $cont;
            }
            
            //retorna o resultado da query
            return $exibe;
        }catch(PDOException $ex){
            echo "Erro:".$ex->getMessage();
            }
    }
}