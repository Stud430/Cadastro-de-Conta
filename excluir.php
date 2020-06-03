
<?php
	include 'conexao.php';
	$conectar = getConnection();
?>

<?php
  // pega o ID da URL
  $id = isset($_GET['id']) ? $_GET['id'] : null;
   
  // valida o ID
  if (empty($id))
  {
      echo "ID não informado";
      exit;
  }
   
  // remove do banco
  $sql = "DELETE FROM conta WHERE id = :id";
  
  $stmt = $conectar->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
  if ($stmt->execute())
  {
      header('Location: index.php');
      //echo "<script> document.location.href = 'imc.php'; </script>";
  }
  else
  {
      echo "Erro ao remover";
      print_r($stmt->errorInfo());
  }   


 /*Referëncia: http://blog.ultimatephp.com.br/sistema-de-cadastro-php-mysql-pdo/*/
?>php