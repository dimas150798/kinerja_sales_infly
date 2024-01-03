    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="card">

                    <div class="card-body">
                        <form action="<?php echo base_url('admin/pelanggan_on_net/C_Data_On_Net') ?>" method="get" class="row g-3 mt-2">
                            <h4 class="fs-3 fw-bold">Schedule Pelanggan</h4>
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

                            <div class="col-md-3">
                                <label for="bulan" class="form-label">Area:</label>
                                <select id="area" name="area" class="form-control" required>
                                    <option value="">Pilih Area :</option>

                                    <?php foreach ($DataArea as $value) : ?>
                                        <option value="<?php echo $value['nama_area'] ?>" <?= $AreaGET == $value['nama_area'] ? "selected" : null ?>><?php echo $value['nama_area'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="col-md-3 mt-5 d-flex justify-content-end align-items-center">
                                <div class="button-container">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="<?php echo base_url('admin/pelanggan_on_net/C_Data_On_Net') ?>" class="btn btn-success">Data On Net</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="row mt-4">

                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Update Schedule Instalasi <?= $hari_schedule ?>, <?= $tanggal_schedule ?> :</h2>

                        <?php foreach ($DataPelaggan as $key => $value) : ?>
                            <div class="customer-info">
                                <p style="margin-bottom: 10px">
                                    <strong><?= $key + 1 ?>.</strong>
                                    <strong><?= $value['nama_customer'] ?></strong> <br>
                                    <?= $value['nama_paket'] ?> <br>
                                    <?= $value['alamat_customer'] ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="copy-wa">
                    <div class="card">
                        <div class="card-body" id="codeContainer">
                            <h2 class="mb-4">*Update Schedule Instalasi <?= $hari_schedule ?>, <?= $tanggal_schedule ?> :*</h2> <br>

                            <?php foreach ($DataPelaggan as $key => $value) : ?>
                                <div class="customer-info">
                                    <p style="margin-bottom: 10px">
                                        <strong>*<?= $key + 1 ?>.*</strong>
                                        <strong class="copyable">*<?= $value['nama_customer'] ?>*</strong> <br>
                                        <span class="copyable"><?= $value['nama_paket'] ?></span> <br>
                                        <span class="copyable"><?= $value['alamat_customer'] ?></span>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2 mt-2 d-flex justify-content-center align-items-center">
                    <button id="copyButton" class="btn btn-secondary download-button">Copy</button>
                </div>






            </div>



        </div>
    </div>