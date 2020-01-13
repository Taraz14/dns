<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <?php if(!empty($this->session->flashdata('message'))) : ?>
        	<div class="alert alert-info alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif;?>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Data <?= $title; ?></h5>
                <div class="ibox-tools">
                    <a href="<?= site_url('0/alternatif/create') ?>" class="btn btn-primary" id="btn-create-alternatif" type="button">Tambah Alternatif</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
		            <table class="table table-striped table-bordered table-hover dataTables-alternatif" width="100%">
			            <thead>
				            <tr>
				                <th width="8%">No</th>
				                <th width="72%">Alternatif</th>
				                <th width="20%">#</th>
				            </tr>
			            </thead>
			            <tbody>
		            	<?php $no=1; foreach($alternatif as $rows) : ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $rows['alternatif_name']; ?></td>
								<td style="text-align: center">
									<a href="<?= site_url('0/alternatif/update/'.$rows['alternatif_id']) ?>" class="btn btn-info"> Update</a>
									<button type="button" data-name="<?= $rows['alternatif_name']; ?>" id="<?= $rows['alternatif_id'] ?>" class="btn btn-danger btn-delete-alternatif"> Delete</button>
								</td>
							</tr>
		            	<?php endforeach; ?>
			            </tbody>
		            </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
	window.onload = () => {
		$('.dataTables-alternatif').DataTable({
			columnDefs:[
				{
					targets:[0,2],
					orderable:false
				}
			]
		});

		$(document).on('click','.btn-delete-alternatif',function(e){
			e.preventDefault();
			var id   = $(this).attr("id");
			var name = $(this).data("name");
			if(confirm("Hapus Data " + name + " ?")){
				$.ajax({
					url:"<?= site_url('0/alternatif/delete') ?>",
					method:"GET",
					data:{
						id:id
					},
					dataType:"json",
					success:function(res)
					{
						if(res.status == true) {
							window.location.reload();
						}else{
							alert("Data " +name+ " gagal dihapus.");
						}
					}
				})
			}
		});
	}
</script>