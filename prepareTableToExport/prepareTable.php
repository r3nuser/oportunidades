<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    include("../conexao.php");
    include("../returnID.php");

    $con = open_connection();
    
    $sql = "SELECT * FROM `aluno`";


   
    
    

    if(!$rs = mysqli_query($con,$sql)){

        echo("Erro description: ".mysqli_error($con)."<br>");

    }else{

        echo"
        <html>
			<head>
				<title>Formulário de Mátricula</title>
				
				<link REL='SHORTCUT ICON' HREF='../icones/favicon.ico'>
				<link REL='STYLESHEET' HREF='../CSS/STYLE.CSS' TYPE='TEXT/CSS'/>
				
				<meta charset='ISO-8859-1'>

				
				
				
			</head>
			
			<body>
            <div class='caixaExportar'>
               <p class ='separador'>Alunos cadastrados</p>
               <input class='bntEX' type='button' value='Exportar para Exel' onclick='javascript: location.href=\"exportar.php\"'/>

               
               <table>
                    <thead>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Email</th>
                        <th>Telefone1</th>
                        <th>Telefone2</th>
                        <th>CEP</th>
                        <th>Cua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Número da Residência</th>
                        <th>Curso</th>
                    </thead>
                    <tbody>
        ";
            //nome do arquivo que será gerado
            $arquivo = 'Dados dos alunos.xls';

            //preparando a tabela

            $tabela='<table border="1">';
            $tabela.='<thead>';
            $tabela.='<th>CPF</th>';
            $tabela.='<th>Nome</th>';
            $tabela.='<th>Data de Nascimento</th>';
            $tabela.='<th>Email</th>';
            $tabela.='<th>Telefone1</th>';
            $tabela.='<th>Telefone2</th>';
            $tabela.='<th>CEP</th>';
            $tabela.='<th>Rua</th>';
            $tabela.='<th>Bairro</th>';
            $tabela.='<th>Cidade</th>';
            $tabela.='<th>Número da Residência</th>';
            $tabela.='<th colspan="2">Curso</th>';
            $tabela.='</thead>';
            
        while($rg = mysqli_fetch_array($rs)){
            $i=0;
            $j=0;
            

            $aluno_cpf = $rg['aluno_cpf'];
            $nome = $rg['nome'];
            $dataDeNascimentoUSFormat = DateTime::createFromFormat('Y-m-d',$rg['dataDeNascimento']);
            $email = $rg['email'];
            $trabalhando = $rg['trabalhando'];
            $expec_sobre_curso = $rg['expec_sobre_curso'];
            $como_conheceu = $rg['como_conheceu'];
           
            $curso = returnNameCourse($rg['FK_idCurso'],$con);
            $arrayTelefone = returnAlunoTelefones($aluno_cpf,$con);
            $arrayEndereco = returnAlunoEndereco($aluno_cpf,$con);

            $dataDeNascimentoBRFormat = $dataDeNascimentoUSFormat->format('d/m/Y');
                        
            $telefone1  = $arrayTelefone[$i];
            $telefone2  = $arrayTelefone[$i+1];
            $cep  = $arrayEndereco[$j];
            $rua  = $arrayEndereco[$j+1];
            $bairo  = $arrayEndereco[$j+2];
            $cidade  = $arrayEndereco[$j+3];
            $numeroResidencia  = $arrayEndereco[$j+4];
           
           
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
            $tabela.='<td colspan="2">'.$curso.'</td>';
            $tabela.='</tr>';
           
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
                    <td>$curso</td>
                </tr>
            ";
           
            
            $i++;

        }  


        $tabela.='</tbody>';
        $tabela.='</table>';
        
        $_SESSION['tabela'] = $tabela;
        $_SESSION['arquivo'] = $arquivo;


            echo" 
            </tbody>
            </table>
            </div>
			</body>
		</html>
        ";      
    }
        close_connection($con);

        /* $_SESSION['aluno_cpf'] = $aluno_cpf;            
            $_SESSION['nome'] = $nome;
            $_SESSION['dataDeNascimentoBRFormat'] = $dataDeNascimentoBRFormat;
            $_SESSION['email'] = $email;
            $_SESSION['telefone1'] = $telefone1;
            $_SESSION['telefone2'] = $telefone2;
            $_SESSION['cep'] = $cep;
            $_SESSION['rua'] = $rua;
            $_SESSION['bairo'] = $bairo;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['numeroResidencia'] = $numeroResidencia;
            $_SESSION['curso'] = $curso;*/
?>
