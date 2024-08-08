<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>River Monitoring</title>

        <!-- bootstrap css -->
        <link rel="stylesheet" type="text/css" href="teab-1.0.0/css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="teab-1.0.0/css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="teab-1.0.0/css/responsive.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="teab-1.0.0/css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <!-- owl stylesheets -->
        <link rel="stylesheet" href="teab-1.0.0/css/owl.carousel.min.css">
        <link rel="stylesoeet" href="teab-1.0.0/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
            media="screen">
    </head>
    <body>
    <div class="clients_section layout_padding">
      <div id="custum_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container">
                  <h1 style="width: 90%; margin: 0 auto; font-size: 44px; color: #0d0d0c; text-align: center; font-weight: bold;">Sistem Monitoring Ketinggian dan Warna Air Sungai</h1>
                  <p class="clients_text">Sistem ini digunakan untuk memantau ketinggian dan warna air sungai di dua tempat yang berbeda. Sistem terhubung dengan perangkat IoT yang mengirimkan data secara real-time.</p>
                  <div class="see_bt"><a href="dashboard.php" style="margin-bottom: 20px;">Mulai</a></div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 style="width: 90%; margin: 0 auto; font-size: 44px; color: #0d0d0c; text-align: center; font-weight: bold;">Mitigasi Bencana: Kurangi Dampak dari Bencana yang Mungkin Terjadi</h1>
                  <p class="clients_text">Membantu dalam memperkirakan potensi banjir atau longsor, sehingga dapat dilakukan tindakan pencegahan atau mitigasi sebelum bencana terjadi dengan memberikan peringatan dini.</p>
                  <div class="see_bt"><a href="dashboard.php" style="margin-bottom: 20px;">Mulai</a></div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container">
                  <h1 style="width: 90%; margin: 0 auto; font-size: 44px; color: #0d0d0c; text-align: center; font-weight: bold;">Internet of Things: Rasakan Manfaat dari Perkembangan Teknologi</h1>
                  <p class="clients_text">Internet of Things memungkinkan untuk melakukan monitoring secara real-time, kontrol jarak jauh, efisiensi biaya, mendapatkan data yang akurat dan peringatan dini.</p>
                  <div class="see_bt"><a href="dashboard.php" style="margin-bottom: 20px;">Mulai</a></div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#custum_slider" role="button" data-slide="next">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#custum_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>

    <!-- Javascript files-->
   <script src="teab-1.0.0/js/jquery.min.js"></script>
   <script src="teab-1.0.0/js/popper.min.js"></script>
   <script src="teab-1.0.0/js/bootstrap.bundle.min.js"></script>
   <script src="teab-1.0.0/js/jquery-3.0.0.min.js"></script>
   <script src="teab-1.0.0/js/plugin.js"></script>
   <!-- sidebar -->
   <script src="teab-1.0.0/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="teab-1.0.0/js/custom.js"></script>
   <!-- javascript -->
   <script src="teab-1.0.0/js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <script>
      $(document).ready(function () {
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
         });
      });
   </script>
   <script>
      $(document).ready(function () {
         $(".collapse.show").each(function () {
            $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
         });

         $(".collapse").on('show.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
         }).on('hide.bs.collapse', function () {
            $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
         });
      });
   </script>
    </body>
</html>