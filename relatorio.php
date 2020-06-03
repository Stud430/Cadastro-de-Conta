<?php
	include_once("conexao.php");
	$conectar = getConnection();
?>

<?php

	$relatorio = "SELECT * FROM conta order by id";
	$resultado = $conectar->prepare($relatorio);
	$resultado->execute();

	$html = "<table align=left>";
	$html .= "<body>";

	while ($consulta = $resultado->fetch(PDO::FETCH_ASSOC)) {
		
	$html .= "<tr>" . "<td>" . "<br><br> ID: " . "</td>" . "<td> <br><br>" . $consulta["id"] . "</td></tr>";
	$html .= "<tr>" . "<td>" . "Plataforma: " . "</td>" . "<td>" . $consulta["plataforma"] . "</td></tr>";
	$html .= "<tr>" . "<td>" . "Usuário: " . "</td>" . "<td>" . $consulta["usuario"] . "</td></tr>";
	$html .= "<tr>" . "<td>" . "Senha: " . "</td>" . "<td>" . $consulta["senha"] . "</td></tr>";
		
	}

	$html .= "</body>";
	$html .= "</table>";

	use Dompdf\Dompdf;

	require_once("dompdf/autoload.inc.php");

	$dompdf = new DOMPDF();
	$dompdf->setPaper('A4','portrait');
	$dompdf->load_html('<h2> Lista de Contas </h2>' . $html . ' ');
	$dompdf->render();
	$dompdf->stream("descrevendo.pdf",
					 array(
					       "Attachment" => false
					 )
					);

?>