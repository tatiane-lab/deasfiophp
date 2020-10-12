  <?php
  require __DIR__ . '/vendor/autoload.php';
  DEFINE('TITLE','Editar Funcionário');

  use \App\Entity\Funcionario;
  use \App\Entity\Telefone;

  if (!isset($_GET['id']) or !is_numeric($_GET['id'])) 
  {    
    header('location: funcionarios.php?status=error');
    exit;
  } 


  $objFuncionario = Funcionario::getFuncionario($_GET['id']);

  if (!$objFuncionario instanceof Funcionario) 
  {    
    header('location: funcionarios.php?status=error');
    exit;
  }

  $MANTER_FOTO_ATUAL =  "S";

  $objTelefones = Telefone::getTelefones("idfuncionario = ".$_GET['id']);
  if(count($objTelefones)>0)
  {
    $arrayTel = array();
    foreach($objTelefones as $key=>$value){
      array_push($arrayTel, $value->telefone);
    }
    $stringTelefones = implode(",", $arrayTel);
    $stringTelefones.=",";
  }


  if (isset($_POST['nome'])) 
  {
    
    $objFuncionario->nome = $_POST['nome'];
    $objFuncionario->sexo = $_POST['sexo'];
    $objFuncionario->cpf = $_POST['cpf'];
    $objFuncionario->rg = $_POST['rg'];
    $objFuncionario->email = $_POST['email'];
    $objFuncionario->endereco = $_POST['endereco'];
    $objFuncionario->cidade = $_POST['cidade'];
    $objFuncionario->estado = $_POST['estado'];
    $objFuncionario->bairro = $_POST['bairro'];
    
    if (isset($_FILES["fileFunc"])) {
      
      $arquivo = $_FILES["fileFunc"]["tmp_name"];
      $tamanho = $_FILES["fileFunc"]["size"];
      $tipo = $_FILES["fileFunc"]["type"];
      $nome = $_FILES["fileFunc"]["name"];

      $MANTER_FOTO_ATUAL = $_POST['mantemfoto'];

      if($tamanho >=300000){
        echo "Tamanho de Foto, não pode ultrapassar 300kb";
        exit;
      }

      if ( $arquivo != "none" )
      {
        if($MANTER_FOTO_ATUAL == 'N')
        {
          $data = base64_encode(file_get_contents($arquivo)); 
          $objFuncionario->foto = $data;
        }
      }      
      
    } else {
      $objFuncionario->foto = NULL;
    }

    $result = $objFuncionario->atualizar();

    #region Insert telefones

    if(isset($result))
    {
      if (isset($_POST['telefones'])) 
      {
        $telefones = explode(",", $_POST['telefones']);

        Telefone::excluirPorFunc($objFuncionario->id);

        foreach ($telefones as $tel) 
        {
            if($tel != "undefined" && $tel != "")
            { 
              $objTelefone = new Telefone();

              $objTelefone->idfuncionario = $objFuncionario->id;
              $objTelefone->telefone = $tel;

              $objTelefone->cadastrar();
            }
        }
      }
    }

    #endregion

    header('location: funcionarios.php?status=success');
    exit;
  }

  include __DIR__ . '/includes/header.php';
  include __DIR__ . '/includes/formulario.php';
  include __DIR__ . '/includes/footer.php';
