<?php  
	$conexao_bd = new mysqli("localhost",
	"root","","criancas");

	// if ($conexao_bd == true) {
	// 	// echo "Conectado com sucesso";
	// } else {
	// 	echo "Conexão falhou";
	// }
		
	
	if(isset($_POST['pnome']) && $_POST['pnome'] <> ''){
		$sql = "SELECT * FROM cadastro
			WHERE 
			nomecompleto LIKE '%".$_POST['pnome']."%'
			";
		
		$sql_crianca = "SELECT nomecompleto AS 'crianca'
			FROM cadastro
			WHERE id=(SELECT max(id) FROM cadastro WHERE
			nomecompleto LIKE '%".$_POST['pnome']."%' )
			";

		$sql_sus = "SELECT numerodosus AS 'sus'
			FROM cadastro
			WHERE id=(SELECT max(id) FROM cadastro 
			WHERE nomecompleto LIKE '%".$_POST['pnome']."%' )
			";

		$sql_nascimento = "SELECT datanascimento AS 'nascimento'
			FROM cadastro
			WHERE id=(SELECT max(id) FROM cadastro WHERE
			nomecompleto LIKE '%".$_POST['pnome']."%' );
			";	
	}else{
		$sql = "SELECT * FROM cadastro";

		$sql_crianca = "SELECT nomecompleto  AS 'crianca'
			FROM cadastro
			WHERE
			id=(SELECT max(id) FROM cadastro)
			";

		$sql_sus = "SELECT numerodosus AS 'sus'
			FROM cadastro
			WHERE
			id=(SELECT max(id) FROM cadastro)
			";

		$sql_nascimento = "SELECT datanascimento AS 'nascimento'
			FROM cadastro
			WHERE
			id=(SELECT max(id) FROM cadastro)
			";
	}


	$result = mysqli_query($conexao_bd,$sql);

$header_children = ''; 
$header_sus = ''; 
$header_birth = ''; 	 

	$result_crianca = mysqli_query($conexao_bd, $sql_crianca);
	foreach ($result_crianca as $registro){
		$header_children =  $registro['crianca'] ;			
	}
	
	$result_sus = mysqli_query($conexao_bd, $sql_sus);
	foreach ($result_sus as $registro) {
		$header_sus = $registro['sus'];
	}

	$result_nascimento = mysqli_query($conexao_bd, $sql_nascimento);
	foreach ($result_nascimento as $registro) {
		$header_birth = $registro['nascimento'];
	}
	

	function dataHora_pt($data=''){
		$data = date('d/m/Y H:i:s', strtotime($data));
		return $data;
	}
	function data_pt($data=''){
		$data = date('d/m/Y', strtotime($data));
		return $data;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>YouVacinas</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/
	bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

	<link rel="shortcut icon" href="assets/icon.png">
	<link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>	
	<div class="container-header"> 
		<div class="content-header">
			<img src="assets/logoofc.png">		
			<strong>YouVacinas</strong>	

			<!-- Botão para acionar modal -->
			<button type="button"  data-toggle="modal" data-target="#modalExemplo">Novo Cadastro</button>
		</div>
	</div>

	<div class="main">
		<div class="content-main">
				<div class="item-dashboard">
					<div>
						<p>Última Criança</p>
						<img src="assets/children.png" alt="">
					</div>
						<strong><?php echo ($header_children) ?></strong>
				</div>

				<div class="item-dashboard">
					<div>
						<p>Número do SUS</p>
						<img src="assets/numero.png" alt="">
					</div>	
						<strong><?php echo ($header_sus) ?></strong>
				</div>

				<div class="item-dashboard  hightlight" >
					<div>
						<p>Data de Nascimento</p>
						<img src="assets/nasc.png" alt="">
					</div>				
						<strong><?php 
						if ($header_birth <> ''){
							echo str_replace("-", "/", data_pt($header_birth));
						}
						?></strong>
				</div>	
		</div>

	<?php
	
	?>
<form class="formfiltro" method="post">
		<div id="pesqnome">
			<input id="pesquisa" type="text" name="pnome" placeholder="Pesquisar Nome">
			<button type="submit" id="butaofiltro">PESQUISAR</button>
		</div>
		<div id="imgpesq">
			<img src="assets/pesquisar.png" alt="pesquisa">
		</div>
</form>	


		<div class="content-table">
			<table>
				<thead>
					<tr>
						<th>Nome Completo</th>
						<th>Nome da Mãe</th>
						<th>Data de Nascimento</th>
						<th>Número do SUS</th>
						<th>Vacina</th>
						<th>Data de Registro</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($result as $linha) {
						echo "<tr>
								<td class='title'>".$linha['nomecompleto']."</td>
								<td class='title'>".$linha['nomedamae']."</td>
								<td>".data_pt($linha['datanascimento'])."</td>
								<td id='num'>".$linha['numerodosus']."</td>
								<td class='title'>".$linha['vacinaatomar']."</td>
								<td>".dataHora_pt($linha['datacadastro'])."</td>
							</tr>";
					}	
					?>
				</tbody>
			</table>
		</div>
<?php
if(isset($_POST['exnome']) && $_POST['exnome'] <> ''){
	$sql = "DELETE FROM cadastro WHERE 
	nomecompleto LIKE '%".$_POST['exnome']."%'
		";
	header("refresh:0, index.php");
}else{
	$sql = "SELECT * FROM cadastro";
}

$result = mysqli_query($conexao_bd,$sql);

?>
<form class="formfiltro" method="post">
	<div id="pesqnome">
		<input id="pesquisa" type="text" name="exnome" placeholder="Excluir Registro">
		<button type="submit" id="butaofiltro">EXCLUIR</button>
	</div>
	<div id="imglixo">
			<img src="assets/lixeira.png" alt="lixeira">
	</div>
</form>

		<!-- Modal -->
		<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Criança</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
		        	<img src="assets/close.png" alt="">
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form method="post" action="salvar.php">
		      		<div class="form-body-input">
		      			<div class="input">
		      				<input type="text" placeholder="Nome Completo" name="nomecompleto" required>
		      			</div>
		      			<div class="input">
		      				<input type="text" placeholder="Nome da Mãe" name="nomedamae" required>
		      			</div>
			        	<div>
							<label for="datanascimento">Data de Nascimento: </label>
			        		<input type="date" id="entrada" value="entrada" name="datanascimento" required>
			        	</div>
			        	<div class="input">
		      				<input type="text" placeholder="Número do SUS" name="numerodosus" required>
		      			</div>
						<div>
								<select  id="vacina" name="vacinaatomar" required>
									<option id="vacina1" selected disabled value="">Vacina</option>
									<option>BCG-ID</option>
									<option>Hepatite B - 1ª dose</option>
									<option>Hepatite B - 2ª dose</option>
									<option>Tetravalente (DTP + Hib) - 1ª dose</option>
									<option>VOP (vacina oral contra a poliomielite, Sabin) - 1ª dose</option>
									<option>VORH (vacina oral contra rotavírus humano) - 1ª dose</option>
									<option>Antipneumocócica 10 valente conjugada - 1ª dose</option>
									<option>Antimeningocócica C conjugada - 1ª dose</option>
									<option>Tetravalente (DTP + Hib) - 2ª dose</option>
									<option>VOP (vacina oral contra a poliomielite, Sabin) - 2ª dose</option>
									<option>VORH (vacina oral contra rotavírus humano) - 2ª dose</option>
									<option>Antipneumocócica 10 valente conjugada - 2ª dose</option>
								</select>
            			</div>
		      			<div class="cadastrar">
		      				<button type="submit" class="btn-cadastrar">Cadastrar</button>
		      			</div>			        
		      		</div>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  	
</body>
</html>