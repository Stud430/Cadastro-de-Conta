

<?php
  include 'conexao.php';
  $conectar = getConnection();
?>

<?php

// Consulta ao banco de dados
  $listagem = "SELECT id, plataforma, usuario, senha ";
  $listagem .= "FROM conta";
  
  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title> Cadastro de Conta </title>

	<!-- Link Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">

</head>







<body>
	<center>
		<form action="cadastrar.php" method="POST">
			<br>
			<label> Plataforma: </label>
			<input type="text" name="plataforma">
			<label> Usuário: </label>
			<input type="text" name="usuario">
			<label> Senha: </label>
			<input type="text" name="senha">

			<button type="submit" class="btn btn-success">Success</button>
		</form>

		<a href="relatorio.php">
      		Relatório
    	</a>
	</center>

	<hr>
	<br>


	<?php
	  while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	?>
	<center>
	    <br>
	       <label> <b>Plataforma:</b> <?php echo $linha["plataforma"] ?> </label> 	
	       <label> <b>Usuário:</b> <?php echo $linha["usuario"] ?> </label>  
	       <label> <b>Senha:</b> <?php echo $linha["senha"] ?> </label> 

	       	<a href="#edit<?php echo $linha['id'];?>" data-toggle="modal">
		      <button type='submit' class="btn btn-warning btn-sm">
		          Atualizar       
		      </button>
		    </a>


		    <!--Edit Item Modal -->
		                    <div id="edit<?php echo $linha['id']; ?>" class="modal fade" role="dialog">
		                        <form method="post" class="form-horizontal" action="atualizar.php">
		                            <div class="modal-dialog modal-lg">
		                                <!-- Modal content-->
		                                <div class="modal-content">
		                                    <div class="modal-header">
		                                        <h3>Atualizar</h3>
		                                        <button class="close" data-dismiss="modal">
		                                            <span>&times;</span>
		                                        </button>
		                                    </div>
		                                                    
		                                    <div class="modal-body">
		                                        <input type="hidden" name="conta_id" value="<?php echo $linha['id']; ?>">
		                                        <div class="form-row">
		                                          <label class="control-label col-sm-2" for="item_code">Plataforma:</label>
		                                          <input type="text" name="plataforma" value="<?php echo $linha['plataforma']; ?>"> 
		                                        </div>

		                                        <div class="form-row">
		                                          <label class="control-label col-sm-2" for="item_code">Usuário:</label>
		                                          <input type="text" name="usuario" value="<?php echo $linha['usuario']; ?>"> 
		                                        </div> 

		                                        <div class="form-row">
		                                          <label class="control-label col-sm-2" for="item_code">Senha:</label>
		                                          <input type="text" name="senha" value="<?php echo $linha['senha']; ?>"> 
		                                        </div>  
		                                    </div>

		                                    <div id='botao'>
		                                    <button type="submit" class="btn btn-warning" name="update_item"> 
		                                            Atualizar
		                                    </button>

		                                  </div>
		                                  <br>
		                                </div>
		                                </div>
		                            </div>
		                        </form>
		                    </div>

		                <a class="btn btn-danger btn-sm" href="excluir.php?id=<?php echo $linha['id']?>">  
		                	Excluir
		            	</a>
	    <br>
	</center>    
	<?php
	  }
	?> 



</body>



<!-- Permite o MODAL funcionar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</html>