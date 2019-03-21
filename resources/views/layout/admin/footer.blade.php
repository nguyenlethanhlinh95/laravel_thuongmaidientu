</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Core Scripts - Include with every page -->
<script src="assets/admin/js/jquery.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>
<script src="assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Page-Level Plugin Scripts - Blank -->

<!-- SB Admin Scripts - Include with every page -->
<script src="assets/admin/js/sb-admin.js"></script>

@yield('js')
<script>
    $(document).ready(function(){
        $('.alertBox').removeClass('hide');
        $('.alertBox').delay(3000).slideUp(400);
    });
</script>
<!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
