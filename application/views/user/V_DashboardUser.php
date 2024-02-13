<div class="body">
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center mb-2">
                <h2 class="judul-jadwal text-center">Jadwal Instalasi <br> All Pop Infly Networks</h2>
            </div>
            <div class="col-12 d-flex justify-content-center mb-4">
                <h3><?php echo $Today ?></h3>
            </div>

            <div class="col-12 col-lg-3 mb-2">
                <div class="card text-center">
                    <p>Jadwal Instalasi <br><strong>Kebonsari</strong></p>

                    <h4><?php echo $JumlahOnNet_KBS ?></h4>
                    <a href="<?php echo base_url('user/C_Pelanggan_Kebonsari') ?>" class="custom-button">Lihat Customer</a>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-2">
                <div class="card">
                    <p class="text-center">Jadwal Instalasi <br>
                        <strong>Kanigaran</strong>
                    </p>

                    <h4><?php echo $JumlahOnNet_Kanigaran ?></h4>
                    <a href="<?php echo base_url('user/C_Pelanggan_Kanigaran') ?>" class="custom-button">Lihat Customer</a>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-2">
                <div class="card">
                    <p class="text-center">Jadwal Instalasi <br>
                        <strong>Triwung</strong>
                    </p>

                    <h4><?php echo $JumlahOnNet_TRW ?></h4>
                    <a href="<?php echo base_url('user/C_Pelanggan_Triwung') ?>" class="custom-button">Lihat Customer</a>
                </div>
            </div>
            <div class="col-12 col-lg-3 mb-2">
                <div class="card">
                    <p class="text-center">Jadwal Instalasi <br>
                        <strong>Dringu</strong>
                    </p>

                    <h4><?php echo $JumlahOnNet_Dringu ?></h4>
                    <a href="<?php echo base_url('user/C_Pelanggan_Dringu') ?>" class="custom-button">Lihat Customer</a>
                </div>
            </div>
        </div>

    </div>
</div>