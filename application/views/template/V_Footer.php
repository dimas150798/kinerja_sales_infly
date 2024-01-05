<footer class="footer">
    <div>© 2023 Infly Networks</div>
    <div class="ms-auto">Powered by&nbsp;DMS</div>
</footer>
</div>

<!-- JS dataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/af-2.5.1/r-2.4.0/datatables.min.js">
</script>

<!-- Select 2 -->
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url(); ?>vendor/SweetAlert2/sweetalert2.all.min.js"></script>

<!-- CoreUI and necessary plugins-->
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/simplebar/js/simplebar.min.js"></script>

<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url(); ?>assets/vendors/chart.js/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script src="<?php echo base_url(); ?>assets/js/download_img.js"></script>

<!-- Button Pencarian -->
<script src="<?php echo base_url(); ?>assets/js/buttonPencarian.js"></script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<!-- Ajax Show Pelanggan Aktif -->
<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_aktif/C_Pelanggan_Aktif/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan All -->
<script>
    $(document).ready(function() {
        $('#pelangganAll').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_aktif_all/C_Pelanggan_Aktif_All/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan Survey -->
<script>
    $(document).ready(function() {
        $('#pelangganSurvey').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_survey/C_Pelanggan_Survey/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan On Net -->
<script>
    $(document).ready(function() {
        $('#pelangganOnNet').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_on_net/C_Pelanggan_On_Net/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan On Net Area-->
<script>
    $(document).ready(function() {
        $('#pelangganOnNetArea').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_on_net/C_Data_On_Net/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan Distribution-->
<script>
    $(document).ready(function() {
        $('#pelangganDistribution').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_distribution/C_Pelanggan_Distribution/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Alert Tambah Data Pelanggan -->
<script>
    <?php if ($this->session->flashdata('Success_icon')) { ?>
        var toastMixin = Swal.mixin({
            toast: true,
            icon: '<?php echo $this->session->flashdata('Success_icon') ?>',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        toastMixin.fire({
            animation: true,
            title: '<?php echo $this->session->flashdata('Success_title') ?>'
        });

    <?php } ?>
</script>

<!-- Edit Data Pelanggan -->
<script>
    function EditPelanggan(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Edit Data ?',
            text: "Data yang diedit tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_aktif_all/C_Edit_Pelanggan/EditPelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>

<!-- Delete Data Pelanggan -->
<script>
    function DeletePelanggan(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Delete Data ?',
            text: "Data yang didelete tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Delete Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_aktif_all/C_Delete_Pelanggan/DeletePelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>

<!-- Edit Data Pelanggan Survey-->
<script>
    function EditPelangganSurvey(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Edit Data ?',
            text: "Data yang diedit tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_survey/C_Edit_Pelanggan_Survey/EditPelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>

<!-- Edit Data Pelanggan On Net-->
<script>
    function EditPelangganOnNet(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Edit Data ?',
            text: "Data yang diedit tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_on_net/C_Edit_Pelanggan_On_Net/EditPelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>

<!-- Edit Data Pelanggan Aktif-->
<script>
    function EditPelangganAktif(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Edit Data ?',
            text: "Data yang diedit tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_aktif/C_Edit_Pelanggan_Aktif/EditPelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>

<!-- Edit Data Pelanggan Distribution-->
<script>
    function EditPelangganDistribution(parameter_id) {
        Swal.fire({
            title: 'Yakin Melakukan Edit Data ?',
            text: "Data yang diedit tidak akan kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Edit Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/pelanggan_distribution/C_Edit_Pelanggan_Distribution/EditPelanggan') ?>/" + parameter_id;
            }
        })
    }
</script>


<script>
    document.getElementById('copyButton').addEventListener('click', function() {
        var codeContainer = document.getElementById('codeContainer');

        // Clone the container, append it to the body, and select its content
        var clonedContainer = codeContainer.cloneNode(true);
        clonedContainer.style.position = 'absolute';
        clonedContainer.style.left = '-9999px';
        document.body.appendChild(clonedContainer);

        var range = document.createRange();
        range.selectNodeContents(clonedContainer);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);

        // Copy the selected content to clipboard
        document.execCommand('copy');

        // Remove the cloned container
        document.body.removeChild(clonedContainer);

        alert('Text copied!');
    });
</script>

</body>

</html>