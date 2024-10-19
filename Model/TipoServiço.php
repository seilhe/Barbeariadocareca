<?php
class TipoServiço{
   private $id;
   private $tipo;

public function SalvarTipoServiço($dados){
   $TipoServiço = new TipoServiço();
   $TipoServiço->nome = $dados['nome'];
   $TipoServiço->email = $dados['email'];
}
public function ListarTipoServiço(){

}
public function UpdateTipoServiço($TipoServiço){

}}
?>