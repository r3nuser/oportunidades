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
            <th>CPF</th>
            <th>Nome Do Aluno</th>
            <th>Data de Nascimento</th>
            <th>Email</th>
            <th>Telefone1</th>
            <th>Telefone2</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Número da Residência</th>    
            <?php
            //nome do arquivo que será gerado
            if(isset($cursoName))
            $arquivo = "$cursoName.xls";

            //preparando a tabela

            $tabela='<table border="1">';
            $tabela.='<thead>';
            $tabela.='<th>CPF</th>';
            $tabela.='<th>Nome Do Aluno</th>';
            $tabela.='<th>Data de Nascimento</th>';
            $tabela.='<th>Email</th>';
            $tabela.='<th>Telefone1</th>';
            $tabela.='<th>Telefone2</th>';
            $tabela.='<th>CEP</th>';
            $tabela.='<th>Rua</th>';
            $tabela.='<th>Bairro</th>';
            $tabela.='<th>Cidade</th>';
            $tabela.='<th>Número da Residência</th>';
            $tabela.='</thead>';
            ?>
            


        </thead>
        <tbody>
        <?php
       if(isset($cursoID))
       {
       $sql = "SELECT * FROM `aluno` WHERE FK_idCurso = '$cursoID'";

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

                echo"
                <tr>
                    <td>$aluno_cpf</td>
                    <td>$nome</td>
                    <td>$dataDeNascimentoBRFormat</td>
                    <td>$email</td>
                    <td>$telefone1</td>
                    <td>$telefone2</td>
                    <td>$cep</td>
                    <td>$rua</td>
                    <td>$bairo</td>
                    <td>$cidade</td>
                    <td>$numeroResidencia</td>
                    
                </tr>
            ";
            $tabela.='<tr>';
            $tabela.='<td>'.$aluno_cpf.'</td>';
            $tabela.='<td>'.$nome.'</td>';
            $tabela.='<td>'.$dataDeNascimentoBRFormat.'</td>';
            $tabela.='<td>'.$email.'</td>';
            $tabela.='<td>'.$telefone1.'</td>';
            $tabela.='<td>'.$telefone2.'</td>';
            $tabela.='<td>'.$cep.'</td>';
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
close_connection($con);
        ?>
        </tbody>
    </table>
        
    </body>
</html>        