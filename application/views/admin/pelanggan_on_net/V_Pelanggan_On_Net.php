<div class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">

                <div class="card-body">
                    <form action="<?php echo base_url('admin/pelanggan_on_net/C_Pelanggan_On_Net') ?>" method="get" class="row g-3 mt-2">
                        <h4 class="fs-3 fw-bold">Data Pelanggan On Net</h4>
                        <div class="col-md-3">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <?php
                                $selectedYear = $this->session->userdata('YearGET') ?: $this->session->userdata('Year');

                                echo '<option value="" disabled>-- Pilih Tahun --</option>';

                                for ($i = 2022; $i <= 2025; $i++) {
                                    $selected = ($selectedYear == $i) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value=' . $i . '>' . date("Y", mktime(0, 0, 0, 1, 1, $i)) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="bulan" class="form-label">Bulan:</label>
                            <select class="form-control" id="bulan" name="bulan">
                                <?php
                                $selectedMonth = $this->session->userdata('BulantGET') ?: $this->session->userdata('Month');

                                echo '<option value="" disabled>-- Pilih Bulan --</option>';

                                for ($m = 1; $m <= 12; ++$m) {
                                    $selected = ($selectedMonth == $m) ? 'selected' : '';
                                    echo '<option ' . $selected . ' value=' . $m . '>' . date('F', mktime(0, 0, 0, $m, 1)) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <div class="button-container">
                                <button type="submit" class="btn btn-primary text-white fw-bold">Cari</button>
                                <a href="<?php echo base_url('admin/pelanggan_on_net/C_Data_On_Net') ?>" class="btn btn-success text-white fw-bold">Schedule</a>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-sm-3 col-lg-4 mt-3">
                            <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                                <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                                    <h4>Total All Area</h4>
                                </div>
                                <div class="card-body row text-center">
                                    <div class="col">
                                        <div class="fs-5 fw-semibold"><?php echo $JumlahOnNet_All ?></div>
                                        <div class="text-uppercase text-medium-emphasis small">All Area</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 col-lg-4 mt-3">
                            <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                                <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                                    <h4>Total Kebonsari & Triwung</h4>
                                </div>
                                <div class="card-body row text-center">
                                    <div class="col">
                                        <div class="fs-5 fw-semibold"><?php echo $JumlahOnNet_KBS ?></div>
                                        <div class="text-uppercase text-medium-emphasis small">Kebonsari</div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold"><?php echo $JumlahOnNet_TRW ?></div>
                                        <div class="text-uppercase text-medium-emphasis small">Triwung</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 col-lg-4 mt-3">
                            <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                                <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                                    <h4>Total Kanigaran & Dringu</h4>
                                </div>
                                <div class="card-body row text-center">
                                    <div class="col">
                                        <div class="fs-5 fw-semibold"><?php echo $JumlahOnNet_Kanigaran ?></div>
                                        <div class="text-uppercase text-medium-emphasis small">Kanigaran</div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold"><?php echo $JumlahOnNet_Dringu ?></div>
                                        <div class="text-uppercase text-medium-emphasis small">Dringu</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-4">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="pelangganOnNet" class="table table-bordered responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="fw-bold text-uppercase text-center" width="5%">No</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Nama customer</th>
                                    <th class="fw-bold text-uppercase text-center" width="5%">Paket</th>
                                    <th class="fw-bold text-uppercase text-center" width="5%">Area</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Nama Sales</th>
                                    <th class="fw-bold text-uppercase text-center" width="5%">Status</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Telepon</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Tgl Reg</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Tgl Ins</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Alamat</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Keterangan</th>
                                    <th class="fw-bold text-uppercase text-center" width="10%">Nama DP</th>
                                    <th class="fw-bold text-uppercase text-center" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>



    </div>
</div>