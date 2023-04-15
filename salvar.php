<?php  
	
	$nomecompleto = $_POST['nomecompleto'];
	$nomedamae = $_POST['nomedamae'];
	$datanascimento = $_POST['datanascimento'];
	$numerodosus = $_POST['numerodosus'];
	$vacinaatomar = $_POST['vacinaatomar'];
	date_default_timezone_set('America/Sao_Paulo');
	$datacadastro = date("Y-m-d H:i:s");

	$conexao_bd = new mysqli("localhost","root","","criancas");
	
	$sql = "INSERT INTO cadastro(
		nomecompleto,
		nomedamae,
		datanascimento,
		numerodosus,
		vacinaatomar,
		datacadastro
	)
	VALUES(
		'$nomecompleto',
		'$nomedamae',
		'$datanascimento',
		$numerodosus,
		'$vacinaatomar',
		'$datacadastro'
	)";

	
	$result = mysqli_query($conexao_bd, $sql) ;
	
	if ($result == true) {
		// echo "Registro inserido com sucesso";
	} else {
		echo "FALHA AO INSERIR REGISTRO <br>VÁ PARA BANCO DE DADOS</br> <br>OU</br> <br>CHAME ALGUM ESPECIALISTA</br>";
	}

	header("refresh:0, index.php");
?>

