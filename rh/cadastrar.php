  <?php
  require __DIR__ . '/vendor/autoload.php';

  DEFINE('TITLE', 'Cadastrar Funcionário');

  use \App\Entity\Funcionario;
  use \App\Entity\Telefone;

  $objFuncionario = new Funcionario();

  if (isset($_POST['nome'])) {

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

      if($tamanho >= 300000){
        echo "Tamanho de Foto, não pode ultrapassar 300kb";
        exit;
      }

      if ( $arquivo != "none" )
      {
        $data = base64_encode(file_get_contents($arquivo));
        $objFuncionario->foto = $data;
      }      
      
    } else {
      $objFuncionario->foto = NULL;
    }

    $result = $objFuncionario->cadastrar();

    #region Insert telefones

    if (isset($result)) {
      if (isset($_POST['telefones'])) {
        $telefones = explode(",", $_POST['telefones']);

        foreach ($telefones as $tel) {
          if ($tel != "undefined" && $tel != "") {
            $objTelefone = new Telefone();

            $objTelefone->idfuncionario = $result;
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
