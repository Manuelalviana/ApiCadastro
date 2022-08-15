<?php
    require_once 'class_aluno.php';
    $a = new Aluno("bootcamp", "localhost", "root","", "cpf", "contato", "adreess" , "data_nasc",  "periodo", "CursoTipo" );
?>
<!doctype html>
<html>    

<head>
<link rel ="stylesheet" type="text/css" href="./estilo.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.5">
    <meta charset= "utf-8">
    <link href="">
    <title >Seu cadastro</title>

</head>

<body>
    <section id="centralizar">
    <table>
        <h2> Seu cadatro do Aluno </h2>
        <tr id ="titulo">
            <td class="form-group col-md-1">NOME</td>
            <td class="form-group col-md-1">CONTATO</td>
            <td class="form-group col-md-1">EMAIL</td>
            <td class="form-group col-md-1">Data de nascimento</td>
            <td class="form-group col-md-1">CPF</td>
            <td class="form-group col-md-1">MODALIDADE</td>
            <td colspan= "3">PERIODO</td>
        
        </tr>
        <?php
            $dados = $a-> buscarDados();
            if(count($dados) > 0)
            {
                for ($i= 0; $i < count($dados); $i++)
                {
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v) 
                    {
                        if($k ! ="id")
                        {
                            echo "<td>".$v. "</td>";
                        }
                        
                    }
                ?>
                    <td>
                    <button href="lista-usuario.php?id=<?php echo $dados[$i]['id'];?>" type="excluir" class="btn btn-dark">Excluir</button> 
                    <button href= "lista-usuario.php?id_up=<?php echo $dados[$i]['id'];?>" type="editar" class="btn btn-dark">Editar</button>   
                    </td> 
                <?php
                    echo "</tr>";
                }
        ?>
        <?php
            } 
            else{ // o banco esta vazio
                echo "Ainda nao tem alunos cadastradas"

            }

        ?>

               
            </tr> 
                <td class="form-group col-md-1">Maria</td>
                <td class="form-group col-md-1">00000000</td>
                <td class="form-group col-md-1">maricota@gmail.com</td>
                <td class="form-group col-md-1">09/02/1997</td>
                <td class="form-group col-md-1">162.000.000.00</td>
                <td class="form-group col-md-1">Presencial</td>
                <td class="form-group col-md-2">Tarde</td>


        </table>
        </section>
</body>
</html>

<?php
    if (isset($_GET['id']))
    {
        $id_aluno = addslashes($_GET['id']);
        $a->excluirCadastro($id_aluno);
        header("location:lista-usuarios.php");
    }        
            
?>