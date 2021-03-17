<?php
	global $admincontroller;
	$edit_kategoria = NULL;
	if(isset($_GET['edit'])){
		$edit_kategoria = $admincontroller->getKategorine($_GET['edit']);
	}
	if(isset($_POST['save'])){
		$admincontroller->shtoEditKategori();
	}
	
	$kategorite = $admincontroller->getKategorite();
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
	<div class="w-60">
		<form method="POST" class="receta-form" enctype="multipart/form-data">
			<?php
				
			?>
			<input type="text" name="emri" placeholder="Emri" value="<?php echo !empty($edit_kategoria) ? $edit_kategoria['emri'] : NULL;?>" required>
			<textarea name="pershkrimi" placeholder="Pershkrimi"><?php echo !empty($edit_kategoria) ? $edit_kategoria['pershkrimi'] : NULL;?></textarea>
			<input type="submit" name="save" value="Ruaj">
		</form>
	</div>
	<table>
		<tr>
			<th>Emri</th>
			<th>Pershkrimi</th>
			<th>Ndrysho</th>
		</tr>
		<?php foreach($kategorite as $kategoria): ?>
			<tr>
				<td><?php echo $kategoria['emri']; ?></td>
				<td><?php echo $kategoria['pershkrimi']; ?></td>
				<td><a href="<?php echo WEB_PATH . 'admin.php?template=kategorite&edit=' . $kategoria['id'] ?>">Ndrysho</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>