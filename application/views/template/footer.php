   <!-- Footer -->
         </div>

                
                <!-- /.container-fluid -->

                <footer class="sticky-footer bg-white">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright &copy; TEAM IT - BUMA SITE IPR - 2023</span>
                    </div>
                  </div>
                </footer>
                <!-- End of Footer -->
                
                
              </div>
              </div>

   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar ?</h5>
           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>
         <div class="modal-body">Klik Tombol Untuk Keluar</div>
         <div class="modal-footer">
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
           <a class="btn btn-primary" href="<?= base_url('login/keluar') ?>">Keluar</a>
         </div>
       </div>
     </div>
   </div>
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


   <!-- Page level custom scripts -->
   <script src="<?= base_url('assets') ?>/js/demo/chart-area-demo.js"></script>
   <script>
     // Set new default font family and font color to mimic Bootstrap's default styling
     Chart.defaults.global.defaultFontFamily = 'Nunito',
       '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
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