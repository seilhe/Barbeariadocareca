<?php
class Agenda{
    private $id_agenda;
    private $dia_semana;
    private $hora_inicio;
    private $hora_fim;
    private $hora_intervalo_incio;
    private $hora_intervalo_fim;
    private $id_usuario;

public function SalvarAgenda($dados){
    $Agenda = new Agenda();
    $Agenda->nome = $dados['nome'];
    $Agenda->email = $dados['email'];
}
public function ListarAgenda(){

}
public function UpdateAgenda($Agenda){

}}
?>