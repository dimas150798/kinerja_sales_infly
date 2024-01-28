<div class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="fs-3 fw-bold">Data Pelanggan Aktif</h4>

                    <form action="<?php echo base_url('admin/pelanggan_aktif/C_Pelanggan_Aktif') ?>" method="get" class="row g-3">
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
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="row mt-4">

            <div class="card">
                <div class="card-body">

                    <div class="row mt-4 mb-4">

                        <div class="col-12 col-sm-4 col-lg-4 d-flex justify-content-center bg-secondary p-2">
                            <div class="d-flex-column text-center">
                                <div class="display-perolehan fw-bold">
                                    <h6 class="fw-bold fs-5">Jumlah All</h6>
                                    <h4 class="fw-bold fs-5"><?php echo $JumlahPelangganAktif_All; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-2 col-lg-2 d-flex justify-content-center bg-secondary p-2">
                            <div class="d-flex-column text-center">
                                <div class="display-perolehan">
                                    <h6 class="fw-bold fs-5">Kebonsari</h6>
                                    <h4 class="fw-bold fs-5"><?php echo $JumlahPelangganAktif_KBS; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-2 col-lg-2 d-flex justify-content-center bg-secondary p-2">
                            <div class="d-flex-column text-center">
                                <div class="display-perolehan">
                                    <h6 class="fw-bold fs-5">Triwung</h6>
                                    <h4 class="fw-bold fs-5"><?php echo $JumlahPelangganAktif_TRW; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-2 col-lg-2 d-flex justify-content-center bg-secondary p-2">
                            <div class="d-flex-column text-center">
                                <div class="display-perolehan">
                                    <h6 class="fw-bold fs-5">Kanigaran</h6>
                                    <h4 class="fw-bold fs-5"><?php echo $JumlahPelangganAktif_Kanigaran; ?></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-sm-2 col-lg-2 d-flex justify-content-center bg-secondary p-2">
                            <div class="d-flex-column text-center">
                                <div class="display-perolehan">
                                    <h6 class="fw-bold fs-5">Dringu</h6>
                                    <h4 class="fw-bold fs-5"><?php echo $JumlahPelangganAktif_Dringu; ?></h4>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordered responsive nowrap" style="width:100%">
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