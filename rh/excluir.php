  <?php
  require __DIR__ . '/vendor/autoload.php';
  
  use \App\Entity\Funcionario;

  if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: funcionarios.php?status=error');
    exit;
  }

  $objFuncionario = Funcionario::getFuncionario($_GET['id']);  
  if (!$objFuncionario instanceof Funcionario) 
  {    
    header('location: funcionarios.php?status=error');
    exit;
  }

  if(isset($_POST['idExcluir'])){

    $objFuncionario->excluir();  
    header('location: funcionarios.php?status=success');
    exit;
  }

  include __DIR__ . '/includes/header.php';
  include __DIR__ . '/includes/confirmar-exclusao.php';
  include __DIR__ . '/includes/footer.php';
