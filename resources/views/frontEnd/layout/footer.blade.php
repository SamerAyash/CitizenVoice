<!-- footer  -->
<section id="footer" style="background-color: #26272b;color: aliceblue;">
    <div class="container border-bottom pt-4">
        <div class="row p-4 pt-5">
            <div class="col-md-6 col-lg-6">
                <div class="about-footer">
                    <h4>ABOUT</h4>
                    <p>Scanfcode.com CODE WANTS TO BE SIMPLE is an initiativ
                        e to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code
                        or snippets as the code wants to be simple. We will help programmers
                        build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 text-center" style="line-height: 2;">
                <h6>QUICK LINKS</h6>
                <ul class="quicklinks">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="./makesug.html">Make news</a></li>
                    <li><a href="./lastnews.html">Last News </a></li>
                    <li><a href="./login.html">Login</a></li>
                    <li><a href="./signup.html">Sign Up</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3 text-center" style="line-height: 2;">
                <h6>Contact Us</h6>
                <ul class="quicklinks">
                    <li><a href="#">How it works?</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-8">
                <p class="copyright"><span>Copyright &copy; 2021 All Rights Reserved by me</span></p>
            </div>
            <div class="col-lg-4">
                <ul class="social d-flex justify-content-center">
                    <li class="mx-3"><img src="{{asset('/assets/img/social/facebook.svg')}}" class="w-100 h-100" alt=""> </li>
                    <li class="mx-3"><img src="{{asset('/assets/img/social/linkedin.svg')}}" class="w-100 h-100" alt=""> </li>
                    <li class="mx-3"><img src="{{asset('/assets/img/social/twitter.svg')}}" class="w-100 h-100" alt=""> </li>
                    <li class="mx-3"><img src="{{asset('/assets/img/social/youtube.svg')}}" class="w-100 h-100" alt=""> </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- footer  -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/js/wow.min.js')}}"></script>
<script src="{{asset('/assets/js/swiper.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        centeredSlides: true,
        spaceBetween: 30,
        speed:100,
        autoplay: true,
        loop: true,
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@stack('script')
