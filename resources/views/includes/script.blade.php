<!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('assets/js/init/weather-init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('assets/js/init/fullcalendar-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/richtexteditor/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/richtexteditor/richtexteditor/plugins/all_plugins.js') }}"></script>

    <script>
	var editor1 = new RichTextEditor(".div_editor1");
	//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    </script>

    <!-- script untuk memunculkan modal secara otomatis dari url, load modal menggunakan ajax secara otomatis -->
    <script>
        jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                // variabel button akan dibinding dengan modal yang diatas, jadi saat di klik tombol, modal akan keluar
                var button = $(e.relatedTarget);
                var modal = $(this);

                // nanti akan cek tag modal-body yang isinya data remote, data remote itu ambil dari html dari route transactions.show
                modal.find('.modal-body').load(button.data("remote"));

                // ini untuk properti title
                modal.find('.modal-title').html(button.data("title"));
            });
        });
    </script>

    <!-- ini script modal -->
    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h5 class="modal-title"></h5>
                </div>

                <div class="modal-body">
                    <!-- <i class="fa fa-spinner fa-spin"></i> -->
                </div>
            </div>
        </div>
    </div>
