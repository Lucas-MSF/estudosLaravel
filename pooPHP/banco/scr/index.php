<?php
   
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once "autoload.php";
    
    use Alura\Banco\Model\Conta\Conta;
    use Alura\Banco\Model\Conta\Cliente;
    use Alura\Banco\Model\Endereco;
    

    $endereco= new Endereco("guanambi","centro","rua 2","15");

    $conta= new Conta(cliente: new Cliente(cpf:"123.456.789-10", nome:"Lucas", endereco: $endereco ));
    $conta->depositarSaldo(1500);
    echo $conta->getSaldo()."<br>";

    if($conta->sacarSaldo(1550)){
        $conta->sacarSaldo(1550);
        echo "Saque realizado com sucesso!<br>";
    }else{
        echo "saldo insuficiente!<br>";
    }

    if($conta->sacarSaldo(1200)){
        $conta->sacarSaldo(1200);
        echo "Saque realizado com sucesso!<br>";
    }else{
        echo "saldo insuficiente!<br>";
    }

    echo $conta->getSaldo()."<br>";
    