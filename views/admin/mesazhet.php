<?php
	global $admincontroller;
	$mesazhet = $admincontroller->getMesazhet();
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
			<th>Emri Mbiemri</th>
			<th>Email</th>
			<th>Nr tel</th>
			<th>Mesazhi</th>
		</tr>
		<?php foreach($mesazhet as $mesazhi): ?>
			<tr>
				<td><?php echo $mesazhi['emri_mbiemri']; ?></td>
				<td><?php echo $mesazhi['email']; ?></td>
				<td><?php echo $mesazhi['nr_tel']; ?></td>
				<td><?php echo $mesazhi['mesazhi']; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>