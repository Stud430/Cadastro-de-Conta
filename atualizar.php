
<?php
  include 'conexao.php';
  $conectar = getConnection();
?>

<?php

    if(isset($_POST['update_item'])){
        $sql = 'UPDATE conta SET plataforma = :plataforma, usuario = :usuario, senha = :senha WHERE id = :id';

        $id = $_POST["conta_id"];
        $plataforma = $_POST["plataforma"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(':plataforma', $plataforma);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            header("Location: index.php");
        }else{
            echo 'Erro ao atualizar!';
        }
    }    
?>


<!-- https://www.youtube.com/watch?v=Aq1M_awGlAg -->
























