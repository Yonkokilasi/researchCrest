<?php
session_start();
include("php/connect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="We offer cheap research papers for sale online. Try us today for all your research paper and essay needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1" ,>
    <title>Research Paper Web - For All Your Research Essay Needs</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/rpwFAVICON.png" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/navigation.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>

</head>

<body>

    <div id="top-of-page" class="header-content container-fluid  ">

        <div class="navigation row">
            <nav class="navbar navbar-expand-lg fixed-top ">
                <div class="logo col-md-2">
                    <a class="navbar-brand" href="#">
                        <img class="logo" alt="research-paper-web-logo" src="assets/img/rpwLOGO.png" />
                    </a>
                </div>

                <div class="menu col-md-10">
                    <ul class="topnav navbar-nav " id="myTopnav">
                        <li class="icon ">
                            <a class="nav-link" href="javascript:void(0);" onclick="myFunction()">&#9776; Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#get-started">HOW IT WORKS</a>
                        </li>
                        <li class="nav-item">
                            <a href="frequently-asked-questions.php">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a href="samples.php">SAMPLES</a>
                        </li>
                        <li class="dropdown_holder nav-item">
                            <a href="#">SERVICES</a>
                            <ul class="dropdown">
                                <?php
                                $sql = "SELECT * FROM seo WHERE page_column = 'Column One'";
                                $result = mysqli_query($Con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $url = $row['url'];
                                    $url_name = $row['url_name'];
                                    ?>
                                    <li>
                                        <a href="<?php echo $url; ?>">
                                            <?php echo $url_name; ?>
                                        </a>
                                    </li>
                                    <?php	
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="blog.php">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a href="post-order.php" style="color: #fff;" class="special_link" rel="nofollow">
                                <i class="fa fa-shopping-cart"></i> ORDER</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" style="color: #fff;" class="special_link">
                                <i class="fa fa-lock"></i> LOG IN</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

    <section class="header-top">

        <div class="row">
            <h1 class="relax_heading col-md-12">Relax, We Write Your Research Papers and Essays!</h1>
            <!-- Buttons section -->
            <div class="col-md-4">
                <a class="btn btn-xl text-uppercase red-btn" href="#learn-more-cards">Learn more</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-xl text-uppercase green_btn" href="#get-started">Get Started</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-xl text-uppercase grey-btn" href="post-order.php" rel="nofollow">Order now</a>
            </div>
            <!-- end of button section -->

            <div class=" col-md-6">
                <!-- <div class="calculator">
                        <h3 class="calc_h3">Calculate Your Price Here</h3>
                        <hr />
                        <form method="post" action="" id="calc">
                            <fieldset>
                                <label for="level">Academic Level</label>
                                <select name="level" id="level" onchange="Calculate();">
                                    <option value="1.6">High School</option>
                                    <option value="1.8" selected>Undergraduate</option>
                                    <option value="1.8">Masters</option>
                                    <option value="1.9">Doctorate</option>
                                </select>
                                <br />
                                <label for="deadline">Pages</label>
                                <select name="page" id="page" onchange="Calculate();">
                                    <option value="1">275 Words / 1 Page</option>
                                    <option value="2">550 Words / 2 Pages</option>
                                    <option value="3">825 Words / 3 Pages</option>
                                    <option value="4">1100 Words / 4 Pages</option>
                                    <option value="5">1375 Words / 5 Pages</option>
                                    <option value="6">1650 Words / 6 Pages</option>
                                    <option value="7">1925 Words / 7 Pages</option>
                                    <option value="8">2200 Words / 8 Pages</option>
                                    <option value="9">2475 Words / 9 Pages</option>
                                    <option value="10">2750 Words / 10 Pages</option>
                                    <option value="11">3025 Words / 11 Pages</option>
                                    <option value="12">3300 Words / 12 Pages</option>
                                    <option value="13">3575 Words / 13 Pages</option>
                                    <option value="14">3850 Words / 14 Pages</option>
                                    <option value="15">4125 Words / 15 Pages</option>
                                    <option value="16">4400 Words / 16 Pages</option>
                                    <option value="17">4675 Words / 17 Pages</option>
                                    <option value="18">4950 Words / 18 Pages</option>
                                    <option value="19">5225 Words / 19 Pages</option>
                                    <option value="20">5500 Words / 20 Pages</option>
                                </select>
                                <br />
                                <label for="deadline">Deadline</label>
                                <select name="deadline" id="deadline" onchange="Calculate();">
                                    <option value="1.2">6 Hours</option>
                                    <option value="1.1">12 Hours</option>
                                    <option value="1.0">1 Day</option>
                                    <option value="0.95">2 Days</option>
                                    <option value="0.9">3 Days</option>
                                    <option value="0.85">4 Days</option>
                                    <option value="0.8">5 Days</option>
                                    <option value="0.75">7 Days</option>
                                    <option selected="selected" value="0.7">14 Days</option>
                                    <option value="0.65">30 Days</option>
                                </select>
                            </fieldset>
                        </form>
                        <div class="display_cost">Total Cost:
                            <div class="dollar_sign">&#36;</div>
                            <div id="lblRes">13</div>
                            <a class="calc_order" href="post-order.php" rel="nofollow">CONTINUE</a>
                        </div>
                    </div> -->
            </div>

        </div>
        <script type="text/javascript">
            function Calculate() {
                var l = document.getElementById('level').value;
                var p = document.getElementById('page').value;
                var d = document.getElementById('deadline').value;
                var result = l * p * d * 10.5 + 2.0;
                result = parseFloat(result).toFixed(0);
                document.getElementById('lblRes').innerHTML = result;
            }
        </script>

    </section>
    </div>
        </div>
 <section class="icons">

        <div class="iconic">
            <i class="fa fa-briefcase icon-circle-background"></i>

            <h4>Professional writers</h4>

            <p>With the minimum qualification being a Bachelor's, we got the best writers.</p>

        </div>

        <div class="iconic">
            <i class="fa fa-diamond icon-circle-background"></i>

            <h4>Quality work</h4>

            <p>With close adherence to quality, we ensure that we submit only perfect papers.</p>
        </div>

        <div class="iconic">
            <i class="fa fa-shield icon-circle-background"></i>

            <h4>Non-plagiarized papers</h4>

            <p>Only original research papers that meet world standards are our cup of tea.</p>
        </div>

    </section>


    <section id="get-started" class="icons_2  container-fluid">
        <h2>How Do I Get My Paper Done at Research Paper Web?</h2>
        <div class="row">

            <div class="mockup col-md-6 left-get-started-section">
                <!-- <img src="assets/img/order-paper.png" style="display: block; width: 100%; height: auto;" alt="write-my-research-paper-cheap"/> -->
            </div>

            <div class="mockup col-md-6">
                <div class="step_holder">
                    <h3>Fill the order form</h3>
                    <p class="aligned">Click on the order button and provide the details requested. These include all the details and instructions
                        pertaining to your order. At the last step, you will be required to input your email address and
                        a password you can easily remember.</p>
                </div>

                <div class="step_holder">
                    <h3>Make Payment</h3>
                    <p class="aligned">After filling the order form and inputting your email and password, just click on "Submit Order". You
                        will be redirected to PayPal where you can make payment for your order. You don't have to have an
                        account with PayPal to make your payment; you can pay through PayPal using your credit card.</p>
                </div>

                <div class="step_holder">
                    <h3>We assign your order</h3>
                    <p class="aligned">
                        After you have paid for your order, we will receive it and its status will show as "Under Review". At this stage of your
                        order, we review it to determine the most qualified writer to handle it. We then assign it and the
                        status changes to "In Progress", the stage during which you can chat with the writer to monitor the
                        order's progress.</p>
                </div>
                <div class="step_holder">
                    <h3>Receive your paper</h3>
                    <p class="aligned">
                       After the writer is done writing your paper, they post its answer to the files section of your order where you can download it.
                        You can either approve the order if it meets your requirements or request for necessary revisions until you are satisfied.</p>
                </div>
                <div class="step_holder">
                    <a class=" red-btn btn btn-xl" href="post-order.php" rel="nofollow">Start now</a>
                </div>
            </div>
        </div>


        </div>
    </section>
    <section class="testimonial_section">
        <h2>Customer Testimonials</h2>
        <div class="testimon_wrapper">
            <div class="testimon">
                <div class="slider_testimon fade">
                    <p style="font-weight: bold; padding: 0; margin: 0;">EMMA
                        <span style="float: right;">
                            <i class="fa fa-star" style="color: #ff6858; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffb244; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffff63; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #93ef56; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #6BAE3F; padding: .3rem;"></i>
                        </span>
                    </p>
                    <hr class="underline" />
                    <p>
                        My worry was getting an agency that would charge less and deliver top-quality papers for me. That sounded rather impossible
                        since most agencies out there were on my neck with their exaggerated charges. Research Paper Web
                        proved to be a unique agency. They have the best writers yet offering services at lenient charges.
                    </p>
                    <hr class="over" align="left" noshade="0" />
                    <p class="completed">
                        <i class="fa fa-history" style="color: #6BAE3F; padding: .3rem; font-size: 1.2rem;"></i>
                        COMPLETED 4 HOURS AGO</p>
                </div>
                <div class="slider_testimon fade">
                    <p style="font-weight: bold; padding: 0; margin: 0;">HEMMY
                        <span style="float: right;">
                            <i class="fa fa-star" style="color: #ff6858; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffb244; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffff63; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #93ef56; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #6BAE3F; padding: .3rem;"></i>
                        </span>
                    </p>
                    <hr class="underline" />
                    <p>
                        Just like most students out there, I had a pile of assignments to cover in a short deadline. I guess I got lazy and wasted
                        all the time I had. I definitely needed help. Research Paper Web offered priceless help. I was impressed
                        with their speed and professionalism. Should I get lazy more?
                    </p>
                    <hr class="over" align="left" noshade="0" />
                    <p class="completed">
                        <i class="fa fa-history" style="color: #6BAE3F; padding: .3rem; font-size: 1.2rem;"></i> COMPLETED 5 DAYS AGO</p>
                </div>
                <div class="slider_testimon fade">
                    <p style="font-weight: bold; padding: 0; margin: 0;">VANESSA
                        <span style="float: right;">
                            <i class="fa fa-star" style="color: #ff6858; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffb244; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffff63; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #93ef56; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #6BAE3F; padding: .3rem;"></i>
                        </span>
                    </p>
                    <hr class="underline" />
                    <p>
                        Assignments! Assignments! Assignments! The last thing I wanted to hear. But I am still thankful to my right-hand agency.
                        Research Paper Web has been helping me for the last 4 semesters. I still want to continue with their
                        services. They never let me down. Any day any time, the agency is ready to handle my assignment.
                        I have full trust in them.
                    </p>
                    <hr class="over" align="left" noshade="0" />
                    <p class="completed">
                        <i class="fa fa-history" style="color: #6BAE3F; padding: .3rem; font-size: 1.2rem;"></i> COMPLETED 4 HOURS AGO</p>
                </div>
                <div class="slider_testimon fade">
                    <p style="font-weight: bold; padding: 0; margin: 0;">JESSICA
                        <span style="float: right;">
                            <i class="fa fa-star" style="color: #ff6858; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffb244; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #ffff63; padding: .3rem;"></i>
                            <i class="fa fa-star" style="color: #93ef56; padding: .3rem;"></i>
                            <i class="fa fa-star-o" style="color: #6BAE3F; padding: .3rem;"></i>
                        </span>
                    </p>
                    <hr class="underline" />
                    <p>
                        What was I supposed to do with my research paper yet I missed almost all classes in my last semester? Well, the last thing
                        I could think of was failing. I went around and found myself at Research Paper Web. They handled
                        my paper like a piece of cake and Voila! I had everything done. Thanks a lot.
                    </p>
                    <hr class="over" align="left" noshade="0" />
                    <p class="completed">
                        <i class="fa fa-history" style="color: #6BAE3F; padding: .3rem; font-size: 1.2rem;"></i>
                        COMPLETED 2 HOURS AGO
                    </p>
                </div>
            </div>
            <div class="arrow_down"></div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </section>
    <section id="learn-more-cards" class="contents_container container-fluid">
        <h4 class="contents_container_heading">We Can Write Research Papers at Affordable Prices!</h2>

            <div class="row cards-wrapper">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Cheap Research Papers for Sale, Offered by Professionals
                        </div>
                        <div class="card-body">
                            <h4 class="card-title to-hide"> Are you operating in a considerably low budget, yet in need of custom research papers?</h5>
                                <p class="card-text to-hide">
                                    We mind your pocket and that is why we do not hit you so hard. We have the privilege of dealing with the most professional
                                    writers ever. For this reason, we have one big assurance- that you will get professional
                                    research papers at cheap prices.
                                </p>
                                <p class="card-text to-show">
                                    A student who is in need of help should get more than just mere help. We are the partners that you need at this time, and
                                    we will proudly hold your hand until you hit the top score that you have always wanted.
                                    Satisfaction is what we always advocate for. Your low budget will not deny you the satisfaction
                                    as long as you deal with Research Paper Web.
                                    <br>
                                    <a class="btn card-btn" href="post-order.php" rel="nofollow">Order now</a>
                                </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Will You Write My Research Paper the Way I Want?
                        </div>
                        <div class="card-body">
                            <h4 class="card-title to-hide">We are here to boldly confirm that we will indeed work on your paper just the way you want.</h5>
                                <p class="card-text to-hide"> That is our promise. Since the inception of our company, it has been an experience of nothing
                                    but pure growth. For this very reason, we are able to approach all papers based on the
                                    instructions provided. We also give room for revisions.</p>

                                <p class="card-text to-show">
                                    So, what makes us confirm this boldly? First, we enjoy a great privilege of having an able and powerful team of writers.
                                    Each and every writer understands the need to abide by the instructions provided. Today,
                                    we stand as the most experienced research paper writing team. We hold pride in that.
                                    <br>
                                    <a class="btn card-btn" href="post-order.php" rel="nofollow">Order now</a>
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Research Papers for College and Graduate Students
                        </div>
                        <div class="card-body">
                            <h4 class="card-title to-hide"> Are you pursing your course at college level?</h5>
                                <p class="card-text to-hide">Are there research papers in that divide that you want handled? Well, Research Paper Web
                                    is right by your side to offer you the college paper help that you badly need.Bring that
                                    college research paper today and experience the sweetness of top score.</p>

                                <p class="card-text to-show">
                                    Our team is able to work on projects in different levels, including college. This means that you do not have to worry about
                                    complexity of discipline of the research paper that you want done. Let us do the heavy
                                    lifting Graduate students are not left behind. They will get equally best research papers.
                                    <br>
                                    <a class="btn card-btn" href="post-order.php" rel="nofollow">Order now</a>
                                </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            We Have Discounts for Everyone Who Is Ready to Order Now
                        </div>
                        <div class="card-body">
                            <h4 class="card-title to-hide">We go a step further to offer juicy discounts for all</h5>
                                <p class="card-text to-hide ">
                                    Our sole purpose here is to make sure that you have no reason to complain of expensive research paper writing services. We
                                    take pride in being the most lenient and cheap research paper writing service today,
                                    without compromising on quality.
                                </p>
                                <p class="card-text to-show">
                                    First, your first order will be granted a coupon code.You can get upto 30% off .Our company provides several other free perks
                                    such as the cover page, list of references and much more. Research Paper Web just gave
                                    you the reason to smile. Kiss bad grades goodbye with the best rates on research papers.
                                    <br>
                                    <a class="btn card-btn" href="post-order.php" rel="nofollow">Order now</a>

                                </p>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <footer>
        <div class="footer-section">
            <div class="row">
                <div class="footer_links container">
                    <a href="about.php">ABOUT US</a>
                    <a href="revision-policy.php">REVISION POLICY</a>
                    <a href="money-back.php">MONEY BACK POLICY</a>
                    <a href="disclaimer.php">DISCLAIMER</a>
                    <a href="contact.php">CONTACT US</a>
                </div>
                <div class="col-md-12">
                    <div class="social_links">
                        <a href="https://www.facebook.com/Research-Paper-Web-1548390675251097/" target="blank">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="https://www.instagram.com/researchpaper_web/" target="blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://twitter.com/Rsearchpaperweb" target="blank">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                        <a href="https://plus.google.com/u/0/110457827188482190338" target="blank">
                            <i class="fa fa-google-plus-square"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 copyright">
                    Copyright &#169; 2017 researchpaperweb.com. All rights reserved.
                </div>
    </footer>
    <a href="#top-of-page" class="scroll top_scroller">
        <img src="assets/img/top-scroller.png" alt="scroller-to-top">
        </span>
    </a>

    <!--Smooth Scroller plus hide versus show anchor-->

    <!-- Start of Accordion script -->
    <script type="text/javascript">
        var acc = document.getElementsByClassName("content_accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].onclick = function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            }
        }
    </script>
    <!--Slider for testimonials-->
    <script type="text/javascript">
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("slider_testimon");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
    <div id="status2"></div>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/596bbe606edc1c10b034642f/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <script type="text/javascript">
        Tawk_API = Tawk_API || {};
        Tawk_API.onStatusChange = function (status) {
            if (status === 'online') {
                document.getElementById('status2').innerHTML =
                    '<a href="javascript:void(Tawk_API.toggle())"> <img src="assets/img/online_image.png" class = "fixedbutton"> </a>';
            } else if (status === 'away') {
                document.getElementById('status2').innerHTML =
                    '<a href="javascript:void(Tawk_API.toggle())"> <img src="assets/img/offline_image.png" class = "fixedbutton"> </a>';
            } else if (status === 'offline') {
                document.getElementById('status2').innerHTML =
                    '<a href="javascript:void(Tawk_API.toggle())"> <img src="assets/img/offline_image.png" class = "fixedbutton"> </a>';
            }
        };
    </script>

    <!--End of tawk.to Status Code -->

</body>

</html>