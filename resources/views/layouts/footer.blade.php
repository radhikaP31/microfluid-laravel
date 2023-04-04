<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 footer-links">
          <h4 class="usefull-links header-font-size">Microfluid</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url'); ?>">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/about'; ?>">About Us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/1'; ?>">Products</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/industries'; ?>">Industries</a></li>
            <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Clients</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Blogs</a></li> -->
            <!-- <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/inquiry'; ?>">Inquiry</a></li> -->
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/contact'; ?>">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4 class="products header-font-size">Products</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/1'; ?>">High Pressure Homogenizers</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/2'; ?>">Hygenic Pumps</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/1/8'; ?>">Homogenizer Spare Parts</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/6'; ?>">Sanitary Filters & Strainers</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/8'; ?>">Hygenic Fittings</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo config('app.base_url') . '/product/1'; ?>">Read More...</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4 class="text-white contact-us header-font-size">Contact Us</h4>
          <ul>
            <li><span class="text-white" style="margin-right: 4%;"><i class="fa fa-phone fa-rotate-90"></i> +91 70168 65019 </span></li>
            <li><span class="text-white" style="letter-spacing: 1px;"><i class="fa fa-envelope"></i>&nbsp;<a class="text-white hover-mail" href="mailto:sales@microfluidprocess.com">sales@microfluidprocess.com</a> </span></li>
          </ul>
          <div class="pt-3 social-links" style="line-height: 53px;">
            <a href="https://api.whatsapp.com/send?phone=917016865019&amp;text=Hi, I want to business with you!!" target="_blank" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <!-- <a href="#" class="pinterest"><i class="bx bxl-pinterest"></i></a>
            <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a> -->
            <!-- <a href="#" class="skype"><i class="bx bxl-skype"></i></a> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-md-flex primary-bg" style="padding: 14px 35px 14px 35px;">

    <div class="mr-md-auto text-center text-md-left container">
      <p class="text-white" style="letter-spacing: 1.2px;">
        <a class="text-white">Download</a> |
        <a class="text-white">Career</a> |
        <!-- <a class="text-white">HR Policy</a> |
        <a class="text-white">Terms & Conditions</a> | -->
        <a href="{{route('contact')}}" class="text-white">Contact Us</a> |
        <a href="{{route('home')}}" class="text-white">Microfluid</a>
      </p>
      <div class="copyright text-white">
        <p style="letter-spacing: 0.9px;">&copy; Copyright <?php echo date('Y') ?> - All rights reserved by <strong><span>Microfluid Process Equipment</span></strong></p>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
<script src="{{ asset('files/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('files/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('files/jquery-sticky/jquery.sticky.js') }}"></script>
<script src="{{ asset('files/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('files/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('files/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('files/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('files/aos/aos.js') }}"></script>