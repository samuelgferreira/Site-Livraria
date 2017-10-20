<?php
class ConnectionFactory{
    //recebe a conexao
    public $con = null;
    //qual o banco de dados?
    public $dbType = "mysql";
    //parametros de conexao
    //quando nao for necessario deixe em branco apenas com as aspas duplas""
    public $host ="localhost";
    public $user ="root";
    public $senha ="";
    public $db ="trabalho";
    //seta a persistencia da conexao
    public $persistente = false;

    //new ConnectionFactory(true) <--- conexao persistente
    //new ConnectionFactore() <--- conexao não persistente

    public function ConnectionFactory($persistente=false)
    {
        //verifico a persistencia da conexao
        if ($persistente != false) {
            $this->persistente = true;
        }
    }
     public function getConnection(){
            try{
                //realiza a conexao
                $this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db,
                $this->user, $this->senha, array(PDO::ATTR_PERSISTENT => $this->persistente,
                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

                //realizado com sucesso, retorna conectado
                return $this->con;
            }catch (PDOException $ex){ echo "Erro:".$ex->getMessage();}
        }
        //desconecta

        public function close(){
         if($this->con != null)
             $this->con = null;
        }
    }
