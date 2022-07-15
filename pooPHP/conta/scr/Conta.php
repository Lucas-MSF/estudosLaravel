<?php

class Conta
{
    private string $cpf;
    private string $nome;
    private float $saldo;

    public function __construct(string $cpf, string $nome)
    {   
        $this->cpf=$cpf;
        $this->nome=$nome;
        $this->saldo=0;
    }
    public function getCpf()
    {
        return $this->cpf;;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function depositarSaldo($deposito)
    {
        if($deposito>0)
        {
            $this->saldo+=$deposito;
            return true;
        }
        
        return false;
        
    }
    public function sacarSaldo($saque)
    {
        if($this->saldo>=$saque)
        {
            $this->saldo-=$saque;
            return true;
        }
        
        return false;
        
    }

    public function transferir($valor, Conta $contaTranferencia)
    {
        if($valor<$this->saldo)
        {
            $this->sacarSaldo($valor);
            $contaTranferencia->depositarSaldo($valor);
            return true;
        }
        
        return false;
        
    }
    

}