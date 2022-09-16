<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                2018 © Highdmin. - Coderthemes.com
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="{{ asset('asset/Backend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('asset/Backend/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('asset/Backend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('asset/Backend/assets/js/waves.js')}}"></script>
<script src="{{ asset('asset/Backend/assets/js/jquery.slimscroll.js')}}"></script>

<!-- Flot chart -->
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.min.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/curvedLines.js')}}"></script>
<script src="{{ asset('asset/Backend/../plugins/flot-chart/jquery.flot.axislabels.js')}}"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="{{ asset('asset/Backend/../plugins/jquery-knob/jquery.knob.js')}}"></script>

<!-- Dashboard Init -->
<script src="{{ asset('asset/Backend/assets/pages/jquery.dashboard.init.js')}}"></script>

<!-- App js -->
<script src="{{ asset('asset/Backend/assets/js/jquery.core.js')}}"></script>
<script src="{{ asset('asset/Backend/assets/js/jquery.app.js')}}"></script>

@yield('backend_script')

</body>
</html>
