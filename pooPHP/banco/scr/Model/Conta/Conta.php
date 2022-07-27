<?php

namespace Alura\Banco\Model\Conta;



class Conta 
{
    private Cliente $cliente;
    private float $saldo;

    public function __construct(Cliente $cliente)
    {   
        $this->cliente=$cliente;
        $this->saldo=0;
    }
    public function getNome(){
        return $this->cliente->getNome();
    }

    public function getCpf(){
        return $this->cliente->getCpf();
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