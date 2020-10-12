<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

<div class="section">
  <h2 class="center-align">Excluir Funcionário</h2>
  <div class="row">
    <form class="col s12" method="POST">

      <input type=hidden value=<?=$objFuncionario->id?> name="idExcluir"/>
      <div class="row">
        <div class="input-field col s12">
          <span>Deseja realmente excluir o Funcionário <strong><?=$objFuncionario->nome?></span> ? </label>
        </div>        
      </div>

      <button class="btn waves-effect waves-light right espaco" type="submit" name="action">Excluir
        <i class="material-icons right">send</i>
      </button>
      <!-- botão da esquerda -->
      <a href="funcionarios.php" class="btn waves-effect waves-light right" type="submit" name="action">Cancelar
        <i class="material-icons right">cancel</i>
      </a>

    </form>
  </div>
</div>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="https://rawgit.com/willmendesneto/keepr/master/dist/keepr.js"></script>
