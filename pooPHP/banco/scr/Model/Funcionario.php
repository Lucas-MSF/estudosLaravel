<?php 
namespace Alura\Banco\Model;

use Alura\Banco\Model\Pessoa;

class Funcionario extends Pessoa{
    
    private string $cargo;

    public function __construct(string $cpf, string $nome, string $cargo)
    {
        parent::__construct($cpf,$nome);
        $this->cargo=$cargo;
    }
    
    public function getCargo(){
        return $this->cargo;
    }

}