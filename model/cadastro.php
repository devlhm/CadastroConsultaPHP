<?php
require_once("banco.php");

class Cadastro extends Banco {
    
    private $id;
    private $nome;
    private $telefone;
    private $origem;
    private $dataContato;
    private $observacao;

    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setOrigem($string){
        $this->origem = $string;
    }
    public function setDataContato($string){
        $this->data_contato = $string;
    }
    public function setObservacao($string){
        $this->observacao = $string;
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getOrigem(){
        return $this->origem;
    }
    public function getDataContato(){
        return $this->data_contato;
    }
    public function getObservacao(){
        return $this->observacao;
    }

    public function inserir() {
        return $this->inserirAgendamentos($this->getNome(), $this->getTelefone(), $this->getOrigem(), $this->getDataContato(), $this->getObservacao());
    }

    public function ler($id) {
        return $this->lerAgendamentos($id);
    }

    public function atualizar() {
        return $this->atualizarAgendamentos($this->getId(), $this->getNome(), $this->getTelefone(), $this->getOrigem(), $this->getDataContato(), $this->getObservacao());
    }

    public function deletar() {
        return $this->deletarAgendamentos($this->getId());
    }
}
?>