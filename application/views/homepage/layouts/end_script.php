
    <!-- Mainly scripts -->
    <script src="<?= base_url()?>assets/admin/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url()?>assets/admin/js/inspinia.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?= base_url()?>assets/admin/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Flot -->
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="<?= base_url()?>assets/admin/js/plugins/chartJs/Chart.min.js"></script>
    <!-- Chosen -->
    <script src="<?= base_url()?>assets/admin/js/plugins/chosen/chosen.jquery.js"></script>
    <!-- Peity -->
    <script src="<?= base_url()?>assets/admin/js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="<?= base_url()?>assets/admin/js/demo/peity-demo.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url()?>assets/admin/js/plugins/select2/select2.full.min.js"></script>
    <!-- Steps -->
    <script src="<?= base_url()?>assets/admin/js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?= base_url()?>assets/admin/js/plugins/validate/jquery.validate.min.js"></script>
    
    <!-- TouchSpin -->
    <script src="<?= base_url()?>assets/admin/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    
    <!-- Datatables -->
    <script src="<?= base_url()?>assets/admin/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?= base_url()?>assets/admin/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });

            $('.chosen-select').chosen({width: "100%"});

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                min : 1,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $('#history').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order"      : [],
                "ajax"       : {
                    url : '<?= site_url('homepage/dataHistory')?>',
                },
                    "responsive" : true
            });
       });
    </script>

</body>

</html>
