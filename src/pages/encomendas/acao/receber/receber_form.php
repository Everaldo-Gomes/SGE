<?php

$title = 'SGC - Receber';
include("../../../../routers.php");
include("../../../../template/top.php");

session_start();
?>

<head><link rel="stylesheet" href="./receber.css"></head>

<div class="encomenda_info">
	<div class="encomenda_box">
		<h3 class="e_info">Sobre a encomenda</h3>
		<hr class="hr_top">
		<label>
			<div class="e_info">
				Nome </br>
				<?php echo $_SESSION['encomenda_info'][1]; ?>
			</div></br>
			<div class="e_info">
				Endereço de Entrega </br>
				<?php echo $_SESSION['destinatario_info'][4]; ?>
			</div></br>
			<div class="e_info">
				Data Entrega </br>
				<?php echo $_SESSION['encomenda_info'][5]; ?>
			</div></br>
			<div class="e_info">
				Status </br>
				<?php echo $_SESSION['encomenda_info'][6] == 0 ? "A caminho" : "Entregue"; ?>
			</div></br>
		</label>
	</div>
	<div class="entregador_box">
		<h3 class="e_info">Sobre o entregador</h3>
		<hr class="hr_top">
		
		<!-- O CASO EM QUE NENHUM ENTREGADOR SE OFERECEU PARA ENTREGAR SUA ENCOMENDA-->
		<?php

		$id_logado = $_SESSION['morador_logado'][0]; 

		if ($id_logado != $_SESSION['encomenda_info'][3]) {

			echo "
            <div class='e_info'> 
			    Nome </br> 
                {$_SESSION['entregador_info'][1]} 
            </div></br>
			<div class='e_info'> 
   			    Telefone </br> 
                {$_SESSION['entregador_info'][3]} 
            </div></br>
			<div class='e_info'> 
                Endereço </br> 
                {$_SESSION['entregador_info'][4]} 
            </div></br>
			";
		}
		else {
			echo "<div class='e_info'> Ninguém está com sua encomenda. </div>";
		}
		?>
	</div>
</div>


<script src="./receber.js"></script>
<?php include("../../../../template/bottom.php"); unset($_SESSION['encomenda_info']); unset($_SESSION['entregador_info']); unset($_SESSION['destinatario_info']);?>
