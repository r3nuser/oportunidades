<?php

include("../../conexao.php");
include("../../returnID.php");
$con = open_connection();


    if(!empty($_POST['nome'])&& !empty($_POST['telefone'])&& !empty($_POST['telefone2'])&& !empty($_POST['CEP']) && !empty($_POST['rua'])&& !empty($_POST['bairro'])&& !empty($_POST['cidade'])&& !empty($_POST['numeroResidencia'])){
    
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $telefone2 = $_POST['telefone2'];
        $CEP = $_POST['CEP'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $numeroResidencia = $_POST['numeroResidencia'];


        $telefoneOK=false;
        $enderecoOK=false;
        $nomeOK=false;

        // registering name and ID
        $sql = "INSERT INTO instituicao VALUES";
        $sql.= "(null,'$nome')";

        if(!mysqli_query($con,$sql)){
                echo("Error description: " . mysqli_error($con)."<br>");
        }else{
            // recovering ID
            $instituicaoID = returnIDInstituicao($nome,$con);
    
            //registering telephone
            $sql="INSERT INTO telefone VALUES";
            $sql.="('$telefone','$telefone2',null,'$instituicaoID')";
                
            if(!mysqli_query($con,$sql)){
                echo("\"telefone\" Error description: " . mysqli_error($con)."<br>");
            }else{
                // registering address
                $sql= "INSERT INTO endereco VALUES ";
                $sql.= "('$CEP','$rua','$bairro','$cidade','$numeroResidencia',null,'$instituicaoID')";
        
                if(!mysqli_query($con,$sql)){
                    echo("\"Endereço\" Error description: " . mysqli_error($con)."<br>");
                }else{
                    echo"<script>alert('cadastro realizado com sucesso')</script>";
                }
            }
        }
    }





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../css/style.css">
        <script type="text/javascript" src="../../Javascript/formatterFields.js"></script>
        <title>Instituição Tabela</title>
        <style>
            body{
                background-image:none;
            }
            input{
                border:none;
            }
        </style>
    </head>
    <body>
        <center>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Instituição</th>
                    <th>Telefone1</th>
                    <th>Telefone2</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairo</th>
                    <th>Cidade</th>
                    <th>Número</th>
                    <th>Atualizar</th>

                </thead>
                <tbody>
                    <?php

                        $sql="SELECT * FROM instituicao";

                        if(!$resultado = mysqli_query($con,$sql)){
                            echo ("Erro ao retornar dados");
                        }else{
                                while($registro = mysqli_fetch_array($resultado)){
                                       
                                    $i=0;
                                    $j=0;

                                    $instituicaoID = $registro['instituicao_id'];
                                    $nome = $registro['nome'];

                                    if(!isset($nome)&&!isset($instituicaoID))
                                    {
                                        echo("Não foi possível retornar os dados do banco");
                                    }else{
                                        $arrayTelefone = returnInstituicaoTelefones($instituicaoID,$con);
                                        $arrayEndereco = returnInstituicaoEndereco($instituicaoID,$con);

                                        $telefone1  = $arrayTelefone[$i];
                                        $telefone2  = $arrayTelefone[$i+1]; 


                                        $cep  = $arrayEndereco[$j];
                                        $rua  = $arrayEndereco[$j+1];
                                        $bairo  = $arrayEndereco[$j+2];
                                        $cidade  = $arrayEndereco[$j+3];
                                        $numeroResidencia  = $arrayEndereco[$j+4];
                                        
                                        echo" 
                                        <tr>
                                            <form id='formulario' action='atualizarInstituicao.php' method='get'>
                                                <td><input class='entrada' name='instituicaoID' size='1' type='text' value='$instituicaoID'/></td>
                                                <td><input class='entrada' name='nome' size='20' type='text' value='$nome'/></td>
                                                <td><input class='entrada' maxlength='14' onkeydown='javascript: fMasc( this, mTel)' name='telefone1' size='10' type='text' value='$telefone1'/></td>
                                                <td><input class='entrada' maxlength='14' onkeydown='javascript: fMasc( this, mTel)' name='telefone2' size='10' type='text' value='$telefone2'/></td>
                                                <td><input class='entrada' maxlength='10' onkeydown='javascript: fMasc( this, mCEP)' name='cep' size='6' type='text' value='$cep'/></td>
                                                <td><input class='entrada' name='rua' size='10' type='text' value='$rua'/></td>
                                                <td><input class='entrada' name='bairo' size='10' type='text' value='$bairo'/></td>
                                                <td><input class='entrada' name='cidade' size='10' type='text' value='$cidade'/></td>
                                                <td><input class='entrada' name='numeroResidencia' size='2' type='text' value='$numeroResidencia'/></td>
                                                <td><input type='image' src='../../icones/editar.png' value='Editar'/> </td>
                                            </form>
                                        </tr>";
                                    }
                                }
                                close_connection($con);
                            }
                    ?>
                </tbody>
            </table> 
        </center> 
    </body>
</html>
