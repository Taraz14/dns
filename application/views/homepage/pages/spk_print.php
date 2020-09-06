<!-- <style>
    @media print {
        body img {
            width: 100%;
            height: auto;
            max-width: 1048px;
        }

        .page {
            page-break-after: always;
        }
    }
</style> -->
            <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>SPK-PSG:</h3>
                                    <address>
                                        <strong>Penentuan Status Gizi</strong><br>
                                        Jl. Wortel, Kelurahan Malasom,<br>
                                        Aimas, Kabupaten Sorong<br>
                                        <abbr title="Phone">P:</abbr> +62 813-4440-7079
                                    </address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Nomor Lap.</h4>
                                    <h4 class="text-navy">DNS-<?= rand(1000, 9999)?>-92</h4>
                                    <span>Atas Nama :</span>
                                    <address>
                                        <strong><?= $nama; ?></strong><br>
                                        Nama Orangtua :<br>
                                        <strong><?= $nama_ot?></strong><br>
                                        Umur : <?= $umur; ?><br/>
                                        BB : <?= $bb.' kg'; ?><br/>
                                        TB : <?= $tb.' cm';?><br/>
                                        <abbr title="Phone">P:</abbr> <?= $tlp?>
                                    </address>
                                    <p>
                                        <span><strong>Tanggal SPK :</strong> <?= date("d-M-Y");?></span><br/>
                                        <!-- <span><strong>Due Date:</strong> March 24, 2014</span> -->
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Pertanyaan</th>
                                        <th>Bobot Pertanyaan</th>
                                        <th>Jawaban</th>
                                        <th>Bobot Jawaban</th>
                                        <th>Bobot Kriteria</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for($i = 0; $i<count($quest); $i++){ ?>
                                    <tr>
                                        <td><div><?= $quest[$i]; ?></div></td>
                                        <td><?= $kpb[$i].'%'?></td>
                                        <td>
                                            <?php
                                                if($bobot[$i] == 1){echo 'Tidak Pernah';}
                                                if($bobot[$i] == 2){echo 'Kadang-kadang';}
                                                if($bobot[$i] == 3){echo 'Sering';}
                                                if($bobot[$i] == 4){echo 'Selalu';}
                                            ?>
                                        </td>
                                        <td><?= $bobot[$i]; ?></td>
                                        <td><?= $hasil[$i]?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->
<div class="page">
                            <div class="table-responsive m-t">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="15">Pembobotan Alternatif</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0; $i<count($hu); $i++){ ?>
                                            <td class="text-center"><?= round($hu[$i], 2)?></td>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> 
                            <!-- /table-responsive -->
                            <div class="row">    
                                <div class="col-md-6">
                                    <table class="table invoice-total">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Ketentuan Gizi : </th>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Gizi Lebih >= 1.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Gizi Baik 0.61 - 0.99</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Gizi Kurang 0.26 - 0.60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">Gizi Buruk 0 - 0.25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table invoice-total">
                                        <tbody>
                                        <tr>
                                            <td><strong>Digit Hasil :</strong></td>
                                            <td> <?= round($tot, 2); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Keterangan :</strong></td>
                                            <td><?= $gizi; ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
</div>

    <script type="text/javascript">
        window.print();
    </script>