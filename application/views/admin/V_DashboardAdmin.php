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
            <!-- Perolehan Perbulan -->
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

            <!-- Perolehan Pertanggal -->
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

            <!-- Top Infly Home -->

            <div class="col-12 col-lg-6 mt-2">
                <div class="card inflyhome-before p-4" data-id="<?php echo 'Perolehan Aktif ' . $DateBefore ?>">
                    <h4 class="fw-bold text-center">Best Seller Infly Home <br><?php echo $MonthBefore . ' ' . $YearBefore ?></h4>
                    <div id="ChartInflyHomeBefore" style="height: 370px; width: 100%; "></div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-2">
                <div class="card inflyhome-now p-4" data-id="<?php echo 'Perolehan Aktif ' . $DateBefore ?>">
                    <h4 class="fw-bold text-center">Best Seller Infly Home <br><?php echo $MonthNow . ' ' . $Year ?></h4>
                    <div id="ChartInflyHomeNow" style="height: 370px; width: 100%; "></div>
                </div>
            </div>
        </div>

    </div>
</div>