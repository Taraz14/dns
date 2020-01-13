<div class="row">
	<div class="col-lg-12">
		<table class="table-borderless" width="100%">
			<tr>
				<th width="20%">Nama</th>	
				<td width="80%"> : <?= $user['firtsName'] . " " . $user['lastName'] ?></td>	
			</tr>
			<tr>
				<th width="20%">Alamat</th>	
				<td width="80%"> : <?= $user['address'] ?></td>	
			</tr>
		</table>
		<table class="table">
			<thead>
				<th>Pertanyaan</th>
				<th>Jawaban</th>
				<th>Bobot Pertanyaan</th>
				<th>Bobot Jawaban</th>
				<th>Keterangan</th>
			</thead>
			<tbody>
				<?php foreach($pertanyaan as $rows) : ?>
				<tr>
					<td><?= $rows['pertanyaan'] ?></td>
					<td><?= $rows['jawaban'] ?></td>
					<td><?= $rows['bobot_pertanyaan'] ?></td>
					<td><?= $rows['bobot_jawaban'] ?></td>
					<td><?= $rows['keterangan'] ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
 	</div>
</div>