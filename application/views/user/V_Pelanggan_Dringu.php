<div class="body">
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center mb-2">
                <h2 class="judul-jadwal text-center">Jadwal Instalasi <br> Dringu</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mb-4">
                <h2><?php echo $Today ?></h2>
            </div>

            <div class="col-12 col-lg-12 d-flex justify-content-center align-items-center mb-2">
                <div class="cardPelanggan">
                    <?php foreach ($DataPelaggan as $key => $value) : ?>
                        <div class="customer-info">
                            <p style="margin-bottom: 10px">
                                <strong><?= $key + 1 ?>.</strong>
                                <strong><?= $value['nama_customer'] ?></strong> <strong class="copyable">(<?= $value['nama_sales'] ?>) </strong> <br>
                                <?= $value['nama_paket'] ?> <span class="copyable">(<?= $value['total'] ?>)</span><br>
                                <?= $value['alamat_customer'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

    </div>
</div>