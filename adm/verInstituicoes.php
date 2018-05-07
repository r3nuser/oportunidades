<?php

include("../../oportunidades/conexao.php");
include("../../oportunidades/returnID.php");
$con = open_connection();


    if(!empty($_POST['nome'])|| !empty($telefone)|| !empty($telefone2)|| !empty($CEP)|| !empty($rua)|| !empty($bairro)|| !empty($cidade)|| !empty($numeroResidencia)){
    
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
        <link rel="stylesheet" href="../../oportunidades/css/style.css">
        <title>Instituição Tabela</title>
        <style>
            body{
                background-image:none;
            }
        </style>
    </head>
    <body>
        <center>
            <table>
                <thead>
                    <th>ID da Instituição</th>
                    <th>Instituição</th>
                    <th>Telefone1</th>
                    <th>Telefone2</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairo</th>
                    <th>Cidade</th>
                    <th>Número</th>

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
                                        
                                        echo" <tr>
                                        <td>$instituicaoID</td>
                                        <td>$nome</td>
                                        <td>$telefone1</td>
                                        <td>$telefone2</td>
                                        <td>$cep</td>
                                        <td>$rua</td>
                                        <td>$bairo</td>
                                        <td>$cidade</td>
                                        <td>$numeroResidencia</td>
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
