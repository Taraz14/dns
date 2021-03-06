	  <div class="ibox-content">
		 <h2>
			Selamat Datang!
		 </h2>
		 <p>
			Pengisian Form untuk user yang ingin menjalankan analisis Penentuan Status Gizi.
		 </p>

		 <?= form_open('', ["id" => "form", "class" => "wizard-big"]); ?>
			<h1 class="col-lg-4">Biodata</h1>
			<fieldset>
				<h2>Input Biodata Anak</h2>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Nama Orang tua Ayah/Ibu *</label>
							<input id="ot" name="ot" type="text" class="form-control required">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nama Depan Anak *</label>
							<input id="name" name="name" type="text" class="form-control required">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Nama Belakang Anak *</label>
							<input id="lastname" name="lastname" type="text" class="form-control required">
						</div>
					</div>
					<div class="col-sm-3">
						<label>Umur *</label>
						<div class="input-group m-b">
							<input id="umur" type="text" class="form-control touchspin3 text-center" min="1" max="60" value="1" name="umur">
							<div class="input-group-append">
								<span class="input-group-addon">Bulan</span>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<label>Berat Badan *</label>
						<div class="input-group m-b">
							<input id="bb" type="text" class="form-control touchspin3 text-center" min="2" value="2" name="bb">
							<div class="input-group-append">
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<label>Tinggi Badan *</label>
						<div class="input-group m-b">
							<input id="tb" type="text" class="form-control touchspin3 text-center" min="57" value="57" name="tb">
							<div class="input-group-append">
								<span class="input-group-addon">Cm</span>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>No. Telp *</label>
							<input id="tlp" name="tlp" type="text" class="form-control required">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Alamat *</label>
							<input id="address" name="address" type="text" class="form-control required">
						</div>
					</div>
				</div>
			</fieldset>
			<h1>Pertanyaan</h1>
			<fieldset>
				<div id="question-content"></div>
			</fieldset>
			<h1>Review Jawaban</h1>
			<fieldset>
				<div id="info-content"></div>
			</fieldset>
		<?= form_close(); ?>
	</div>
</div>

<script>
	window.onload = () => {
		$("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
            	event.preventDefault();
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }

                if(currentIndex === 2) {
					var ot			= $("input[name=ot]").val();
                	var firtsName   = $("input[name=name]").val();
                	var lastName    = $("input[name=lastname]").val();
                	var address     = $("input[name=address]").val();
                	var umur     	= $("input[name=umur]").val();
                	var kp_id       = $("input[name='kp_id[]']").map(function(){return $(this).val();}).get();
                	var kriteria_id = $("input[name=kriteria_id]").val();

                	if(kp_id.length > 1) {
                		var jawaban = [];
                		var index   = 0;
	                	for (var i = 1; i <= kp_id.length; i++) {
	                		if(typeof($("input[name=jawaban_"+i+"]:checked").val()) == 'undefined') {
	                			alert("Silahkan lenkapi jawaban anda.");
		                		$(this).steps("previous");
		                		return false;
		                	}
							jawaban[index++] = $("input[name=jawaban_"+i+"]:checked").val();
	                		// jawaban[index++] = (typeof(answer) !== 'undefined') ? answer : "";

	                	}
                	}
					else{
						var jawaban = $("input[name='jawaban']:checked").val();
					}

                	$.ajax({
                		url:"<?= site_url('Homepage/getHasil') ?>",
                		data:{
                			firtsName:firtsName,
                			lastName:lastName,
                			address :address,
                			kp_id:kp_id,
								 kriteria_id:kriteria_id,
								//  bobot_jawaban:bobot_jawaban,
                			jawaban:jawaban,
                		},
                		method:"POST",
                		dataType:"json",
                		success:function(res)
                		{
                			$("#info-content").html(res.hasil);
                		}
                	});
                }

				// console.log(currentIndex);
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });

	  	$(document).ready(function(){
		 	// e.preventDefault();
		 	var id = $(this).val();
			getQuestionKriteria(id);
			//  if(id = 1) {
			// 	getQuestionKriteria(id = 1);
		 	// }else{
		 	// }
	  	});

	  	getQuestionKriteria = (id) => {
	  		$.ajax({
	  			url:"<?= site_url('Homepage/getQuestion') ?>",
	  			data:{
	  				id:id
	  			},
	  			dataType:"json",
	  			success:function(res)
	  			{
	  				$("#question-content").html(res.question).find('.i-checks').iCheck({
		               	checkboxClass: 'icheckbox_square-green',
		              	radioClass: 'iradio_square-green',
		            });
	  			}
	  		})
	  	}
	}
</script>