<?php

/**
 * Class Conta será o nosso scopo das contas
 */
class Conta
{
    //definir dados da conta

    /**
     * @var $cpfTilutar
     */
    public $cpfTilutar;

    /**
     * @var $nomeTitular
     */
    public $nomeTitular;

    /**
     * @var $saldo
     */
    public $saldo;


    /**
     * Conta constructor.
     */
    public function __construct()
    {
    }

    public function sacar($valorASacar)
    {
        if($valorASacar > $this->saldo){
            echo "Saldo indisponivel";
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function depositar($valorADepositar)
    {
        if($valorADepositar < 0){
            echo "Valor precisa ser positivo";
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transferir($valorATransferir, Conta $contaDestino)
    {
        if($valorATransferir > $this->saldo){
            echo "Saldo indisponivel";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}