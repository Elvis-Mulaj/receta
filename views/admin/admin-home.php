<?php
	global $admincontroller;

	if(isset($_GET['aprovo'])){
		$admincontroller->aproveReceten($_GET['aprovo']);
	}

	if(isset($_GET['balline'])){
		$admincontroller->ShtoBalline($_GET['balline']);
	}

	if(isset($_GET['fshije'])){
		$admincontroller->delete('recetat',$_GET['fshije']);
	}
	

	$recetat = $admincontroller->getRecetat(100);
?>
<style>
	table {
		width:100%;
		margin-bottom: 30px;
	}
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td {
		padding: 10px;
		text-align: left;
	}
	table tr:nth-child(even) {
		background-color: #eee;
	}
	table tr:nth-child(odd) {
		background-color: #fff;
	}
	table th {
		background-color: #9f9f9f;
		color: #000;
	}
</style>
<div class="mid-grid">
	<table>
		<tr>
			<th>Titulli</th>
			<th>Kategoria</th>
			<th>Autori</th>
			<th>Linku</th>
			<th>Publiko</th>
			<th>Balline</th>
			<th>Fshije</th>
		</tr>
		<?php foreach($recetat as $receta): ?>
			<tr>
				<td><?php echo $receta['titulli']; ?></td>
				<td><?php echo $receta['kategoria_emri']; ?></td>
				<td><?php echo $receta['user_emri']; ?></td>
				<td><a href="<?php echo $receta['url']; ?>" target="_blank"><?php echo $receta['titulli']; ?></a></td>
				<td><a href="<?php echo WEB_PATH . 'admin.php?aprovo=' . $receta['id'] ?>"><?php echo $receta['aprovuar'] == 1 ? 'Largo' : 'Aprovo'; ?></a></td>
				<td><a href="<?php echo WEB_PATH . 'admin.php?balline=' . $receta['id'] ?>"><?php echo $receta['balline'] == 1 ? 'Largo' : 'Shto'; ?></a></td>
				<td><a href="<?php echo WEB_PATH . 'admin.php?fshije=' . $receta['id'] ?>" onclick="return confirm('A jeni i sigurte?');">Fshije</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>