<!--Footer-->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            Hak cipta © 2024, <a href="https://www.globalprintpack.co.id/"> PT. Global Printpack Indonesia</a>
        </div>
    </div>
    </div>
</footer>
<!--Footer-->

</div>
</div>

<!--Main Content-->

</div>

<!--Page Wrapper-->

<!-- Page JavaScript Files-->
<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery-1.12.4.min.js"></script>
<!--Popper JS-->
<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
<!--Sweet alert JS-->
<script src="<?= base_url() ?>/assets/js/sweetalert.js"></script>
<!--Progressbar JS-->
<script src="<?= base_url() ?>/assets/js/progressbar.min.js"></script>
<!--Flot.JS-->
<script src="<?= base_url() ?>/assets/js/charts/jquery.flot.min.js"></script>
<script src="<?= base_url() ?>/assets/js/charts/jquery.flot.pie.min.js"></script>
<script src="<?= base_url() ?>/assets/js/charts/jquery.flot.categories.min.js"></script>
<script src="<?= base_url() ?>/assets/js/charts/jquery.flot.stack.min.js"></script>
<!--Chart JS-->
<script src="<?= base_url() ?>/assets/js/charts/chart.min.js"></script>
<!--Chartist JS-->
<script src="<?= base_url() ?>/assets/js/charts/chartist.min.js"></script>
<script src="<?= base_url() ?>/assets/js/charts/chartist-data.js"></script>
<script src="<?= base_url() ?>/assets/js/charts/demo.js"></script>
<!--Maps-->
<script src="<?= base_url() ?>/assets/js/maps/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>/assets/js/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() ?>/assets/js/maps/jvector-maps.js"></script>
<!--Bootstrap Calendar JS-->
<script src="<?= base_url() ?>/assets/js/calendar/bootstrap_calendar.js"></script>
<script src="<?= base_url() ?>/assets/js/calendar/demo.js"></script>
<!--Nice select-->
<script src="<?= base_url() ?>/assets/js/jquery.nice-select.min.js"></script>

<!--Custom Js Script-->
<script src="<?= base_url() ?>/assets/js/custom.js"></script>
<!--Custom Js Script-->
<!--Datatable-->
<script src="<?= base_url() ?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/js/dataTables.bootstrap4.min.js"></script>
<!--  -->
<script>
//Nice select
$('.bulk-actions').niceSelect();
</script>

<script>
$('#example').DataTable();
</script>
<script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
})
</script>
</body>

</html>
