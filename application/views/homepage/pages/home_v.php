	  <div class="ibox-content">
		 <h2>
			Selamat Datang di DNS!
		 </h2>
		 <p>
			Pengisian Form untuk user yang ingin menjalankan analisis SPK.
		 </p>

		 <?= form_open('', ["id" => "form", "class" => "wizard-big"]); ?>
			<h1 class="col-lg-4">Biodata</h1>
			<fieldset>
				<h2>Input Biodata</h2>
				<div class="row">
					 <div class="col-lg-6">
						<div class="form-group">
							<label>Nama Depan *</label>
							<input id="name" name="name" type="text" class="form-control required">
						</div>
					 </div>
					 <div class="col-lg-6">
						<div class="form-group">
							<label>Nama Belakang *</label>
							<input id="lastname" name="lastname" type="text" class="form-control required">
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
			<h1>Sample Pertanyaan</h1>
			<fieldset>
				<div id="question-content"></div>
			</fieldset>
			<h1>Info Hasil</h1>
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
                	var firtsName   = $("input[name=name]").val();
                	var lastName    = $("input[name=lastname]").val();
                	var address     = $("input[name=address]").val();
                	var kp_id       = $("input[name='kp_id[]']").map(function(){return $(this).val();}).get();
                	var kriteria_id = $("input[name=kriteria_id]").val();
                	
                	if(kp_id.length > 1) {
                		var jawaban = [];
                		var index   = 0;
	                	for (var i = 1; i <= kp_id.length; i++) {
	                		jawaban[index++] =  $("input[name=jawaban_"+i+"]:checked").val();
	                	}
                	}else{
                		var jawaban = $("input[name='jawaban']:checked").val();
                	}
                	
                	$.ajax({
                		url:"<?= site_url('get-hasil') ?>",
                		data:{
                			firtsName:firtsName,
                			lastName:lastName,
                			address :address,
                			kp_id:kp_id,
                			kriteria_id:kriteria_id,
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
			 if(id = 1) {
				getQuestionKriteria(id = 1);
		 	}else{
		 		getQuestionKriteria(id);
		 	}
	  	});

	  	getQuestionKriteria = (id) => {
	  		$.ajax({
	  			url:"<?= site_url('get-question') ?>",
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