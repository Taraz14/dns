<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Tambah <?= $title; ?></h5>
                    <div class="ibox-tools">
                        <a href="<?= site_url('0/kriteria') ?>" class="btn btn-primary" id="btn-create-kriteria" type="button">Kembali</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?= form_open(''); ?>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Nama Kriteria</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nama Kriteria" name="name" class="form-control" value="<?= $kriteria['kriteria_name'] ?>">
                            <?= form_error('name', '<small class="form-text m-b-none text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Bobot</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Bobot" name="bobot" class="form-control" value="<?= $kriteria['kriteria_bobot'] ?>">
                            <?= form_error('bobot', '<small class="form-text m-b-none text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-info" type="submit">Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>