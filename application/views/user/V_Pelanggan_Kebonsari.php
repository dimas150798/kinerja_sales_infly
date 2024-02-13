<div class="body">
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center mb-2">
                <h2 class="judul-jadwal text-center">Jadwal Instalasi <br> Kebonsari</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mb-4">
                <h4><?php echo $Today ?></h4>
            </div>

            <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center mb-2">
                <div class="cardPelanggan">
                    <?php foreach ($DataPelaggan as $key => $value) : ?>
                        <div class="customer-info">
                            <p style="margin-bottom: 10px; font-size: 17px">
                                <strong><?= $key + 1 ?>.</strong>
                                <strong><?= $value['nama_customer'] ?></strong> <strong class="copyable">(<?= $value['nama_sales'] ?>) </strong> <br>
                                <?= $value['nama_paket'] ?> <span class="copyable">(<?= $value['total'] ?>)</span><br>
                                <?= $value['alamat_customer'] ?> <br>
                                <strong class="status-customer 
                                        <?php
                                        if ($value['status_customer'] == 'active') {
                                            echo 'status-active';
                                        } elseif ($value['status_customer'] == 'on net') {
                                            echo 'status-on-net';
                                        } elseif ($value['status_customer'] == 'survey') {
                                            echo 'status-survey';
                                        } elseif ($value['status_customer'] == 'need distribution') {
                                            echo 'status-need-distribution';
                                        }
                                        ?>
                                    ">
                                    <?= $value['status_customer'] ?>
                                </strong>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

    </div>
</div>