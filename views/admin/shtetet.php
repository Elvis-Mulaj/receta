<?php
	global $admincontroller;
	$edit_shtetin = NULL;
	if(isset($_GET['edit'])){
		$edit_shtetin = $admincontroller->getShtetin($_GET['edit']);
	}
	if(isset($_POST['save'])){
		$admincontroller->shtoEditShtetin();
	}
	
	$shtetet = $admincontroller->getShtetet();
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
			<input type="text" name="emri" placeholder="Emri" value="<?php echo !empty($edit_shtetin) ? $edit_shtetin['emri'] : NULL;?>" required>
			<input type="hidden" name="fotografia" value="<?php echo !empty($edit_shtetin) ? $edit_shtetin['fotografia'] : NULL;?>">
			<input type="file" name="fotografia">
			<?php 

				if(!empty($edit_shtetin['fotografia'])){
					echo '<img src="'. WEB_PATH . 'uploads/' . $edit_shtetin['fotografia'] .'" width="100px" style="margin-bottom:20px;">';
				}

			?>
			<input type="submit" name="save" value="Ruaj">
		</form>
	</div>
	<table>
		<tr>
			<th>Emri</th>
			<th>Ndrysho</th>
		</tr>
		<?php foreach($shtetet as $shteti): ?>
			<tr>
				<td><?php echo $shteti['emri']; ?></td>
				<td><a href="<?php echo WEB_PATH . 'admin.php?template=shtetet&edit=' . $shteti['id'] ?>">Ndrysho</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>