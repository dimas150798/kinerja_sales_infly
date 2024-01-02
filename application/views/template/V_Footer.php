<footer class="footer">
    <div>© 2023 Infly Networks</div>
    <div class="ms-auto">Powered by&nbsp;DMS</div>
</footer>
</div>
<!-- CoreUI and necessary plugins-->
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/simplebar/js/simplebar.min.js"></script>

<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url(); ?>assets/vendors/chart.js/js/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/download_img.js"></script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
    function goToYearPage() {
        // Redirect to the Year page URL
        window.location.href = "<?php echo base_url('admin/C_DashboardAdmin/DasboardAdmin_V2') ?>";
    }

    function goToMonthPage() {
        // Redirect to the Year page URL
        window.location.href = "<?php echo base_url('admin/C_DashboardAdmin') ?>";
    }
</script>



</body>

</html>