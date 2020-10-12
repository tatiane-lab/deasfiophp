<?php 
 require __DIR__.'/vendor/autoload.php';
 
 include __DIR__.'/includes/header.php';

 use \App\Entity\Funcionario;
 $funcionarios = Funcionario::getFuncionarios();

 $mensagem = '';
 if(isset($_GET['status'])){
   switch($_GET['status']){
     case 'success':
      $mensagem = '<script>alert("Ação executada com sucesso");</script>';
     break;
     case 'error':
      $mensagem = '<script>alert("Ação não Executada");</script>';
     break;
   }
 }
 $html = '';

 foreach ($funcionarios as $funcionario) {
   $html .= '<tr>
              <td style="display: none">'.$funcionario->id.'</td>
              <td>'.$funcionario->nome.'</td>
              <td>'.($funcionario->sexo == 'f'? 'Feminino': 'Masculino').'</td>
              <td>'.$funcionario->cpf.'</td>
              <td>'.$funcionario->email.'</td>
              <td>
                <a class="waves-effect waves-light btn" title="Editar" href="editar.php?id='.$funcionario->id.'"><i class="material-icons">edit</i></a>
                <a class="waves-effect waves-light btn" title="Exlcuir" href="excluir.php?id='.$funcionario->id.'"><i class="material-icons">delete</i></a>
              </td>
             </tr>';
 }

?>


    <div class="section">
      <?= $mensagem ?>
      <h2 class="center-align">Lista de Funcionários</h2>      
      <div class="row i right">
        <a class="btn-floating" href="cadastrar.php"><i class="material-icons">add</i></a>
        <span>Adicionar novo Funcionario</span>
      </div>
      <div class="row">
        <table class="striped highlight responsive-table">
          <thead>
            <tr>
              <th style="display: none">ID</th>
              <th>Nome</th>
              <th>Sexo</th>
              <th>CPF</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <?php echo $html?>
          </tbody>
        </table>
      </div>
    </div>

  <?php
  include __DIR__.'/includes/footer.php';
  ?>