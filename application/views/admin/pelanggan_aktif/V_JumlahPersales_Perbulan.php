<div class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('admin/pelanggan_aktif/C_JumlahPersales_Perbulan') ?>" method="get" class="row g-3">
                        <div class="col-md-3">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <?php
                                $selectedYear = $YearGET ?: $Year;

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
                                $selectedMonth = $MonthGET ?: $Month;

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
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <!-- <a href="<?php echo base_url('admin/terminasi/C_Terminasi_Pertahun') ?>" class="btn btn-secondary">Data Pertahun</a> -->
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="row mt-4">
            <div class="card top-sales">
                <h3 class="text-center mt-3 mb-1">Perolehan Sales Perbulan</h3>
                <h5 class="text-center mb-3"> <?php if ($YearGET == NULL && $MonthGET == NULL) {
                                                    echo $Month . ' / ' . $Year;
                                                } else {
                                                    echo $MonthGET . ' / ' . $YearGET;
                                                } ?></h5>
                <div class="topsales-informasi">
                    <div class="rank-list">
                        <?php foreach ($PerolehanSales as $key => $value) : ?>
                            <div class="rank-item <?php if ($key + 1 <= 3) echo 'first-three'; ?><?php if ($key + 1 > 3) echo 'rank-four-and-below'; ?>">

                                <div class="username-container">
                                    <span class="username"><?= $value['nama_sales']; ?></span>
                                    <span class="jumlah"><i class="bi bi-person-check-fill"> </i> Perolehan Aktif = <?= $value['perolehan_sales_aktif']; ?></span>
                                </div>

                                <?php if ($key + 1 == 1) : ?>
                                    <img class="medal" src="<?php echo base_url(); ?>assets/assets/img/medali/thropy_01.png" alt="Medal">
                                <?php elseif ($key + 1 == 2) : ?>
                                    <img class="medal" src="<?php echo base_url(); ?>assets/assets/img/medali/medali_02.png" alt="Medal">
                                <?php elseif ($key + 1 == 3) : ?>
                                    <img class="medal" src="<?php echo base_url(); ?>assets/assets/img/medali/medali_03.png" alt="Medal">
                                <?php else : ?>
                                    <span class="nomor"><?= '#' . $key + 1; ?></span>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center d-md-none">
                <button onclick="saveImage()" id="top-sales" class="btn btn-secondary">Save Image</button>
            </div>

        </div>

    </div>
</div>