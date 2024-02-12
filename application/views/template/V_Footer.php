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

<!-- Download IMG -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<!-- CDN Chart -->
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Ajax Show Pelanggan Aktif -->
<script>
    $(document).ready(function() {
        $('#mytable').DataTable({
            "responsive": false,
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
            "responsive": false,
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
            "responsive": false,
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
            "responsive": false,
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
            "responsive": false,
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

<!-- Ajax Show Pelanggan Terminasi-->
<script>
    $(document).ready(function() {
        $('#pelangganTerminasi').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/pelanggan_terminasi/C_Pelanggan_Terminasi/GetDataAjax'); ?>",
            },
        })
    })
</script>

<!-- Ajax Show Pelanggan Terminasi Persales-->
<script>
    $(document).ready(function() {
        $('#terminasiSales').DataTable({
            "autoFill": true,
            "pagingType": 'numbers',
            "searching": true,
            "paging": true,
            "stateSave": true,
            "processing": true,
            "serverside": true,
            "ajax": {
                "url": "<?= base_url('admin/terminasi/C_Terminasi_Persales/GetDataAjax'); ?>",
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

<!-- Show Data Pelanggan Terminasi-->
<script>
    function ShowPelangganTerminasi(parameter_id) {
        Swal.fire({
            title: 'Lihat Data Pelanggan Terminasi ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Lihat!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/terminasi/C_Terminasi_Persales/ShowPelanggan') ?>/" + parameter_id;
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

<script>
    $(document).ready(function() {
        // Iterate over each terminated-customers-container
        $(".terminated-customers-container").each(function() {
            // Get the sales name from the data attribute
            var salesName = $(this).data("sales-name");

            // Reference to the current container for later use
            var container = $(this);

            // Make an AJAX request to fetch terminated customer data
            $.ajax({
                url: "<?= base_url('admin/C_DashboardAdmin/get_terminated_customers'); ?>",
                type: "POST",
                data: {
                    salesName: salesName
                },
                success: function(data) {
                    // Update the corresponding terminated-customers-ajax-container with the fetched data
                    container.html(data);
                },
                error: function() {
                    // Handle errors if needed
                    container.html("Error fetching terminated customers.");
                }
            });
        });
    });
</script>

<!-- Chart Bar Month Now -->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartMonthNow'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Perolehan",
                    data: jsonData.data
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.categories,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartMonthNow"), options);
            chart.render();
        }
    });
</script>

<!-- Chart Bar Month Before -->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartMonthBefore'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Perolehan",
                    data: jsonData.data
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    with: 100,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.categories,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartMonthBefore"), options);
            chart.render();
        }
    });
</script>

<!-- Chart Bar Date Now -->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartDateNow'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Perolehan",
                    data: jsonData.data
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.categories,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartDateNow"), options);
            chart.render();
        }
    });
</script>

<!-- Chart Bar Date Before -->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartDateBefore'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Perolehan",
                    data: jsonData.data
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.categories,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartDateBefore"), options);
            chart.render();
        }
    });
</script>

<!-- Chart Infly Home Now-->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartInflyHomeNow'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Penjualan",
                    data: jsonData.jumlah_paket
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.nama_paket,
                },
                yaxis: {
                    min: 4,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartInflyHomeNow"), options);
            chart.render();
        }


    });
</script>

<!-- Chart Infly Home Before-->
<script type="text/javascript">
    $.ajax({
        url: "<?= base_url('admin/C_DashboardAdmin/ChartInflyHomeBefore'); ?>",
        dataType: "json",

        success: function(jsonData) {
            var options = {
                series: [{
                    name: "Penjualan",
                    data: jsonData.jumlah_paket
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ['#268797'],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '15px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff']
                },
                tooltip: {
                    shared: true,
                    intersect: false
                },
                xaxis: {
                    categories: jsonData.nama_paket,
                },
                yaxis: {
                    min: 4,
                }
            };

            var chart = new ApexCharts(document.querySelector("#ChartInflyHomeBefore"), options);
            chart.render();
        }
    });
</script>


</body>

</html>