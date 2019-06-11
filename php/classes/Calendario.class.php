<?php 
  include_once "Banco.class.php";

  class Calendario extends Banco{
    public function __construct(){
      parent::__construct();
    }

    private $id;
    private $title;
    private $start;
    private $end;
    private $color;

    public function getItens()
    {
      $sql = "SELECT * FROM eventos";
      $sql = $this->pdo->query($sql);
      if($sql->rowCount() > 0){
        //print_r($sql->fetchAll());
        //echo "funcionou";
        return $sql->fetchAll();
      }else{

      }
    }

    public function strItens()
    {
      $value = array('dados' => $this->getItens());
      
      $dados_json = json_encode($value);
      $fp = fopen("json/events.json", "a+");
      $escrever = fwrite($fp, $dados_json);
      fclose($fp);
      
    }

    public function returnJson($value)
    {
      echo json_encode($value);
    }

  }