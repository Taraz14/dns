<?php 
    $arr = [
        'sangat setuju' => 5,
        'setuju' => 3,
        'kurang setuju' => 2,
        'tidak setuju' => 1
    ];

    if($_SERVER['REQUEST_URI'] === TRUE){
        redirect('', 'refresh');
    }

?>
<form method="post" action="<?= site_url('spk')?>">
    <input type="hidden" name="nama" value="<?= $name; ?>">
    <input type="hidden" name="lastnama" value="<?= $lastname; ?>">
    <input type="hidden" name="nama_ot" value="<?= $nama_ot; ?>">
    <input type="hidden" name="umur" value="<?= $umur; ?>">
    <input type="hidden" name="bb" value="<?= $bb; ?>">
    <input type="hidden" name="tb" value="<?= $tb; ?>">
    <input type="hidden" name="tlp" value="<?= $tlp; ?>">


            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-8">
                    <h2>Hasil SPK</h2>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <button type="submit" formtarget="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print SPK </button>
                    </div>
                </div>

            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>SPK-PSG:</h5>
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
                                        <strong><?= $name.' '.$lastname; ?></strong><br>
                                        Nama Orangtua :<br>
                                        <strong><?= $nama_ot?></strong><br>
                                        Umur : <?= $umur; ?><br/>
                                        BB : <?= $bb.' kg'; ?><br/>
                                        TB : <?= $tb.' cm'; ?><br/>
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
                                    <?php foreach ($quest as $q) : ?>
                                    <tr>
                                        <td><div><?= $q['pertanyaan']?></div></td>
                                        <td><?= $q['kpb'].'%'?></td>
                                        <input type="hidden" name="pertanyaan[]" value="<?= $q['pertanyaan']?>">
                                        <input type="hidden" name="kpb[]" value="<?= $q['kpb']?>">
                                        <td>
                                            <?php
                                                if($q['bobot'] == 1){echo 'Tidak Pernah';}
                                                if($q['bobot'] == 2){echo 'Kadang-kadang';}
                                                if($q['bobot'] == 3){echo 'Sering';}
                                                if($q['bobot'] == 4){echo 'Selalu';}
                                            ?>
                                        </td>
                                        <td><?= $q['bobot']; ?></td>
                                        <td><?= $q['hasil']?></td>
                                        <input type="hidden" name="bobot[]" value="<?= $q['bobot']?>">
                                        <input type="hidden" name="hasil[]" value="<?= $q['hasil']?>">
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <div class="table-responsive m-t">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center" colspan="15">Pembobotan Alternatif</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        for($i = 0; $i<count($bobot); $i++){
                                            // var_dump();
                                            $hu[$i] = $bobot[$i]/$ksak['c'.($i+1)];
                                            $wr[$i] = $hu[$i]*$hasil[$i];
                                  
                                        // echo $tot;
                                    ?>
                                    <input type="hidden" name="hu[]" value="<?= $hu[$i]?>">
                                    <td class="text-center"><?= $hu[$i]?></td>
                                    <?php  
                                        }
                                    ?>
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
                                            <td>
                                                <?php
                                                $tot = array_sum($wr);
                                                // echo array_sum($total);
                                                $stot = round($tot, 2);
                                                // $stot = $tot;
                                                echo $stot;
                                                ?>
                                                <input type="hidden" name="tot" value="<?= $stot;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Keterangan :</strong></td>
                                            <td>
                                                <?php
                                                    if($stot < 0.26){
                                                        $gizi = 'Gizi Buruk';
                                                        echo $gizi;
                                                    }elseif ($stot > 0.25 && $stot < 0.61) {
                                                        $gizi = 'Gizi Kurang';
                                                        echo $gizi;
                                                    }elseif ($stot > 0.60 && $stot < 1.00) {
                                                        $gizi = 'Gizi Baik';
                                                        echo $gizi;
                                                    }elseif($stot >= 1.00) {
                                                        $gizi = 'Gizi Lebih';
                                                        echo $gizi;
                                                    }
                                                ?>
                                                <input type="hidden" name="gizi" value="<?= $gizi; ?>">
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</form>

    <!-- <script type="text/javascript">
        window.print();
    </script> -->