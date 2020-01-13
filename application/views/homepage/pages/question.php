<div class="row">
<?php 
	$klass=(count($content) > 1) ? "col-lg-4" : "col-lg-6";  foreach($content as $qst) : ?>
	
	<div class="<?= $klass; ?>">
		<div class="form-group">
			<strong>Kriteria : <?= $qst["kriteria_name"] ?></strong>
			<label><?= $qst['pertanyaan'] ?> <br/></label>
			<input type="hidden" class="kp_id" id="kp_id" name="kp_id[]" value="<?= $qst['kp_id'] ?>">
			<input type="hidden" class="kriteria_id" id="kriteria_id" name="kriteria_id" value="<?= $qst['kriteria_id'] ?>">
			<input type="hidden" class="bobot" id="bobot" name="bobot[]" value="<?= $qst['bobot'] ?>">
            <?php
			$answer   = HomeModel::findAnswer(["kp_id" => $qst['kp_id']]);
			$no       = 0;
			foreach ($answer as $key) : ?>
				<div class="i-checks"><label> <input type="radio" class="jawaban_input" value="<?= $key['jp_id'] . "-" . $qst['kp_id'] ?>" name="<?= (count($content) > 1) ? "jawaban_".$qst['kp_id'] : "jawaban" ?>"> <i></i> <?= $key['jawaban'] ?> </label></div>
            <?php endforeach;?>
	    </div>
 	</div>

<?php endforeach;?>
</div>