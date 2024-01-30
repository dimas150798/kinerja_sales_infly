<div class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">

                <div class="card-body">
                    <h4 class="fs-3 fw-bold">Edit Customer Aktif</h4>

                    <?php foreach ($DataPelanggan as $data) : ?>

                        <form method="POST" action="<?php echo base_url('admin/pelanggan_aktif/C_Edit_Pelanggan_Aktif/EditPelangganSave') ?>">

                            <div class="row">
                                <input class="form-control bg-secondary" type="hidden" id="id_sheet" name="id_sheet" value="<?php echo $data['id_sheet'] ?>" placeholder="Kode Sheet" readonly>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Tanggal Registrasi <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-calendar"></i></span>
                                        <input class="form-control fw-bold" type="date" id="tanggal_customer" name="tanggal_customer" value="<?php echo $data['tanggal_customer'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Nama Customer <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-person-bounding-box"></i></span>
                                        <input class="form-control fw-bold" id="nama _customer" name="nama_customer" value="<?php echo $data['nama_customer'] ?>" placeholder="Masukkan Nama Customer..." required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Paket Internet <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-wifi"></i></span>
                                        <select id="paket" name="paket" class="form-control fw-bold" required>
                                            <option value="">Pilih Paket :</option>
                                            <?php foreach ($DataPaket as $value) : ?>
                                                <option value="<?php echo $value['nama_paket'] ?>" <?= $data['nama_paket'] == $value['nama_paket'] ? "selected" : null ?>><?php echo $value['nama_paket'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Area Customer <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-bookmarks-fill"></i></span>
                                        <select id="branch_customer" name="branch_customer" class="form-control fw-bold" required>
                                            <option value="">Pilih Area :</option>
                                            <?php foreach ($DataArea as $value) : ?>
                                                <option value="<?php echo $value['nama_area'] ?>" <?= $data['branch_customer'] == $value['nama_area'] ? "selected" : null ?>><?php echo $value['nama_area'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Alamat Customer <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-house-fill"></i></span>
                                        <textarea class="form-control fw-bold" id="alamat_customer" name="alamat_customer" rows="1" placeholder="Masukkan Alamat Disini..." required><?php echo $data['alamat_customer']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Email Customer</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-envelope-fill"></i></span>
                                        <input class="form-control fw-bold" id="email" name="email" value="<?php echo $data['email'] ?>" placeholder="Masukkan Email Disini...">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">No. Telepon <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-telephone-fill"></i></span>
                                        <input class="form-control fw-bold" id="telepon" name="telepon" value="<?php echo $data['telepon'] ?>" placeholder="Masukkan Telepon Disini...">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Status <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-bookmarks-fill"></i></span>
                                        <input class="form-control bg-secondary fw-bold" style="text-transform: uppercase;" value="<?php echo $data['status_customer'] ?>" readonly>

                                        <select id="status_customer" name="status_customer" class="form-control fw-bold" required>
                                            <option value="">Pilih Status :</option>
                                            <?php foreach ($DataStatus as $value) : ?>
                                                <option value="<?php echo $value['nama_status']; ?>">
                                                    <?php echo $value['nama_status']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Sales <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-bookmarks-fill"></i></span>
                                        <select id="nama_sales" name="nama_sales" class="form-control fw-bold" required>
                                            <option value="">Pilih Sales :</option>
                                            <?php foreach ($DataPegawai as $value) : ?>
                                                <option value="<?php echo $value['nama_pegawai'] ?>" <?= $data['nama_sales'] == $value['nama_pegawai'] ? "selected" : null ?>><?php echo $value['nama_pegawai'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Tanggal Instalasi <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-calendar"></i></span>
                                        <input class="form-control fw-bold" type="date" id="tanggal_instalasi" name="tanggal_instalasi" value="<?php echo $data['tanggal_instalasi'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Tanggal Terminasi</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-calendar"></i></span>
                                        <input class="form-control fw-bold" type="date" id="tanggal_terminasi" name="tanggal_terminasi" value="<?php echo $data['tanggal_terminasi'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Keterangan</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-bookmarks-fill"></i></span>
                                        <textarea class="form-control fw-bold" id="keterangan" name="keterangan" rows="1" placeholder="Masukkan Keterangan Disini..."><?php echo $data['keterangan'] ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-lg-6 mt-2">
                                    <label class="form-label fs-5 fw-bold">Nama DP</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary"><i class="bi bi-bookmarks-fill"></i></span>
                                        <input class="form-control fw-bold" id="nama_dp" name="nama_dp" value="<?php echo $data['nama_dp'] ?>" placeholder="Masukkan Nama DP...">
                                    </div>
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