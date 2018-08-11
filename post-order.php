<!DOCTYPE html>
<html>

<head lang="en">
    <title>Post Order | Research Paper Web</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Place your order for a perfect research paper!">
    <meta name="viewport" content="width=device-width, initial-scale=1" ,>
    <link rel="shortcut icon" type="image/png" href="img/rpwFAVICON.png" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/wizard.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/scripts2.js"></script>
    <div id="status2"></div>
</head>

<body>

    <div class=" post-order-container">
        <div class="container">
            <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-3">
                    <div class="header__logo">
                        <a href="https://grademiners.com" id="header_logo">
                            <img src="img/logo.png" alt="ResearchPaperCrest.com" class="header__logo-small" />
                            <img src="img/logo.png" alt="Grademiners.com" class="header__logo-big logo" />
                        </a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-10 col-sm-6 col-xs-9 nav-col">

                    <div class="row">
                        <div class="col-md-6 col-lg-8">
                            <nav class="nav" id="nav">
                                <ul id="menu-navigation" class="menu">
                                    <li id="menu-item-1536" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1536">
                                        <a href="#learn-more-cards" itemprop="url">Learn more</a>
                                    </li>
                                    <li id="menu-item-1535" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1535">
                                        <a href="#faq-section" itemprop="url">FAQs</a>
                                    </li>
                                    <li id="menu-item-1537" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1537">
                                        <a href="#how-it-works" itemprop="url">How it works</a>
                                    </li>
                                    <li id="menu-item-1534" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1534">
                                        <a href="https://grademiners.com/partners" itemprop="url">Samples</a>
                                    </li>
                                    <li id="menu-item-5676" class="nav-reviews menu-item menu-item-type-post_type menu-item-object-page menu-item-5676">
                                        <a href="https://grademiners.com/reviews" itemprop="url">Reviews</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-6 col-lg-4 buttons-col">
                            <div class="mobile-nav" id="mobile_nav"></div>
                            <ul class="header__buttons">
                                <li>
                                    <a href="post-order.php" id="order_btn_header" class="order-nav-btn">Order</a>
                                </li>
                                <li>
                                    <div data-crm-widget="loginTooltip"></div>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

            <div class="row post_order_content">
                <div id="top" class="order_wrapper col-md-8">
                    <?php
                    if (isset($_SESSION["info"])) {
                        $info = $_SESSION["info"];
                        echo "
                                    <div class='alert alert-success'>
                                        $info
                                    </div>
                            ";
                        unset($_SESSION["info"]);
                    } elseif (isset($_SESSION["err"])) {
                        $err = $_SESSION["err"];
                        echo "
                                    <div class='alert alert-danger'>
                                        $err
                                    </div>
                            ";
                        unset($_SESSION["err"]);
                    }
                    ?>

                        <ul class="paper_info calculator_wrapper">

                            <li class="active">
                                <div class="wizard_heading_details active_heading">
                                    1. Paper Details
                                    <span class="order-icon">
                                        <img src="img/paper-details.png" class="order-icon">
                                    </span>
                                </div>

                                <form method="POST" action="php/post_order.php" id="order" name="order">
                                    <div class="wizard_content_details form-row">
                                        <div class="form-group  col-md-6">
                                            <label for="paperSubject" class=""> Paper Subject</label>
                                            <select name="paperSubject" id="paperSubject" onclick="randomString();" class="form-control" required>
                                                <optgroup label="Arts & Humanities">
                                                    <option selected>Visual Arts and Film Studies</option>
                                                    <option>Religion and Theology</option>
                                                    <option>Philosophy</option>
                                                    <option>History</option>
                                                    <option>English</option>
                                                    <option>Music</option>
                                                    <option>Literature</option>
                                                    <option>Linguistics</option>
                                                    <option>Ethics</option>
                                                    <option>Archaeology</option>
                                                    <option>Anthropology</option>
                                                </optgroup>
                                                <optgroup label="Social Sciences">
                                                    <option>Geography</option>
                                                    <option>Psychology</option>
                                                    <option>Sociology</option>
                                                    <option>Gender &amp; Sexual Studies</option>
                                                    <option>Human Resources (HR)</option>
                                                    <option>Journalism, mass media and communication</option>
                                                    <option>Political Science</option>
                                                </optgroup>
                                                <optgroup label="Sciences">
                                                    <option>Biology</option>
                                                    <option>Chemistry</option>
                                                    <option>Physics (including Earth and space sciences)</option>
                                                    <option>Microbiology</option>
                                                    <option>Astronomy</option>
                                                    <option>Mathematics</option>
                                                    <option>Statistics</option>
                                                    <option>Earth and Space sciences</option>
                                                </optgroup>
                                                <optgroup label="Information Technology">
                                                    <option>Computer sciences and Information technology</option>
                                                    <option>Logic and programming</option>
                                                    <option>Systems science</option>
                                                </optgroup>
                                                <optgroup label="Applied sciences">
                                                    <option>Agriculture</option>
                                                    <option>Architecture</option>
                                                    <option>Design and Technology</option>
                                                    <option>Engineering and Construction</option>
                                                    <option>Environmental studies</option>
                                                    <option>Health sciences and medicine</option>
                                                    <option>Education</option>
                                                    <option>Nursing</option>
                                                    <option>Military sciences</option>
                                                    <option>Family and consumer science</option>
                                                </optgroup>
                                                <optgroup label="Economics">
                                                    <option>Macro &amp; Micro economics</option>
                                                    <option>Business</option>
                                                    <option>Marketing</option>
                                                    <option>Management</option>
                                                    <option>Finance and Accounting</option>
                                                    <option>E-commerce</option>
                                                    <option>Tourism</option>
                                                    <option>Logistics</option>
                                                </optgroup>
                                                <optgroup label="Law">
                                                    <option>Law</option>
                                                </optgroup>
                                                <optgroup label="Other">
                                                    <option>Creative writing</option>
                                                    <option>Other</option>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="paperTopic">Paper Topic</label>
                                            <input type="text" id="paperTopic" name="paperTopic" placeholder="Writer's Choice" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Number of sources</label>
                                            <input type="text" id="sources" name="sources" placeholder="0" class="form-control" maxlength="2">
                                        </div>

                                        <div class="form-group">
                                            <label> Paper format: </label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="format" id="format" value="MLA" checked="checked" class="form-check-input">
                                                <label class="form-check-label"> MLA </label>
                                                <input type="radio" name="format" id="format" value="APA" class="form-check-input">
                                                <label class="form-check-label"> APA </label>
                                                <input type="radio" name="format" id="format" value="Harvard" class="form-check-input">
                                                <label class="form-check-label"> HARVARD</label>
                                                <input type="radio" name="format" id="format" value="Chicago / Turabian" class="form-check-input">
                                                <label class="form-check-label"> Chicago / Turabian </label>
                                                <input type="radio" name="format" id="format" value="Other" class="form-check-input">
                                                <label class="form-check-label"> Other </label>

                                            </div>
                                            <button id="next-details" type="button" class="next-details btn green_btn">Next </button>
                                        </div>
                            </li>

                            <li>
                                <div class="wizard_heading_instructions">
                                    2. Paper instructions
                                    <span class="order-icon">
                                        <img src="img/paper-instructions.png" class="order-icon">
                                    </span>
                                </div>

                                <div class="wizard_content_instructions">
                                    <center>
                                        <textarea name="instructions" id="instructions" class="form-control" style="height: 200px; width: 95%; padding: .5rem; border-radius: .4rem; border: solid 1px #bdbdbd;"
                                            placeholder="Order instructions..."></textarea>
                                    </center>
                                    <p style="font-weight: 900;color: #1895d8;">
                                        You will be able to upload files after order submission
                                        <button id="next-instructions" type="button" class="btn floating-right-btn  green_btn">Next </button>
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="wizard_heading_calculator">
                                    3. Price Calculations
                                    <span class="order-icon">
                                        <img src="img/price-calculator.png" class="order-icon">
                                    </span>
                                </div>
                                <div class="wizard_content_calculator">
                                    <table width="80%">
                                        <tr>
                                            <td>Academic level</td>
                                            <td style="float: right;">
                                                <input type="radio" name="level" id="level" value="1.6" onchange="calculator('#level')" style="margin-bottom: 1%;"> High School
                                                <input type="radio" name="level" id="level" checked="checked" value="1.7" onchange="calculator('#level')" style="margin-bottom: 1%;"> Undergraduate
                                                <input type="radio" name="level" id="level" value="1.8" onchange="calculator('#level')" style="margin-bottom: 1%;"> Masters
                                                <input type="radio" name="level" id="level" value="1.9" onchange="calculator('#level')" style="margin-bottom: 1%;"> Doctoral
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pages</td>
                                            <td>
                                                <input name="pages" id="pages" class="form-control" onchange="calculator('#pages')" type="number" placeholder="5 pages"pattern="\d*" maxlength="4">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Spacing</td>
                                            <td style="float: right;">
                                                <div class="form-check-inline">
                                                    <input type="radio" id="spacing" name="spacing" value="2" onchange="calculator('#spacing')" class="form-check-input">
                                                    <label class="form-check-label">Single spacing </label>
                                                    <input type="radio" id="spacing" name="spacing" value="1" checked="checked" onchange="calculator('#spacing')" class="form-check-input">
                                                    <label class="form-check-label">Double spacing </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deadline</td>
                                            <td>
                                                <select name="deadline" id="deadline" class="form-control" onchange="calculator('#deadline')">
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
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type Of Work</td>
                                            <td>
                                                <select name="typeOfWork" id="typeOfWork" class="form-control" required onchange="calculator('#typeOfWork')">
                                                    <option value="11.000001">Admission/Application Essay</option>
                                                    <option value="11.000002">Annotated Bibliography</option>
                                                    <option value="11.000003">Article</option>
                                                    <option value="11.000004">Assignment</option>
                                                    <option value="11.000005">Book Report/Review</option>
                                                    <option value="11.000006">Case Study</option>
                                                    <option value="11.000007">Coursework</option>
                                                    <option value="11.000008">Dissertation</option>
                                                    <option value="11.000009">Dissertation Chapter - Abstract</option>
                                                    <option value="11.0000011">Dissertation Chapter - Introduction Chapter</option>
                                                    <option value="11.0000012">Dissertation Chapter - Literature Review</option>
                                                    <option value="11.0000013">Dissertation Chapter - Methodology</option>
                                                    <option value="11.0000014">Dissertation Chapter - Results</option>
                                                    <option value="11.0000015">Dissertation Chapter - Discussion</option>
                                                    <option value="11.0000016">Dissertation Chapter - Hypothesis</option>
                                                    <option value="11.0000017">Dissertation Chapter - Conclusion Chapter</option>
                                                    <option value="11.0000018">Editing</option>
                                                    <option value="11.0000019" selected="selected">Essay</option>
                                                    <option value="11.00000111">Formatting</option>
                                                    <option value="11.00000112">Lab Report</option>
                                                    <option value="11.00000113">Math Problem</option>
                                                    <option value="11.00000114">Movie Review</option>
                                                    <option value="11.00000115">Personal Statement</option>
                                                    <option value="11.00000116">PowerPoint Presentation plain</option>
                                                    <option value="11.00000117">PowerPoint Presentation with accompanying text</option>
                                                    <option value="11.00000118">Proofreading</option>
                                                    <option value="11.00000119">Paraphrasing</option>
                                                    <option value="11.000001111">Research Paper</option>
                                                    <option value="11.000001112">Research Proposal</option>
                                                    <option value="11.000001113">Scholarship Essay</option>
                                                    <option value="11.000001114">Speech/Presentation</option>
                                                    <option value="11.000001115">Statistics Project</option>
                                                    <option value="11.000001116">Term Paper</option>
                                                    <option value="11.000001117">Thesis</option>
                                                    <option value="11.000001118">Thesis Proposal</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="amount-wrapper-calculations">

                                        <label>
                                            <strong>Amount (&#36;)</strong>
                                        </label>

                                        <input type="text" id="amount" name="amount" value="13" readonly class="form-control-plaintext amount-value">
                                        <button type="button" id="next-calculator" class="green_btn floating-right-btn btn">Next</button>

                                    </div>
                                    </div>
                            </li>

                            <li>
                                <div class="wizard_heading_additional_features">
                                    4. Additional Features
                                    <span class="order-icon">
                                        <img src="img/additional-features.png" class="order-icon">
                                    </span>
                                </div>

                                <div class="wizard_content_additional_features">
                                    <div style="width: 100%; background-color: #FFCDD2; padding: .5rem;">
                                        Additional charges will be incurred for some of these features
                                    </div>
                                    <table width="80%">
                                        <tr>
                                            <td class="tooltip">
                                                <label>Want a specific writer?</label>
                                                <span class="tooltiptext">An additional charge of $5 will be included to the total amount!</span>
                                            </td>
                                            <td>
                                                <span id="chooseWriter"></span>
                                                <input type="text" name="specificWriter" class="form-control" id="specificWriter" onkeyup="calculator('#specificWriter'); checkwriter();"
                                                    onclick="calculator('#specificWriter'); checkwriter();" placeholder="Writer Id"
                                                    style="text-transform:uppercase" pattern="[A-Z0-9]*" maxlength="13">
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="tooltip">
                                                <span class="tooltiptext">An additional charge of $14 will be included to the total amount!</span>
                                                <label>Get digital copies of sources used?</label>
                                            </td>
                                            <td align="left">
                                                <select name="digitalSources" id="digitalSources" onclick="calculator('#digitalSources');" class="form-control">
                                                    <option value="14">Yes</option>
                                                    <option value="0" selected="selected">No</option>
                                                </select>
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="tooltip">
                                                <span class="tooltiptext">Input promotional code provided by support/ admin</span>
                                                <label>Discount Code</label>
                                            </td>
                                            <td>
                                                <span id="checkcode"></span>
                                                <input type="text" name="promoCode" class="form-control" id="promoCode" onkeyup="calculator('#promoCode'); checkcode(); checkAmount();"
                                                    onclick="calculator('#promoCode'); checkcode(); checkAmount();" placeholder="Discount Code"
                                                    style="text-transform:uppercase" pattern="[A-Z0-9]*" maxlength="8">
                                            </td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    <div class="amount-wrapper-calculations">
                                        <strong>Amount (&#36;)</strong>
                                        <input type="text" id="amount2" name="amount2" value="13" readonly class="form-control-plaintext amount-value">
                                    </div>
                                    <button id="next-add" type="button" class="btn green_btn">Next</button>
                                </div>
                            </li>

                            <li>
                                <div class="wizard_heading_login">
                                    5. Payment Information
                                    <span class="order-icon">
                                        <img src="img/card.png" class="order-icon">
                                    </span>
                                </div>


                                <div class="wizard_content_login">
                                    <div style="width: 100%; background-color: #dff0d8; margin: 0 auto; text-align: center; padding: .5rem;">
                                        <span style="font-size: 20px; margin-right: 1rem;">
                                            <strong>Amount (&#36;)</strong>
                                        </span>
                                        <input type="text" id="grand_total2" name="grand_total" value="13" readonly="readonly" style="border:none; font-size:24px; font-weight:bold;text-align: center; color:orange; width: 100px; border-radius: 2rem;">
                                    </div>

                                    <div class="tab-cont">
                                        <!-- Nav tabs -->
                                        <ul class="link_lists">
                                            <li class="tab_li new_customer" id="new_customer">New Customer
                                                <i class="fa fa-plus-circle"></i>
                                            </li>
                                            <li class="tab_li returning_customer" id="returning_customer">Returning Customer
                                                <i class="fa fa-sign-in"></i>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="" id="new_order">
                                            <table width="80%">
                                                <tr>
                                                    <td align="right">Email </td>
                                                    <td>
                                                        <input type="email" id="email" onkeyup="checkemail();" name="email" class="form-control heighted_2">
                                                    </td>
                                                    <td align="left">
                                                        <span id="_email_status"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Create password </td>
                                                    <td>
                                                        <input type="password" id="password" name="password" onkeyup="return check_password_safety(this.value);" class="form-control heighted_2">
                                                    </td>
                                                    <td align="left">
                                                        <span id="password_info"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Confirm password </td>
                                                    <td>
                                                        <input type="password" id="password_Match" name="password_Match" class="form-control heighted_2">
                                                    </td>
                                                    <td align="left">
                                                        <span id="divCheckPasswordMatch"></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div style="margin: 2rem;text-align: right;">
                                                <button type="submit" name="new_cus" class="btn-post" align="right" id="orderPost">Submit Order</button>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="next_order">
                                            <table width="75%">
                                                <tr>
                                                    <td align="right">Your email</td>
                                                    <td colspan="2">
                                                        <input type="email" id="email2" name="email2" onkeyup="checkemail2();" class="form-control heighted_2">
                                                    </td>
                                                    <td align="left">
                                                        <span id="_email2_status"></span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="right">Your password</td>
                                                    <td colspan="2">
                                                        <input type="password" id="password2" name="password2" onkeyup="checkpass();" class="form-control heighted_2">
                                                    </td>
                                                    <td align="left">
                                                        <span id="_pass_status"></span>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                            <center>
                                                <a href="reset.php" target="_blank">Forgot Password?</a>
                                            </center>
                                            <div style="margin: 2rem;text-align: right;">
                                                <button type="submit" class="btn-post" id="post-order2" name="return_cus">Submit Order</button>
                                            </div>
                                        </div>
                                    </div>
                            </li>

                        </ul>
                        </div>

                        <div class="aside_container col-md-4">
                            <div class="card">
                                <div class=card-body>

                                    <h2 class="card-title">Our Exclusive Features</h2>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <i class="fa fa-file-text-o diff"></i> Free pages including references and front page</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-mortar-board diff"></i> English-Native writers</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-shield diff"></i> Only original and authentic papers</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-edit diff"></i> Request for revisions anytime</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-certificate diff"></i> Quality work guaranteed</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-dollar diff"></i> Comprehensive money back policy</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-comment diff"></i> Easy messaging and communication</li>
                                        <li class="list-group-item">
                                            <i class="fa fa-support diff"></i> Responsive support team</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <section class="content_one">
                            <div class="icons">
                                <img src="img/1488255475__Paypal-01.png" alt="PayPal Logo">
                                <img src="img/1488255511__Visa.png" alt="Visa icon">
                                <img src="img/1488255561__Mastercard.png" alt="Master-Card Logo">
                            </div>
                        </section>
                        </div>
                        </div>

                        <footer>
                            <div class="footer_links">
                                <a href="about.php">ABOUT US</a>
                                <a href="revision-policy.php">REVISION POLICY</a>
                                <a href="money-back.php">MONEY BACK POLICY</a>
                                <a href="disclaimer.php">DISCLAIMER</a>
                                <a href="contact.php">CONTACT US</a>
                            </div>
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
                                Copyright &#169; 2017 researchpaperweb.com. All rights reserved.
                        </footer>
                        <a href="#top" class="scroll top_scroller">
                            <img src="img/top-scroller.png" alt="scroll-to-top">
                            </span>
                        </a>
                        </div>
                </div>
                <!--Start of Responsive navigation script -->

                <script type="text/javascript">
                    function myFunction() {
                        var x = document.getElementById("myTopnav");
                        if (x.className === "topnav") {
                            x.className += " responsive";
                        } else {
                            x.className = "topnav";
                        }
                    }
                </script>
                <!-- End of responsive navigation -->

                <!--Smooth Scroller plus hide versus show anchor-->
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        calculator('#pages');
                        $(".scroll").click(function (event) {
                            event.preventDefault();
                            $('html,body').animate({
                                scrollTop: $(this.hash).offset().top
                            }, 1000);
                        });
                    });

                    $(window).scroll(function () {

                        if ($(this).scrollTop() > 0) {
                            $('.top_scroller').fadeIn();
                        } else {
                            $('.top_scroller').fadeOut();
                        }
                    });
                </script>
                <!--End of Smooth Scroller plus hide versus show anchor -->
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
                                '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/online_image.png" class = "fixedbutton"> </a>';
                        } else if (status === 'away') {
                            document.getElementById('status2').innerHTML =
                                '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/offline_image.png" class = "fixedbutton"> </a>';
                        } else if (status === 'offline') {
                            document.getElementById('status2').innerHTML =
                                '<a href="javascript:void(Tawk_API.toggle())"> <img src="img/offline_image.png" class = "fixedbutton"> </a>';
                        }
                    };
                </script>

                <!--End of tawk.to Status Code -->
</body>

</html>