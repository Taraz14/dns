<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?= $this->session->userdata('name'); ?></span>
                        </a>
                    </div>
                    <div class="logo-element">
                        DNS
                    </div>
                </li>
                <li class="<?= ($this->uri->segment(2) == "dashboard") ? "active" : "" ?>">
                    <a href="<?= site_url('admin')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class="<?= ($this->uri->segment(2) == "kriteria" || $this->uri->segment(2) == "alternatif" || $this->uri->segment(2) == "pertanyaan" || $this->uri->segment(2) == "jawaban") ? "active" : "" ?>">
                    <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?= ($this->uri->segment(2) == "kriteria") ? "active" : "" ?>">
                            <a href="<?= site_url('0/kriteria') ?>">Kriteria</a>
                        </li>
                       <li class="<?= ($this->uri->segment(2) == "alternatif") ? "active" : "" ?>"><a href="<?= site_url('0/alternatif') ?>">Alternatif</a></li>
                      <!--  <li class="<?= ($this->uri->segment(2) == "pertanyaan") ? "active" : "" ?>"><a href="<?= site_url('0/pertanyaan') ?>">Pertanyaan</a></li>
                       <li class="<?= ($this->uri->segment(2) == "jawaban") ? "active" : "" ?>"><a href="<?= site_url('0/jawaban') ?>">Jawaban</a></li> -->
                    </ul>
                </li>
                <!-- <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li><a href="#">User Monitoring</a></li>
                       <li><a href="#">Manage User</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Analisis</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Hasil</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       <li><a href="#">Data Hasil test</a></li>
                       <li><a href="#">Laporan</a></li>
                    </ul>
                </li> -->
            </ul>

        </div>
    </nav>