<div class="row">
	<div class="col-sm-6">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4">Keterangan Point : </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Selalu = 4</td>
					<td>Sering = 3</td>
					<td>Kadang-kadang = 2</td>
					<td>Tidak Pernah = 1 </td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-lg-12">
		<table class="table-hover table-bordered" width="100%">
			<thead>
				<tr>
					<th>Pertanyaan</th>
					<th class="text-right">Selalu</th>
					<th class="text-center">4</th>
					<th class="text-center">3</th>
					<th class="text-center">2</th>
					<th class="text-center">1</th>
					<th>Tidak Pernah</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$temp = "";
				$klass = (count($content) > 1) ? "col-lg-4" : "col-lg-6";
				foreach ($content as $qst) : ?>
					<tr>
						<td style="text-align: center;vertical-align: middle;background-color: rgba(0, 0, 0, 0.075);" colspan="8">
							<strong><?php
											if ($temp !== $qst['kriteria_name'])
												echo $qst['kriteria_name'];
											$temp = $qst['kriteria_name'];
											?></strong>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<!-- <b><?= $qst['kriteria_name'] ?></b> -->
							<?= $qst['pertanyaan'] ?>
						</td>
						<!-- <td></td> -->
						<input type="hidden" class="kp_id" id="kp_id" name="kp_id[]" value="<?= $qst['kp_id'] ?>">
						<input type="hidden" class="kriteria_id" id="kriteria_id" name="kriteria_id[]" value="<?= $qst['kriteria_id'] ?>">
						<input type="hidden" class="bobot" id="bobot" name="bobot[]" value="<?= $qst['bobot'] ?>">
						<input type="hidden" class="kriteria_bobot" id="kriteria_bobot" name="kriteria_bobot[]" value="<?= $qst['kriteria_bobot'] ?>">
						<?php
						$answer   = HomeModel::findAnswer(["kp_id" => $qst['kp_id']]);
						$no       = 0;
						foreach ($answer as $key) : ?>
							<td>
								<div class="i-checks text-center"><label> <input type="radio" class="jawaban_input" value="<?= $key['jp_id'] . "-" . $qst['kp_id'] ?>" name="<?= (count($content) > 1) ? "jawaban_" . $qst['kp_id'] : "jawaban" ?>"> <i></i></label></div>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>