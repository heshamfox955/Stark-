</div>
<script src="{{asset('app/backend')}}/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="{{asset('app/backend')}}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="{{asset('app/backend')}}/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- chart chartist js -->
<script src="{{asset('app/backend')}}/vendor/charts/chartist-bundle/chartist.min.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/chartist-bundle/Chartistjs.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
<!-- chart C3 js -->
<script src="{{asset('app/backend')}}/vendor/charts/c3charts/c3.min.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<!-- chartjs js -->
<script src="{{asset('app/backend')}}/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/charts-bundle/chartjs.js"></script>
<!-- sparkline js -->
<script src="{{asset('app/backend')}}/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- dashboard finance js -->
<script src="{{asset('app/backend')}}/libs/js/dashboard-finance.js"></script>
<!-- gauge js -->
<script src="{{asset('app/backend')}}/vendor/gauge/gauge.min.js"></script>
<!-- morris js -->
<script src="{{asset('app/backend')}}/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/morris-bundle/morris.js"></script>
<script src="{{asset('app/backend')}}/vendor/charts/morris-bundle/morrisjs.html"></script>
<!-- daterangepicker js -->
<script src="{{asset('app/backend')}}/vendor/parsley/parsley.js"></script>
<script src="{{asset('app/backend')}}/libs/js/myFunctions.js"></script>

<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
</body>
</html>