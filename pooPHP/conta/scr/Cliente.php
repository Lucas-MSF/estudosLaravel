<?php 

class Cliente{
    private string $cpf;
    private string $nome;

    public function __construct(string $cpf, string $nome)
    {
        $this->cpf=$cpf;
        $this->nome=$nome;
    }
    public function getCpf(){
        return  $this->cpf;
    }
    public function getNome(){
        return $this->nome;
    }
}