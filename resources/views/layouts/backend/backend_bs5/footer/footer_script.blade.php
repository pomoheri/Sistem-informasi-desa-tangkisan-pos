<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
{{--<div id="shortcut">--}}
{{--    <ul>--}}
{{--        <li>--}}
{{--            <a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{url('backend_layout/js/plugin/pace/pace.min.js')}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="{{url('backend_layout/js/libs/jquery-3.2.1.min.js')}}"></script>

<script src="{{url('backend_layout/js/libs/jquery-ui.min.js')}}"></script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{url('backend_layout/js/app.config.js')}}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="{{url('backend_layout/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{url('backend_layout/js/bootstrap/bootstrap.min.js')}}"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="{{url('backend_layout/js/notification/SmartNotification.min.js')}}"></script>

<!-- JARVIS WIDGETS -->
<script src="{{url('backend_layout/js/smartwidgets/jarvis.widget.min.js')}}"></script>

<!-- EASY PIE CHARTS -->
<script src="{{url('backend_layout/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>

<!-- SPARKLINES -->
<script src="{{url('backend_layout/js/plugin/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{url('backend_layout/js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{url('backend_layout/js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="{{url('backend_layout/js/plugin/select2/select2.min.js')}}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{{url('backend_layout/js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}"></script>

<!-- browser msie issue fix -->
<script src="{{url('backend_layout/js/plugin/msie-fix/jquery.mb.browser.min.js')}}"></script>

<!-- FastClick: For mobile devices -->
<script src="{{url('backend_layout/js/plugin/fastclick/fastclick.min.js')}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
{{--<script src="{{url('backend_layout/js/demo.min.js')}}"></script>--}}

<!-- MAIN APP JS FILE -->
<script src="{{url('backend_layout/js/app.min.js')}}"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="{{url('backend_layout/js/speech/voicecommand.min.js')}}"></script>

<!-- SmartChat UI : plugin -->
<script src="{{url('backend_layout/js/smart-chat-ui/smart.chat.ui.min.js')}}"></script>
<script src="{{url('backend_layout/js/smart-chat-ui/smart.chat.manager.min.js')}}"></script>

<!--  Plugin for Sweet Alert -->
<script src="{{url('assets/js/plugins/sweetalert2.js')}}"></script>

<!--  Plugin for Sweet Alert -->
<script src="{{url('assets/js/plugins/jquery.inputmask.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/flatpickr/flatpickr.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/flatpickr/index.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/jquery-validate/jquery.form-validator.min.js')}}"></script>

<!-- PAGE RELATED PLUGIN(S) -->
        <script src="{{url('backend_layout/js/plugin/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('backend_layout/js/plugin/datatables/dataTables.colVis.min.js')}}"></script>
        <script src="{{url('backend_layout/js/plugin/datatables/dataTables.tableTools.min.js')}}"></script>
        <script src="{{url('backend_layout/js/plugin/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{url('backend_layout/js/plugin/datatable-responsive/datatables.responsive.min.js')}}"></script>

<!-- WORD -->

<script src="{{asset('assets/js/FileSaver.js')}}"></script> 
<script src="{{asset('assets/js/jquery.wordexport.js')}}"></script> 

<!-- HIGHSCHART -->
<script src="{{ asset('assets/highchart/code/highcharts.js') }}"></script>
<script src="{{ asset('assets/highchart/code/highcharts-more.js') }}"></script>
<script src="{{ asset('assets/highchart/code/modules/data.js') }}"></script>
<script src="{{ asset('assets/highchart/code/modules/drilldown.js') }}"></script>
<script src="{{ asset('assets/highchart/code/modules/exporting.js') }}"></script>
<script src="{{ asset('assets/highchart/code/modules/export-data.js') }}"></script>
<script src="{{ asset('assets/highchart/code/modules/variable-pie.js') }}"></script>

<!-- current -->
<script src="{{url('current/format/simple.money.format.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('.review').change(function(){
               var review = $('#review').val();

               //JIKA TDK MEMADAI
               if(review != 4){
                    $('#keterangan').prop('disabled',true);
                    $('#keterangan').val('');
               } else {
                     $('#keterangan').prop('disabled',false);
               } 

           });
    });

    function setMask() {

            $('.uang').inputmask({
                alias:"decimal",
                digits:0,
                repeat:12,
                digitsOptional:false,
                decimalProtect:true,
                groupSeparator:",",
                placeholder: '0',
                radixPoint:".",
                radixFocus:true,
                autoGroup:true,
                autoUnmask:false,
                onBeforeMask: function (value, opts) {
                    return value;
                },
                removeMaskOnSubmit:true
            });
            

        }
</script>


<!-- Your GOOGLE ANALYTICS CODE Below -->
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    inputMask();
function inputMask(){
    $('.numeric').inputmask({
        alias:"numeric",
        digits:2,
        repeat:15,
        digitsOptional:false,
        decimalProtect:true,
        groupSeparator:".",
        placeholder: '0',
        radixPoint:",",
        radixFocus:true,
        autoGroup:true,
        autoUnmask:false,
        clearMaskOnLostFocus: false,
        onUnMask: function (maskedValue, unmaskedValue) {
            var x = maskedValue.split(',');
            return x[0].replace(/\./g, '') + '.' + x[1];
        },
        removeMaskOnSubmit:true
    });

    $('.integer').inputmask({
        alias:"integer",
        digits:0,
        repeat:15,
        digitsOptional:false,
        decimalProtect:false,
        groupSeparator:".",
        placeholder: '0',
        radixFocus:true,
        autoGroup:true,
        autoUnmask:true,
        clearMaskOnLostFocus: false,
        removeMaskOnSubmit: true,
        onBeforeMask: function (value, opts) {
            return value;
        },
        removeMaskOnSubmit:true
    });

    $('.tahun').inputmask({
        alias:"integer",
        repeat:4,
        digitsOptional:false,
        decimalProtect:false,
        placeholder: '0',
        radixFocus:true,
        autoGroup:true,
        autoUnmask:false,
        onBeforeMask: function (value, opts) {
            return value;
        },
        removeMaskOnSubmit:true
    });
}

</script>
