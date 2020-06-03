
<?php
  include 'conexao.php';
  $conectar = getConnection();
?>

<?php
    //$sql = 'INSERT INTO produto (descricao,qtd,valor) VALUES (:desc,:qtd,:valor)';
    $sql = 'INSERT INTO conta (plataforma,usuario,senha) VALUES (:plataforma,:usuario,:senha)';


    $plataforma = $_POST["plataforma"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
  

    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(':plataforma', $plataforma);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);

    if($stmt->execute()){
        header("location:index.php");
    }else{
        echo ' Erro ao salvar!';
        //die($stmt->execute());
    }

?>

