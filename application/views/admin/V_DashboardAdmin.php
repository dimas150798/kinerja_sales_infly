<div class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row informasi-data">
            <!-- Total Aktif -->
            <div class="col-sm-12 col-lg-12">
                <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                        <h4>Total Aktif</h4>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="fs-5 fw-semibold"><?php echo $TotalPelangganAll_Now ?></div>
                            <div class="text-uppercase text-medium-emphasis small">Jumlah</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="fs-5 fw-semibold">
                                <?php
                                $Total = $TotalPelangganAll_Now - $TotalPelangganAll_Before;
                                $Total_Persentase = ($Total / $TotalPelangganAll_Before) * 100;

                                if ($Total < 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Turun</div>';
                                } elseif ($Total > 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Naik</div>';
                                } else {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Stabil</div>';
                                }
                                ?>
                            </div>
                            <div class="text-uppercase text-medium-emphasis small">Persentase</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Kebonsari -->
            <div class="col-sm-3 col-lg-3">
                <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                        <h4>Total Kebonsari</h4>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="fs-5 fw-semibold"><?php echo $TotalPelangganKBS_Now ?></div>
                            <div class="text-uppercase text-medium-emphasis small">Jumlah</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="fs-5 fw-semibold">
                                <?php
                                $Total = $TotalPelangganKBS_Now - $TotalPelangganKBS_Before;
                                $Total_Persentase = ($Total / $TotalPelangganKBS_Before) * 100;

                                if ($Total < 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Turun</div>';
                                } elseif ($Total > 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Naik</div>';
                                } else {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Stabil</div>';
                                }
                                ?>
                            </div>
                            <div class="text-uppercase text-medium-emphasis small">Persentase</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Triwung -->
            <div class="col-sm-3 col-lg-3">
                <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                        <h4>Total Triwung</h4>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="fs-5 fw-semibold"><?php echo $TotalPelangganTRW_Now ?></div>
                            <div class="text-uppercase text-medium-emphasis small">Jumlah</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="fs-5 fw-semibold">
                                <?php
                                $Total = $TotalPelangganTRW_Now - $TotalPelangganTRW_Before;
                                $Total_Persentase = ($Total / $TotalPelangganTRW_Before) * 100;

                                if ($Total < 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Turun</div>';
                                } elseif ($Total > 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Naik</div>';
                                } else {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Stabil</div>';
                                }
                                ?>
                            </div>
                            <div class="text-uppercase text-medium-emphasis small">Persentase</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Kanigaran -->
            <div class="col-sm-3 col-lg-3">
                <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                        <h4>Total Kanigaran</h4>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="fs-5 fw-semibold"><?php echo $TotalPelangganKNG_Now ?></div>
                            <div class="text-uppercase text-medium-emphasis small">Jumlah</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="fs-5 fw-semibold">
                                <?php
                                $Total = $TotalPelangganKNG_Now - $TotalPelangganKNG_Before;
                                $Total_Persentase = ($Total / $TotalPelangganKNG_Before) * 100;

                                if ($Total < 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Turun</div>';
                                } elseif ($Total > 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Naik</div>';
                                } else {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Stabil</div>';
                                }
                                ?>
                            </div>
                            <div class="text-uppercase text-medium-emphasis small">Persentase</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Dringu -->
            <div class="col-sm-3 col-lg-3">
                <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                    <div class="card-header text-white position-relative d-flex justify-content-center align-items-center">
                        <h4>Total Dringu</h4>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="fs-5 fw-semibold"><?php echo $TotalPelangganDRG_Now ?></div>
                            <div class="text-uppercase text-medium-emphasis small">Jumlah</div>
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div class="fs-5 fw-semibold">
                                <?php
                                $Total = $TotalPelangganDRG_Now - $TotalPelangganDRG_Before;
                                $Total_Persentase = ($Total / $TotalPelangganDRG_Before) * 100;

                                if ($Total < 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Turun</div>';
                                } elseif ($Total > 0) {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Naik</div>';
                                } else {
                                    echo '<div class="total-persentase">' . number_format($Total_Persentase, 2) . '% Stabil</div>';
                                }
                                ?>
                            </div>
                            <div class="text-uppercase text-medium-emphasis small">Persentase</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center d-md-none">
            <button onclick="saveImage()" id="download-informasi" class="btn btn-secondary">Save Image</button>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mt-2">
                <div class="card month-before p-4" data-id="<?php echo 'Perolehan Aktif ' . $MonthBefore . ' ' . $YearBefore ?>">
                    <h4 class="fw-bold text-center">Perolehan Sales Aktif <br><?php echo   $MonthBefore . ' ' . $YearBefore ?></h4>
                    <div id="ChartMonthBefore" style="height: 370px; width: 100%; "></div>
                    <div id="data" value="<?php echo   $MonthBefore . ' ' . $YearBefore ?>"></div>
                </div>
                <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                    <button onclick="saveImage()" id="month-before" class="btn btn-secondary">Save Image</button>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="card month-now p-4" data-id="<?php echo 'Perolehan Aktif ' . $MonthNow . ' ' . $Year ?>">
                    <h4 class="fw-bold text-center">Perolehan Sales Aktif <br><?php echo $MonthNow . ' ' . $Year ?></h4>
                    <div id="ChartMonthNow" style="height: 370px; width: 100%; "></div>
                </div>
                <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                    <button onclick="saveImage()" id="month-now" class="btn btn-secondary">Save Image</button>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="card date-before p-4" data-id="<?php echo 'Perolehan Aktif ' . $DateBefore ?>">
                    <h4 class="fw-bold text-center">Perolehan Sales Aktif <br>(<?php echo $DateBefore ?>)</h4>
                    <div id="ChartDateBefore" style="height: 370px; width: 100%; "></div>
                </div>
                <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                    <button onclick="saveImage()" id="date-before" class="btn btn-secondary">Save Image</button>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="card date-now p-4" data-id="<?php echo 'Perolehan Aktif ' . $DateNow ?>">
                    <h4 class="fw-bold text-center">Perolehan Sales Aktif <br>(<?php echo $DateNow ?>)</h4>
                    <div id="ChartDateNow" style="height: 370px; width: 100%; "></div>
                </div>
                <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                    <button onclick="saveImage()" id="date-now" class="btn btn-secondary">Save Image</button>
                </div>
            </div>
        </div>

        <!-- <div class="row">

            <div class="col-sm-6 col-lg-6 mb-4">
                <div class="card top-sales d-flex justify-content-center">
                    <h2 class="mb-1 mt-4 fw-bold text-black text-center text-uppercase">Top Sales</h2>
                    <h4 class="mb-4 text-center fw-bold text-bold-500 text-uppercase"><?php echo $DateNow ?></h4>
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
            </div>

            <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center d-md-none">
                <button onclick="saveImage()" id="top-sales" class="btn btn-secondary">Save Image</button>
            </div>

            <div class="col-sm-12 col-lg-12">
                <div class="card terminasi-perolehan d-flex justify-content-center">
                    <div class="d-flex justify-content-between mb-4 mt-4">
                        <div class="mx-3">
                            <h2 class="fw-bold text-black">Terminasi Terkecil</h2>
                            <h4 class="fw-bold text-bold-500"><?php echo $MonthNow ?></h4>
                        </div>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with buttons">
                            <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
                                <input class="btn-check" id="option2" type="radio" name="options" autocomplete="off" checked="">
                                <a href="<?php echo base_url('admin/C_DashboardAdmin') ?>" class="btn btn-outline-secondary">
                                    <label for="option3">Month</label>
                                </a>
                                <input class="btn-check" id="option3" type="radio" name="options" autocomplete="off">
                                <a href="<?php echo base_url('admin/C_DashboardAdmin/DasboardAdmin_V2') ?>" class="btn btn-outline-secondary">
                                    <label for="option3">Year</label>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="terminasi-informasi">
                        <div class="rank-list">
                            <?php foreach ($PerolehanSalesPerbulan as $key => $value) : ?>
                                <div class="rank-item <?php if ($key + 1 <= 1) echo 'first'; ?><?php if ($key + 1 > 1) echo 'rank-two-and-below'; ?>">

                                    <div class="username-terminasi">
                                        <span class="username mb-3"><?= $value['nama_sales']; ?></span>
                                        <span class="jumlah"><i class="bi bi-person-check-fill"> </i> Perolehan Aktif = <?= $value['total_aktif']; ?></span>
                                        <span class="jumlah"><i class="bi bi-wifi-off"></i> Perolehan Terminasi = <?= $value['total_terminasi']; ?></span>
                                        <span class="jumlah"><i class="bi bi-wifi-off"></i>
                                            < 6 Bulan&nbsp;=&nbsp;<?= $value['KurangDari_6Bulan']; ?> </span>

                                                <span class="jumlah mb-4"><i class="bi bi-wifi-off"></i> > 6 Bulan&nbsp;=&nbsp;<?= $value['LebihDari_6Bulan']; ?></span>

                                                <div class="terminated-customers-container" data-sales-name="<?= $value['nama_sales']; ?>">
                                                </div>
                                    </div>


                                    <div class="persentase-container">
                                        <?php if ($key + 1 == 1) : ?>
                                            <img class="medal-terminasi" src="<?php echo base_url(); ?>assets/assets/img/medali/thropy_01.png" alt="Medal">
                                            <span class="jumlah-terminasi"> (<?php
                                                                                $persentaseTerminasi = $value['persentase_terminasi'];

                                                                                if ($persentaseTerminasi == 0) {
                                                                                    echo "N/A"; // Atur teks atau tindakan lain sesuai kebutuhan
                                                                                } else {
                                                                                    echo number_format($persentaseTerminasi, 2) . " %";
                                                                                }
                                                                                ?>)</span>
                                        <?php elseif ($key + 1 == 2) : ?>
                                            <span class="nomor-terminasi"><?= '#' . $key + 1; ?></span>

                                            <span class="jumlah-terminasi">(<?= number_format($value['persentase_terminasi'], 2); ?> %)</span>

                                        <?php elseif ($key + 1 == 3) : ?>
                                            <span class="nomor-terminasi"><?= '#' . $key + 1; ?></span>

                                            <span class="jumlah-terminasi">(<?= number_format($value['persentase_terminasi'], 2); ?> %)</span>


                                        <?php else : ?>
                                            <span class="nomor-terminasi"><?= '#' . $key + 1; ?></span>
                                            <span class="jumlah-terminasi">(<?= number_format($value['persentase_terminasi'], 2); ?> %)</span>


                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                <button onclick="saveImage()" id="download-terminasi" class="btn btn-secondary download-button">Save Image</button>
            </div>
        </div> -->

    </div>
</div>