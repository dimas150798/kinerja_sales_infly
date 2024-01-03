<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="row">
            <div class="card">

                <div class="card-body">
                    <h4 class="fs-3 fw-bold">Edit Customer On Net</h4>

                    <?php foreach ($DataPelanggan as $data) : ?>

                        <form method="POST" action="<?php echo base_url('admin/pelanggan_on_net/C_Edit_Pelanggan_On_Net/EditPelangganSave') ?>">

                            <div class="row">
                                <input class="form-control bg-secondary" type="hidden" id="id_sheet" name="id_sheet" value="<?php echo $data['id_sheet'] ?>" placeholder="Kode Sheet" readonly>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Kode Customer</label>
                                    <input class="form-control bg-secondary" id="kode_sheets" name="kode_sheets" value="<?php echo $data['kode_sheet'] ?>" placeholder="Kode Sheet" readonly>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Tanggal Registrasi</label>
                                    <input class="form-control" type="date" id="tanggal_customer" name="tanggal_customer" value="<?php echo $data['tanggal_customer'] ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Nama Customer</label>
                                    <input class="form-control" id="nama_customer" name="nama_customer" value="<?php echo $data['nama_customer'] ?>" placeholder="Masukkan Nama Customer..." required>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Paket</label>
                                    <select id="paket" name="paket" class="form-control" required>
                                        <option value="">Pilih Paket :</option>
                                        <?php foreach ($DataPaket as $value) : ?>
                                            <option value="<?php echo $value['nama_paket'] ?>" <?= $data['nama_paket'] == $value['nama_paket'] ? "selected" : null ?>><?php echo $value['nama_paket'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Area</label>
                                    <select id="branch_customer" name="branch_customer" class="form-control" required>
                                        <option value="">Pilih Area :</option>
                                        <?php foreach ($DataArea as $value) : ?>
                                            <option value="<?php echo $value['nama_area'] ?>" <?= $data['branch_customer'] == $value['nama_area'] ? "selected" : null ?>><?php echo $value['nama_area'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Alamat</label>
                                    <textarea class="form-control" id="alamat_customer" name="alamat_customer" rows="1" required><?php echo $data['alamat_customer']; ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Email</label>
                                    <input class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" placeholder="Masukkan Email...">
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">No HP</label>
                                    <input class="form-control" id="telepon" name="telepon" value="<?php echo $data['telepon'] ?>" placeholder="Masukkan Telepon...">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Status</label>
                                    <select id="status_customer" name="status_customer" class="form-control" required>
                                        <option value="">Pilih Status :</option>
                                        <?php foreach ($DataStatus as $value) : ?>
                                            <option value="<?php echo $value['nama_status'] ?>" <?= $data['status_customer'] == $value['nama_status'] ? "selected" : null ?>><?php echo $value['nama_status'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Tanggal Instalasi</label>
                                    <input class="form-control" type="date" id="tanggal_instalasi" name="tanggal_instalasi" value="<?php echo $data['tanggal_instalasi'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Sales</label>
                                    <select id="nama_sales" name="nama_sales" class="form-control" required>
                                        <option value="">Pilih Sales :</option>
                                        <?php foreach ($DataPegawai as $value) : ?>
                                            <option value="<?php echo $value['nama_pegawai'] ?>" <?= $data['nama_sales'] == $value['nama_pegawai'] ? "selected" : null ?>><?php echo $value['nama_pegawai'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="1"><?php echo $data['keterangan'] ?></textarea>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Biaya Instalasi</label>
                                    <input class="form-control" name="biaya_instalasi" value="<?php echo $data['biaya_instalasi'] ?>" placeholder="Masukkan Biaya Instalasi..."></input>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success mt-2 justify-content-end">Simpan</button>
                                </div>
                            </div>

                        </form>

                    <?php endforeach; ?>

                </div>

            </div>
        </div>

    </div>
</div>