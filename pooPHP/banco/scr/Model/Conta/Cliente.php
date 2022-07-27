<?php 

namespace Alura\Banco\Model\Conta;

use Alura\Banco\Model\Pessoa;
use Alura\Banco\Model\Endereco;

class Cliente extends Pessoa{
    
    private Endereco $endereco;

    public function __construct(string $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($cpf,$nome);
        $this->endereco=$endereco;
    }
   
    public function getEndereco(){
        return $this->endereco;
    }

}