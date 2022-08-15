<?php
    require_once 'class_aluno.php';
    $a = new Aluno("bootcamp", "localhost", "root","", "cpf", "contato", "adreess" , "data_nasc",  "periodo", "CursoTipo" );
?>
<!doctype html>
<html>    

<head>
<link rel ="stylesheet" type="text/css" href="./estilo.css"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.5">
    <meta charset= "utf-8">
    <link href="">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>

    <title >Cadastro Bootcamp</title>

</head>


<header >
  <div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Login de Cadastro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <li class="nav-item">
        <a class="nav-link" href="lista-usuario.php">Seu cadastro</a>
      </li>  
</nav>

  </div>
  </header>

    <body>
      <?php
      if (isset($POST['nome'])){
        $nome = addslashes(($POST['nome']));
        $data_nasc = addslashes(($POST['data_nasc']));
        $email = addslashes(($POST['email']));
        $senha = addslashes(($POST['senha']));
        $adress = addslashes(($POST['adress']));
        $contato = addslashes(($POST['contato']));
        $periodo = addslashes(($POST['periodo']));
        $modalidade = addslashes(($POST['modalidade']));
        if (!empty($name) && !empty($data_nasc) && !empty($email) &&!empty($senha) &&!empty($adress) &&!empty($contato)
         &&!empty($periodo) &&!empty($modalidade))
         //cadastrar
         if (!$a-> CadastrarPessoa($nome, $data_nasc, $email, $senha, $adreess, $contato, $periodo, $modalidade))
         {
          echo "Cadastro realizado com sucesso! Bem vindo ao BOOTCAMP Generation";
         }
         else
         {
          echo "Email ja esta cadastrado";
         }
        }else
        {
          echo "Preencha todos os campos";
        }
      
  ?>

  <?php
      if(isset($_GET['id_up']))
      {
        $id_update = addslashes($_GET['id_up'])
        $res = $a-> buscarDadosAluno($id_update); 

      }


  ?>

    <div class="form">
      
    <form method="POST" >
      <input type="hidden" nome="acao" value="cadastrar">
    
        <div class="form-group col-md-6">
        <label for="inputName">Nome Completo</label>
        value="<?php if(isset($res)){ echo $res['nome']} ?>"
        <br>
        <input type="text" id="inputName" class="form-control" placeholder="Manuela" required>
        </div>

        <div class="form-group col-md-6">
        <label for="inputEmail4">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nasc" placeholder="00-00-00" required>
        value="<?php if(isset($res)){ echo $res['data_nasc']} ?>"
        </div>

        <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="email" placeholder="maricota@email.com" required>
        value="<?php if(isset($res)){ echo $res['email']} ?>"
        </div>

        <div class="form-group">
        <label for="inputPassword6">Senha</label>
        <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="senha">
         <small id="senha" class="text-muted">
         </small>
         </div>

        <div class="form-group">
        <label for="inputAddress">Endereço Completo</label>
        value="<?php if(isset($res)){ echo $res['adreess']} ?>"
        <input type="text" class="form-control" id="address" placeholder="Av me perdi, 25" required>
         </div>

        <div class="form-row">

        <div  class="form-group col-md-4">
            <label for="inputZip">Contato Telefonico </label>    
            <input  type="text" class="form-control" id="contato" required>
            value="<?php if(isset($res)){ echo $res['contato']} ?>"
        </div>

             <div  class="form-group col-md-4">
            <label for="inputState">Periodo do Curso</label>
            <select id="inputState" class="periodo" required>
                <option selected hidden>Escolha...</option>
                <option value="Manhã">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>
             </select>
             </div>
            
            <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="opcao1" checked>
            <label class="form-check-label" for="exampleRadios1">
             Modalidade Presencial
            </label>
            </div>
         <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="opcao2">
         <label class="form-check-label" for="exampleRadios2">
          Modalidade EAD
          </label>
            </div>
      </div>
      <div class="mb-3">
          <button type="submit" class="btn btn-dark">Enviar</button>
</div>
    </form>
<br>

</body>
</html>