<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  Custom styles for this template -->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid py-5 mt-5">
        <!-- 404 Error Text -->
        <div class="text-center mt-5">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Halaman Tidak Ditemukan</p>

            <a href="<?= base_url('/') ?>">&larr; Kembali Ke beranda</a>
        </div>
    </div>
    <!-- Footer -->

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; TEAM IT - BUMA SITE IPR - 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

</body>

<!-- Bootstrap core JavaScript-->
<!-- databel -->
<script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>


<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>
<!-- Page level plugins -->
<script src="<?= base_url('assets') ?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page pop up -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
   <script src="<?= base_url('assets') ?>/js/popup.js"></script> -->

<script>
    // Loading Page

    var myVar;



    function myFunction() {

        myVar = setTimeout(showPage, 500);

    }



    function showPage() {

        document.getElementById("loader").style.display = "none";

        document.getElementById("myDiv").style.display = "block";

    }
</script>
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>

<!-- <script>
     // Set new default font family and font color to mimic Bootstrap's default styling
     Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
     Chart.defaults.global.defaultFontColor = '#858796';

     function number_format(number, decimals, dec_point, thousands_sep) {
       // *     example: number_format(1234.56, 2, ',', ' ');
       // *     return: '1 234,56'
       number = (number + '').replace(',', '').replace(' ', '');
       var n = !isFinite(+number) ? 0 : +number,
         prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
         sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
         dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
         s = '',
         toFixedFix = function(n, prec) {
           var k = Math.pow(10, prec);
           return '' + Math.round(n * k) / k;
         };
       // Fix for IE parseFloat(0.55).toFixed(0) = 0;
       s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
       if (s[0].length > 3) {
         s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
       }
       if ((s[1] || '').length < prec) {
         s[1] = s[1] || '';
         s[1] += new Array(prec - s[1].length + 1).join('0');
       }
       return s.join(dec);
     }

     // Bar Chart Example
     var ctx = document.getElementById("myBarChart");
     var myBarChart = new Chart(ctx, {
       type: 'bar',
       data: {
         labels: ["Januari", "Februari", "Maret", "April", "Mai", "Juni", "juli", "Agustus", "Septembera", "Oktober", "November", "Desember"],
         datasets: [{
           label: "Revenue",
           backgroundColor: "#4e73df",
           hoverBackgroundColor: "#2e59d9",
           borderColor: "#4e73df",

           data: [<?= $bulan1 ?>, <?= $bulan2 ?>, <?= $bulan3 ?>, <?= $bulan4 ?>, <?= $bulan5 ?>, <?= $bulan6 ?>, <?= $bulan7 ?>, <?= $bulan8 ?>, <?= $bulan9 ?>, <?= $bulan10 ?>, <?= $bulan11 ?>, <?= $bulan12 ?>],
         }],
       },
       options: {
         maintainAspectRatio: false,
         layout: {
           padding: {
             left: 10,
             right: 25,
             top: 25,
             bottom: 0
           }
         },
         scales: {
           xAxes: [{
             time: {
               unit: 'month'
             },
             gridLines: {
               display: false,
               drawBorder: false
             },
             ticks: {
               maxTicksLimit: 12
             },
             maxBarThickness: 25,
           }],
           yAxes: [{
             ticks: {
               min: 0,
               max: <?= $jml_absen ?>,
               maxTicksLimit: 5,
               padding: 10,
               // Include a dollar sign in the ticks
               callback: function(value, index, values) {
                 return '' + number_format(value);
               }
             },
             gridLines: {
               color: "rgb(234, 236, 244)",
               zeroLineColor: "rgb(234, 236, 244)",
               drawBorder: false,
               borderDash: [2],
               zeroLineBorderDash: [2]
             }
           }],
         },
         legend: {
           display: false
         },
         tooltips: {
           titleMarginBottom: 10,
           titleFontColor: '#6e707e',
           titleFontSize: 14,
           backgroundColor: "rgb(255,255,255)",
           bodyFontColor: "#858796",
           borderColor: '#dddfeb',
           borderWidth: 1,
           xPadding: 15,
           yPadding: 15,
           displayColors: false,
           caretPadding: 10,
           callbacks: {
             label: function(tooltipItem, chart) {
               var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
               return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
             }
           }
         },
       }
     });
   </script> -->

<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/chart-area-demo.js"></script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["IT", "PRODUKSI", "MEKANIK"],
            datasets: [{
                data: [70, 80, 120],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<!-- select -->
<script src="<?= base_url('assets') ?>/select/js/bootstrap-select.min.js"></script>

</html>