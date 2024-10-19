<?php
class Serviço{
    private $id_serviço;
    private $nome;
    private $valor;
    private $id_tipo;

public function SalvarServiço($dados){
    $Serviço = new Serviço();
    $Serviço->nome = $dados['nome'];
    $Serviço->email = $dados['email'];
}
public function ListarServiços(){

}
public function UpdateServiços($Serviços){

}}
?>