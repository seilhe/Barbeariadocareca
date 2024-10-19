<?php
class Grupo{
    private $id_grupo;
    private $nome;

public function SalvarGrupo($dados){
    $Grupo = new Grupo();
    $Grupo->nome = $dados['nome'];
    $Grupo->email = $dados['email'];
}
public function ListarGrupo(){

}
public function UpdateGrupo($Grupo){

}}
?>