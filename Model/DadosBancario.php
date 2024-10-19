<?php
class DadosBancario{
    private $id;
    private $id_usuario;
    private $nome_banco;
    private $numero_conta;
    private $agencia;
    private $pix;

public function SalvarDadosBancario($dados){
    $DadosBancario = new DadosBancario();
    $DadosBancario->nome = $dados['nome'];
    $DadosBancario->email = $dados['email'];
}
public function ListarDadosBancario(){

}
public function UpdateDadosBancario($DadosBancario){

}}
?>