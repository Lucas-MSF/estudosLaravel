<?php
    
    require_once "scr/Conta.php";

    $conta= new Conta(cpf: "123.456.789-10", nome:"Lucas");
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
    