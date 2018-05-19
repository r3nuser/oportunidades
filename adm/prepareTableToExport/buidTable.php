<?php
    include('../../conexao.php');
    include('../../returnID.php');
    session_start();
    $con = open_connection();

    if(!empty($_POST['curso']))
    {   
        $cursoName = $_POST['curso'];
        
    }
    if(isset($cursoName))
    $cursoID = returnIDCourse($cursoName,$con);
    
?>
<html>
    <head>
    <link REL="STYLESHEET" HREF="style-table.CSS" TYPE="TEXT/CSS"/>
    </head>
    <body>
    <br>
    <input class='bntEX' type='button' value='Exportar para Exel' onclick='javascript: location.href="exportar.php"'/>            
   
    <br>
    <table>
        <thead>
            <th>Posição</th>
            <th>CPF</th>
            <th>Nome Completo</th>
            <th>Data de Nascimento</th>
            <th>Email</th>
            <th>Telefone1</th>
            <th>Telefone2</th>
            <!-- <th>CEP</th> -->
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Número</th>
            <th>ID</th>
            <th>alterar</th>    
            <?php
            //nome do arquivo que será gerado
            if(isset($cursoName))
            $arquivo = "$cursoName.xls";

            //preparando a tabela

            $tabela='<table border="1">';
            $tabela.='<thead>';
            $tabela.='<th>Posição</th>';
            $tabela.='<th>CPF</th>';
            $tabela.='<th>Nome Completo</th>';
            $tabela.='<th>Data de Nascimento</th>';
            $tabela.='<th>Email</th>';
            $tabela.='<th>Telefone1</th>';
            $tabela.='<th>Telefone2</th>';
            // $tabela.='<th>CEP</th>';
            $tabela.='<th>Rua</th>';
            $tabela.='<th>Bairro</th>';
            $tabela.='<th>Cidade</th>';
            $tabela.='<th>Número da Residência</th>';
            $tabela.='</thead>';
            ?>
            


        </thead>
        <tbody>
        <?php
        $posicao=0;
       if(isset($cursoID))
       {
       $sql = "SELECT * FROM `aluno` WHERE FK_idCurso = '$cursoID'ORDER BY `FK_idCurso` ASC";

        if(!$rs = mysqli_query($con,$sql)){
       
            echo("Error description: " . mysqli_error($con)."<br>");
            
        }else{
    
            while($rg = mysqli_fetch_array($rs)){
                
                $i=0;
                $j=0;

                $alunoID = $rg['alunoID'];
                $aluno_cpf = $rg['aluno_cpf'];
                $nome = $rg['nome'];
                $dataDeNascimentoUSFormat = DateTime::createFromFormat('Y-m-d',$rg['dataDeNascimento']);
                $email = $rg['email'];
                
                $arrayTelefone = returnAlunoTelefones($alunoID,$con);
                $arrayEndereco = returnAlunoEndereco($alunoID,$con);

                $dataDeNascimentoBRFormat = $dataDeNascimentoUSFormat->format('d/m/Y');

                $telefone1  = $arrayTelefone[$i];
                $telefone2  = $arrayTelefone[$i+1];
                $cep  = $arrayEndereco[$j];
                $rua  = $arrayEndereco[$j+1];
                $bairo  = $arrayEndereco[$j+2];
                $cidade  = $arrayEndereco[$j+3];
                $numeroResidencia  = $arrayEndereco[$j+4];

                $posicao++;
                echo"
                <tr>
                    <form action='makeup.php' method='get'>
                    <td><input class='inputCampo' size='2' type='text' value='$posicao'/></td>
                    <td><input class='inputCampo' size='12' type='text' value='$aluno_cpf'/></td>
                    <td><input name='nome' class='inputCampo' size='20' type='text' value='$nome'/></td>
                    <td><input class='inputCampo' size='9' type='text' value='$dataDeNascimentoBRFormat'/></td>
                    <td><input name='email' class='inputCampo' size='25' type='text' value='$email'/></td>
                    <td><input name='tel1' class='inputCampo' size='12' type='text' value='$telefone1'/></td>
                    <td><input name='tel2' class='inputCampo' size='12' type='text' value='$telefone2'/></td>
               <!-- <td><input class='inputCampo' size='8' type='text' value='$cep'/></td>-->
                    <td><input name='rua' class='inputCampo' size='15' type='text' value='$rua'/></td>
                    <td><input name='bairro' class='inputCampo' size='5' type='text' value='$bairo'/></td>
                    <td><input name='cidade' class='inputCampo' size='5' type='text' value='$cidade'/></td>
                    <td><input name='numero' class='inputCampo' size='4' type='text' value='$numeroResidencia'/></td>
                    <td><input name='alunoID' class='inputCampo' size='4' type='text' value='$alunoID'/></td>
                    <td><input type='submit' value='salvar'/></td>
                    </form>
                </tr>
            ";
            $tabela.='<tr>';
            $tabela.='<td>'.$posicao.'</td>';
            $tabela.='<td>'.$aluno_cpf.'</td>';
            $tabela.='<td>'.$nome.'</td>';
            $tabela.='<td>'.$dataDeNascimentoBRFormat.'</td>';
            $tabela.='<td>'.$email.'</td>';
            $tabela.='<td>'.$telefone1.'</td>';
            $tabela.='<td>'.$telefone2.'</td>';
            // $tabela.='<td>'.$cep.'</td>';
            $tabela.='<td>'.$rua.'</td>';
            $tabela.='<td>'.$bairo.'</td>';
            $tabela.='<td>'.$cidade.'</td>';
            $tabela.='<td>'.$numeroResidencia.'</td>';
            $tabela.='</tr>';
        }
        $tabela.='</tbody>';
        $tabela.='</table>';

        $_SESSION['tabela'] = $tabela;
        $_SESSION['arquivo'] = $arquivo;
    }
}

        ?>
        <tr>
            <td colspan="13" style="text-align:center">DUPLICADOS</td>
        </tr>
        <?php
        if(isset($cursoID)){
        
            $sql="SELECT alunoDuplicadoID,aluno_cpf, nome, dataDeNascimento, email, telefone1, telefone2, cep,rua,bairro,cidade,numeroResidencia FROM `duplicados` WHERE FK_idCurso='$cursoID' ORDER BY `FK_idCurso` ASC ";
            if(!$rs = mysqli_query($con,$sql)){
       
            echo("Error description: " . mysqli_error($con)."<br>");
            	
             
            }else{
    
                while($rg = mysqli_fetch_array($rs)){
                   $posicao++;
                    echo"
                        <tr>
                            <td><input class='inputCampo' size='2' type='text' value='$posicao'/></td>
                            <td><input class='inputCampo' size='12' type='text' value='".$rg['aluno_cpf']."'/></td>
                            <td><input class='inputCampo' size='20' type='text' value='".$rg['nome']."'/></td>
                            <td><input class='inputCampo' size='9' type='text' value='".$rg['dataDeNascimento']."'/></td>
                            <td><input class='inputCampo' size='25' type='text' value='".$rg['email']."'/></td>
                            <td><input class='inputCampo' size='12' type='text' value='".$rg['telefone1']."'/></td>
                            <td><input class='inputCampo' size='12' type='text' value='".$rg['telefone2']."'/></td>
                        <!--<td><input class='inputCampo' size='8' type='text' value='".$rg['cep']."'/></td>-->
                            <td><input class='inputCampo' size='15' type='text' value='".$rg['rua']."'/></td>
                            <td><input class='inputCampo' size='5' type='text' value='".$rg['bairro']."'/></td>
                            <td><input class='inputCampo' size='5' type='text' value='".$rg['cidade']."'/></td>
                            <td><input class='inputCampo' size='4' type='text' value='".$rg['numeroResidencia']."'/></td>
                            <td colspan='2'><input name='numero' class='inputCampo' size='4' type='text' value='".$rg['alunoDuplicadoID']."'/></td>
                            
                        </tr>
                    ";
                }
            }
        }

        close_connection($con);
        ?>
        </tbody>
    </table>
        
    </body>
</html>        