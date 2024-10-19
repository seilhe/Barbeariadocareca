<?php
class Agendamento{
    private $id_agendamento;
    private $id_serviço;
    private $id_usuario;
    private $id_agenda;
    private $id_barbeiro;

public function SalvarAgendamento($dados){
    $Agendamento = new Agendamento();
    $Agendamento->nome = $dados['nome'];
    $Agendamento->email = $dados['email'];
}
public function ListarAgendamento(){

}
public function UpdateAgendamento($Agendamento){

}}
?>