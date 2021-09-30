<?php
date_default_timezone_set('America/Sao_Paulo');

define('BD_SERVIDOR', 'localhost');
define('BD_USUARIO', 'root');
define('BD_SENHA', '');
define('BD_BANCO', 'projetoweb');

class Banco {
    protected $mysqli;

    public function __construct()
    {
        $this->conexao();
    }

    private function conexao() {
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function inserirAgendamentos($nome, $telefone, $origem, $data_contato, $observacao) {
        $stmt = $this->mysqli->prepare("INSERT INTO agendamentos (`nome`, `telefone`, `origem`, `data_contato`, `observacao`) VALUES (?,?,?,?,?);");
        $stmt->bind_param("sssss",$nome,$telefone,$origem,$data_contato,$observacao);
        if($stmt->execute() == TRUE) return true;
        else return false;
    }

    public function lerAgendamentos($id) {
        try {
            if($id > 0) {
                $stmt = $this->mysqli->query("SELECT * FROM agendamentos WHERE id = '" . $id . "';");
            } else {
                $stmt = $this->mysqli->query("SELECT * FROM agendamentos;");
            }

            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            return $lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar todos: " . $e;
        }
    }

    public function atualizarAgendamentos($id, $nome, $telefone, $origem, $dataContato, $observacao) {
        $stmt = $this->mysqli->query("UPDATE agendamentos SET `nome` = '" . $nome . "', `telefone` =  '" . $telefone . "', `origem` =  '" . $origem . "', `data_contato` =  '" . $dataContato . "', `observacao` =   '" . $observacao . "' WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

    public function deletarAgendamentos($id) {
        $stmt = $this->mysqli->query("DELETE FROM agendamentos WHERE `id` = '".$id."';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }
}
?>