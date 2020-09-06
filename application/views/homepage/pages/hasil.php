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
				<!-- <th>Keterangan</th> -->
			</thead>
			<tbody>
				<?php foreach ($pertanyaan as $rows) : ?>
					<tr>
						<td><?= $rows['pertanyaan'] ?></td>
						<td><?= $rows['jawaban'] ?></td>
						<td class="text-center"><?= $rows['bobot_pertanyaan'] ?></td>
						<td class="text-center"><?= $rows['bobot_jawaban'] ?></td><input type="hidden" name="bj[]" value="<?= $rows['bobot_jawaban'] ?>">
						<!-- <td><?= $rows['keterangan'] ?></td> -->
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>