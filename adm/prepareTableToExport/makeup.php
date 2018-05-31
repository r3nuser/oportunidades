 <?php
    include("../../conexao.php");
    include("../../returnID.php");
    $con=open_connection(); 

    $botao = $_GET['botao'];
    $nome = $_GET['nome'];
    $alunoID = $_GET['alunoID'];

    $courseName = returnNameCourse(returnFKCourseByAlunoID($alunoID,$con),$con);
    
    switch ($botao) {
        case 'editar':
        
            
        
            $sql = "UPDATE `aluno` SET `nome`='$nome' WHERE alunoID='$alunoID'";
        
            if(!$rs = mysqli_query($con,$sql)){
            
                echo("Error description: " . mysqli_error($con)."<br>");
                close_connection($con);
            }else{
                echo"<script>alert('Atualização bem sucedida!')</script>";
                echo "<script>location.href='buidTable.php?curso=$courseName'</script>";
                close_connection($con);
            }
        break;

        case 'excluir':

            $sql = "SELECT * FROM `aluno` WHERE alunoID='$alunoID'";

            if(!$rs = mysqli_query($con,$sql)){
        
                echo("Error description: " . mysqli_error($con)."<br>");
                
            }else{
        
                while($rg = mysqli_fetch_array($rs)){
                    
                    $i=0;
                    $j=0;

                    $alunoID = $rg['alunoID'];
                    $aluno_cpf = $rg['aluno_cpf'];
                    $nome = $rg['nome'];
                    $dataDeNascimentoUSFormat = $rg['dataDeNascimento'];
                    $email = $rg['email'];
                    $trabalho =$rg['trabalhando'];
                    $expectativa =$rg['expec_sobre_curso'];
                    $discovered=$rg['como_conheceu'];
                    $curso = $rg['FK_idCurso'];
                    
                    $arrayTelefone = returnAlunoTelefones($alunoID,$con);
                    $arrayEndereco = returnAlunoEndereco($alunoID,$con);

                    

                    $telefone1  = $arrayTelefone[$i];
                    $telefone2  = $arrayTelefone[$i+1];
                    $cep  = $arrayEndereco[$j];
                    $rua  = $arrayEndereco[$j+1];
                    $bairo  = $arrayEndereco[$j+2];
                    $cidade  = $arrayEndereco[$j+3];
                    $numeroResidencia  = $arrayEndereco[$j+4];


                    $sql = "INSERT INTO `duplicados`( `alunoDuplicadoID`,`IDtabelaPrincipal`, `aluno_cpf`, `nome`, `dataDeNascimento`, `email`, `trabalhando`, `expec_sobre_curso`, `como_conheceu`, `FK_idCurso`, `cep`, `rua`, `bairro`, `cidade`, `numeroResidencia`, `telefone1`, `telefone2` ) VALUES";
                    $sql  .="(NULL,'$alunoID','$aluno_cpf','$nome','$dataDeNascimentoUSFormat','$email','$trabalho','$expectativa','$discovered','$curso','$cep','$rua','$bairo','$cidade','$numeroResidencia','$telefone1','$telefone2')";
                  
                    if(!$rs = mysqli_query($con,$sql)){
        
                        echo("Error description: reinserção " . mysqli_error($con)."<br>");
                        
                    }else{
                        /* Deleção do telefone do aluno */
                        $sql="DELETE FROM `telefone` WHERE fk_alunoID='$alunoID'";
                        
                        if(!$rs = mysqli_query($con,$sql)){
        
                            echo("Error description: " . mysqli_error($con)."<br>");
                            
                        }else{
                            /* Deleção do endereço */
                            $sql = "DELETE FROM `endereco` WHERE fk_alunoID='$alunoID'";
                            
                            if(!$rs = mysqli_query($con,$sql)){
        
                                echo("Error description: " . mysqli_error($con)."<br>");
                                
                            }else{
                                /* Deleção Curso-Aluno */
                                $sql = "DELETE FROM `curso_aluno` WHERE fk_cursoID='$alunoID'";
                                if(!$rs = mysqli_query($con,$sql)){
        
                                    echo("Error description: " . mysqli_error($con)."<br>");
                                    
                                }else{
                                    $sql = "DELETE FROM `aluno` WHERE alunoID='$alunoID'";
                                    if(!$rs = mysqli_query($con,$sql)){
        
                                        echo("Error description: " . mysqli_error($con)."<br>");
                                        
                                    }else{
                                        echo"<script>alert('Reclassificação bem-sucedida!')</script>";
                                        close_connection($con);
                                        echo "<script>location.href='buidTable.php?curso=$courseName'</script>";
                                    }
                                }
                            }

                        }

                    }
                }
            }



            

        break;
        
        
    }


?>