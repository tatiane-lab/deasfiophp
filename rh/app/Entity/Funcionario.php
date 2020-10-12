<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Funcionario
{
  public $id;
  public $nome;
  public $sexo;
  public $cpf;
  public $rg;
  public $email;
  public $endereco;
  public $cidade;
  public $estado;
  public $bairro;
  public $foto;
  public $telefones;

  public function cadastrar()
  {
    $objDatabase = new Database('funcionario');
    $id = $objDatabase->insert([
                'nome'      => $this->nome,
                'sexo'      => $this->sexo,
                'cpf'       => $this->cpf,
                'rg'        => $this->rg,
                'email'     => $this->email,
                'endereco'  => $this->endereco,
                'cidade'    => $this->cidade,
                'estado'    => $this->estado,
                'bairro'    => $this->bairro,
                'foto'      => $this->foto
              ]);
              
      return  $id;
  }

  public function atualizar(){
    return (new Database('funcionario'))->update('id = '.$this->id,[
      'nome'      => $this->nome,
      'sexo'      => $this->sexo,
      'cpf'       => $this->cpf,
      'rg'        => $this->rg,
      'email'     => $this->email,
      'endereco'  => $this->endereco,
      'cidade'    => $this->cidade,
      'estado'    => $this->estado,
      'bairro'    => $this->bairro,
      'foto'      => $this->foto
    ]);
  }

  public function excluir(){
    return (new Database('funcionario'))->delete('id = '.$this->id); 
  }

  public static function getFuncionarios($where=null, $order = null,$limit=null)
  {
      return (new Database('funcionario'))->select($where,$order,$limit)
                                           ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  public static function getFuncionario($id)
  {
      return (new Database('funcionario'))->select('id = '.$id)
                                           ->fetchObject(self::class);
  }

}
