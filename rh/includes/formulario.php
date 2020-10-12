<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

<div class="section">
  <h2 class="center-align"><?=TITLE?></h2>
  <div class="row">
    <form class="col s12" method="POST" name="form1" enctype="multipart/form-data">

      <div class="row">
        <div class="input-field col s8">
          <input id="nome" name="nome" type="text" class="validate" value="<?=$objFuncionario->nome ?>">
          <label for="nome">Nome Completo</label>
        </div>
        <div class="input-field col s4">
          <span>Sexo</span>
          <label style="padding-top: 10px">
            <input class="sexo" name="sexo" type="radio" value="m" <?=$objFuncionario->sexo == 'm' ? 'checked' : '' ?> />
            <span>Masculino</span>
          </label>
          </p>
          <p style="padding-top: 10px">
            <label>
              <input class="sexo" name="sexo" type="radio" value="f" <?=$objFuncionario->sexo == 'f' ? 'checked' : '' ?>/>
              <span>Feminino</span>
            </label>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s4">
          <input id="cpf" name="cpf" type="text" class="validate" placeholder="000.000.000-00" value="<?=$objFuncionario->cpf ?>" onblur="isValidCPF()" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">
          <label for="cpf">CPF</label>
        </div>
        <div class="input-field col s4">
          <input id="rg" name="rg" type="text" class="validate" value="<?=$objFuncionario->rg?>"">
          <label for="rg">RG</label>
        </div>
        <div class="input-field col s4">
          <input id="email" name="email" type="email" class="validate" value="<?=$objFuncionario->email?>">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <div class="card-panel grey lighten-5">
            <div class="row i right">
              <a id="btnAdicionar" class="btn-floating"><i class="material-icons">add</i></a>
            </div>
            <input type="hidden" name="telefones" id="telefones" value="<?=isset($stringTelefones)?$stringTelefones: '' ?>"/>
            <table id="tblTelefone" class="highlight responsive-table">         
                <thead>
                    <tr>
                        <th>Telefone</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($objTelefones))
                {
                  foreach($objTelefones as $key=>$value){
                    echo "<tr>";
                    echo "<td>".$value->telefone."</td>";
                    echo "<td><a class='waves-effect waves-light btn btnExcluir'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                  }
                }
                ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="endereco" name="endereco" type="text" class="validate" value="<?=$objFuncionario->endereco?>">
          <label for="endereco">Endereço</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s5">
          <input id="cidade" name="cidade" type="text" class="validate" value="<?=$objFuncionario->cidade?>">
          <label for="cidade">Cidade</label>
        </div>
        <div class="input-field col s2">
          <select id="estado" name="estado" class='selectForm'>
            <option value="" disabled selected>Estado</option>
            <option value="AC" <?=$objFuncionario->estado == 'AC'? 'selected' : ''?>>Acre</option>
            <option value="AL" <?=$objFuncionario->estado == 'AL'? 'selected' : ''?>>Alagoas</option>
            <option value="AP" <?=$objFuncionario->estado == 'AP'? 'selected' : ''?>>Amapá</option>
            <option value="AM" <?=$objFuncionario->estado == 'AM'? 'selected' : ''?>>Amazonas</option>
            <option value="BA" <?=$objFuncionario->estado == 'BA'? 'selected' : ''?>>Bahia</option>
            <option value="CE" <?=$objFuncionario->estado == 'CE'? 'selected' : ''?>>Ceará</option>
            <option value="DF" <?=$objFuncionario->estado == 'DF'? 'selected' : ''?>>Distrito Federal</option>
            <option value="ES" <?=$objFuncionario->estado == 'ES'? 'selected' : ''?>>Espírito Santo</option>
            <option value="GO" <?=$objFuncionario->estado == 'GO'? 'selected' : ''?>>Goiás</option>
            <option value="MA" <?=$objFuncionario->estado == 'MA'? 'selected' : ''?>>Maranhão</option>
            <option value="MT" <?=$objFuncionario->estado == 'MT'? 'selected' : ''?>>Mato Grosso</option>
            <option value="MS" <?=$objFuncionario->estado == 'MS'? 'selected' : ''?>>Mato Grosso do Sul</option>
            <option value="MG" <?=$objFuncionario->estado == 'MG'? 'selected' : ''?>>Minas Gerais</option>
            <option value="PA" <?=$objFuncionario->estado == 'PA'? 'selected' : ''?>>Pará</option>
            <option value="PB" <?=$objFuncionario->estado == 'PB'? 'selected' : ''?>>Paraíba</option>
            <option value="PR" <?=$objFuncionario->estado == 'PR'? 'selected' : ''?>>Paraná</option>
            <option value="PE" <?=$objFuncionario->estado == 'PE'? 'selected' : ''?>>Pernambuco</option>
            <option value="PI" <?=$objFuncionario->estado == 'PI'? 'selected' : ''?>>Piauí</option>
            <option value="RJ" <?=$objFuncionario->estado == 'RJ'? 'selected' : ''?>>Rio de Janeiro</option>
            <option value="RN" <?=$objFuncionario->estado == 'RN'? 'selected' : ''?>>Rio Grande do Norte</option>
            <option value="RS" <?=$objFuncionario->estado == 'RS'? 'selected' : ''?>>Rio Grande do Sul</option>
            <option value="RO" <?=$objFuncionario->estado == 'RO'? 'selected' : ''?>>Rondônia</option>
            <option value="RR" <?=$objFuncionario->estado == 'RR'? 'selected' : ''?>>Roraima</option>
            <option value="SC" <?=$objFuncionario->estado == 'SC'? 'selected' : ''?>>Santa Catarina</option>
            <option value="SP" <?=$objFuncionario->estado == 'SP'? 'selected' : ''?>>São Paulo</option>
            <option value="SE" <?=$objFuncionario->estado == 'SE'? 'selected' : ''?>>Sergipe</option>
            <option value="TO" <?=$objFuncionario->estado == 'TO'? 'selected' : ''?>>Tocantins</option>
            <option value="EX" <?=$objFuncionario->estado == 'EX'? 'selected' : ''?>>Estrangeiro</option>
          </select>
        </div>
        <div class="input-field col s5">
          <input id="bairro" name="bairro" type="text" class="validate" value="<?=$objFuncionario->bairro?>">
          <label for="bairro">Bairro</label>
        </div>
      </div>
      <div class="row">
          <div class="file-field input-field col s2">
            <div class="card-action">
                <img 
                  class="preview-img bordered" 
                  id="imgFunc" 
                  width="150px" 
                  height="175px" 
                  style="border:1px solid #ccc; object-fit: contain;" 
                  <?php
                    if($objFuncionario->foto != "")
                      echo "src='data:image/jpeg;base64,".$objFuncionario->foto."'";
                    else
                      echo "src='./img/avatar.jpg'";
                  ?>
                  
                  />
            </div>
          </div>
        <div class="file-field input-field col s10">
          <div class="btn">
            <span>Foto</span>
            <input class="file-chooser" type="file" id="fileFunc" name="fileFunc" accept=".jpg"> <p>
            <span class='waves-effect waves-light btn' id="LimpaFoto"><i class='material-icons'>delete</i></span>
            <input class="file-chooser" type="hidden" id="mantemfoto" name="mantemfoto" value="<?=isset($MANTER_FOTO_ATUAL)? $MANTER_FOTO_ATUAL: 'N'?>"> <p>     
          </div>
          <div class="file-path-wrapper">
            <input type="text" class="file-path validade">
          </div>
        </div>
      </div>

      <button class="btn waves-effect waves-light right espaco" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
      </button>

      <!-- botão da esquerda -->
      <a href="funcionarios.php" class="btn waves-effect waves-light right" type="submit" name="action">Cancelar
        <i class="material-icons right">cancel</i>
      </a>

    </form>

    <!-- botão da esquerda -->
  </div>
</div>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="https://rawgit.com/willmendesneto/keepr/master/dist/keepr.js"></script>

<script>


//Alterar IMG via FileChange
$(document).ready(function() {

  $('#fileFunc').change( function(event) {
  var tmppath = URL.createObjectURL(event.target.files[0]);
      $("#imgFunc").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
      $('#mantemfoto').val('N');
  });

  $('#LimpaFoto').click( function() {
    document.getElementById("fileFunc").value = '';
    $('#imgFunc').removeAttr('src');
    $('#imgFunc').attr('src','./img/avatar.jpg');
    $('#mantemfoto').val('N');
  });
 }); 


  $(document).ready(function() {
    $('.selectForm').formSelect();
  });  

  function isValidCPF(){
    cpf = $("#cpf").val();
    if(!ValidaCPF(cpf))
    {
      alert("CPF Inválido");
      $("#cpf").val("");
    }
  }

  //Função para validar CPF
  function ValidaCPF(cpf) {    
    if (typeof cpf !== "string") return false
    cpf = cpf.replace(/[\s.-]*/igm, '')
    if (
        !cpf ||
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999" 
    ) {
        $("#cpf").val("");
        return false
    }
    var soma = 0
    var resto
    for (var i = 1; i <= 9; i++) 
        soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(cpf.substring(9, 10)) )  return false;
    soma = 0
    for (var i = 1; i <= 10; i++) 
        soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(cpf.substring(10, 11) ) ) return false;
    return true
}

  
</script>