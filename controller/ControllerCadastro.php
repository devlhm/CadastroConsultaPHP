<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/CadastroConsulta - PW PHP/app/model/cadastro.php");

class ControllerCadastro {
    private $cadastro;

    public function __construct() {
        $this->cadastro = new Cadastro();

        if (isset($_GET['funcao'])) {
            $funcao = $_GET['funcao'];

            switch($funcao) {
                case "inserir":
                    $this->inserir();
                    break;
                case "atualizar":
                    $this->atualizar($_GET['id']);
                    break;
            }
        }
    }

    private function inserir() {
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setTelefone($_POST['txtTelefone']);
        $this->cadastro->setOrigem($_POST['txtOrigem']);
        $this->cadastro->setDataContato(date('Y-m-d',strtotime($_POST['txtDataContato'])));
        $this->cadastro->setObservacao($_POST['txtObservacao']);
        $result = $this->cadastro->inserir();

        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }

    public function ler($id) {
        return $result = $this->cadastro->ler($id);
    }

    private function atualizar($id) {
        $this->cadastro->setId($id);
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setTelefone($_POST['txtTelefone']);
        $this->cadastro->setOrigem($_POST['txtOrigem']);
        $this->cadastro->setDataContato(date('Y-m-d',strtotime($_POST['txtDataContato'])));
        $this->cadastro->setObservacao($_POST['txtObservacao']);
        $result = $this->cadastro->atualizar();

        if($result >= 1){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../app/consultarClientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao atualizar registro!');</script>";
        }


    }

    public function deletar($id) {
        $this->cadastro->setId($id);

        $result = $this->cadastro->deletar();

        if($result >= 1){
            echo "<script>alert('Registro deletado com sucesso!');document.location='../app/consultarClientes.php'</script>";
        }else{
            echo "<script>alert('Erro ao deletar registro!');</script>";
        }
    }
}

new ControllerCadastro();
?>