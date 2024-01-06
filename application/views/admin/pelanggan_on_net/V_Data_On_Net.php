    <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card">

                    <div class="card-body">
                        <form action="<?php echo base_url('admin/pelanggan_on_net/C_Data_On_Net') ?>" method="get" class="row g-3 mt-2">
                            <h4 class="fs-3 fw-bold">Schedule Pelanggan <?php if ($AreaGET == NULL) {
                                                                            echo $Area;
                                                                        } else {
                                                                            echo $AreaGET;
                                                                        } ?></h4>

                            <div class="col-md-3">
                                <label for="tahun" class="form-label">Tanggal :</label>
                                <input type="date" name="day" id="day" class="form-control" value="<?php if ($DayGET == '') {
                                                                                                        echo $Day;
                                                                                                    } else {
                                                                                                        echo $DayGET;
                                                                                                    } ?>">
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


                            <div class="col-md-6 mt-5 d-flex justify-content-end align-items-center">
                                <div class="button-container">
                                    <button type="submit" class="btn btn-primary text-white fw-bold">Cari</button>
                                    <a href="<?php echo base_url('admin/pelanggan_on_net/C_Pelanggan_On_Net') ?>" class="btn btn-danger text-white fw-bold">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="row mt-4">

                <div class="card">
                    <div class="card-body">

                        <?php
                        if (empty($tanggal_schedule) || $tanggal_schedule == 'Data Kosong') {
                            echo 'Data Kosong';
                        } else {
                            echo "<h2 class='mb-4'>Update Schedule Instalasi $hari_schedule, $tanggal_schedule :</h2>";
                        }
                        ?>

                        <?php foreach ($DataPelaggan as $key => $value) : ?>
                            <div class="customer-info">
                                <p style="margin-bottom: 10px">
                                    <strong><?= $key + 1 ?>.</strong>
                                    <strong><?= $value['nama_customer'] ?></strong> <strong class="copyable">(<?= $value['nama_sales'] ?>) </strong> <br>
                                    <?= $value['nama_paket'] ?> <span class="copyable"><?= $value['total'] ?></span><br>
                                    <?= $value['alamat_customer'] ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="copy-wa d-none">
                    <div class="card">
                        <div class="card-body" id="codeContainer">

                            <?php
                            if (empty($tanggal_schedule) || $tanggal_schedule == 'Data Kosong') {
                                echo 'Data Kosong';
                            } else {
                                echo "<h2 class='mb-4'>*Update Schedule Instalasi $hari_schedule, $tanggal_schedule :*</h2><br>";
                            }
                            ?>

                            <?php foreach ($DataPelaggan as $key => $value) : ?>
                                <div class="customer-info">
                                    <p style="margin-bottom: 10px">
                                        <strong>*<?= $key + 1 ?>.*</strong>
                                        <strong class="copyable">*<?= $value['nama_customer'] ?>* </strong><strong class="copyable">*(<?= $value['nama_sales'] ?>)* </strong> <br>
                                        <span class="copyable"><?= $value['nama_paket'] ?></span> <span class="copyable"><?= $value['total'] ?></span><br>
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