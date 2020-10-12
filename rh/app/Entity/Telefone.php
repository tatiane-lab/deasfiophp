<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Telefone
{
  public $id;
  public $idfuncionario;
  public $telefone;

  public function cadastrar()
  {
    $objDatabase = new Database('telefone');
    $this->id = $objDatabase->insert([
                'idfuncionario' => $this->idfuncionario,
                'telefone'      => $this->telefone
              ]);
              
      return true;
  }

  public function atualizar(){
    return (new Database('telefone'))->update('id = '.$this->id,[
      'idfuncionario' => $this->idfuncionario,
      'telefone'      => $this->telefone
    ]);
  }

  public static function excluirPorFunc($idfuncionario){
    return (new Database('telefone'))->delete('idfuncionario = '.$idfuncionario); 
  }

  public static function getTelefones($where=null, $order = null,$limit=null,$fields='*')
  {
      return (new Database('telefone'))->select($where,$order,$limit,$fields)
                                           ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  public static function getTelefone($id)
  {
      return (new Database('telefone'))->select('id = '.$id)
                                           ->fetchObject(self::class);
  }

}
