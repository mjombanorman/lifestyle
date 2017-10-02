<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = ' Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php /*
    $form = ActiveForm::begin(['options' => ['id' => 'signupform', 'class' => 'form-horizontal m-t-20'], 'fieldConfig' => [
                    'options' => [
                        'enableajaxValidation' => true,
                        'tag' => false,]
        ]]);
    ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'class' => 'form-control'])->label(false); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username', 'class' => 'form-control'])->label(false) ?>
          
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
     

            <?php ActiveForm::end();  */ ?>

            <!-- Top menu -->
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= Yii::$app->urlManager->createUrl(['site/signup']);?>">Smartprice</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="top-navbar-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="scroll-link" href="#about-us">ABOUT</a></li>
                            <li><a class="scroll-link" href="#hiw">HOW IT WORKS</a></li>
                            <li><a class="scroll-link" href="#features">FEATURES</a></li>
                            <li><a class="scroll-link" href="#contact">CONTACT</a></li>
                            <li><a class="scroll-link" href="<?= Yii::$app->urlManager->createUrl(['site/login']);?> ">LOGIN</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Top content -->
            <div class="top-content" style="background:rgba(0,0,0,0.8);">
                <div class="container">

                    <div class="row">

                        <div class="col-sm-5 r-form-1-box wow fadeInLeft">
                            <div class="r-form-1-top">
                                <div class="r-form-1-top-left">
                                    <h3>Sign Up Now</h3>
                                    <p>Create a business account:</p>
                                </div>
                                <div class="r-form-1-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="r-form-1-bottom">
                                <!--<form role="form" action="#" method="post">-->
                                <?php
                                $form = ActiveForm::begin(['options' => ['id' => 'signupform'], 'fieldConfig' => [
                                    'options' => [
                                    'enableajaxValidation' => true,
                                    'tag' => false,]
                                    ]]);
                                    ?>
                                    <div class="form-group">
                                        <label class="sr-only" for="r-form-1-first-name">Business name</label>
                                        <!-- <input type="text" name="r-form-1-first-name" placeholder="First name..." class="r-form-1-first-name form-control" id="r-form-1-first-name">-->
                                        <?= $form->field($model, 'biz_name')->textInput(['autofocus' => true, 'placeholder' => 'Business Name', 'class' => 'form-control r-form-1-first-name','id'=>'r-form-1-first-name'])->label(false) ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="r-form-1-last-name">Username</label>
                                        <!--<input type="text" name="r-form-1-last-name" placeholder="Last name..." class="r-form-1-last-name form-control" id="r-form-1-last-name">-->
                                        <?= $form->field($model, 'username')->textInput([ 'placeholder' => 'Username', 'class' => 'form-control r-form-1-last-name', 'id'=>'r-form-1-last-name'])->label(false) ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="r-form-1-email">Email</label>
                                        <!-- <input type="text" name="r-form-1-email" placeholder="Email..." class="r-form-1-email form-control" id="r-form-1-email">-->
                                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'class' => 'form-control r-form-1-email', 'id'=>'r-form-1-email'])->label(false); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="r-form-1-last-name">Password</label>
                                        <!--<input type="text" name="r-form-1-last-name" placeholder="Last name..." class="r-form-1-last-name form-control" id="r-form-1-last-name">-->
                                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password','class'=>'form-control r-form-1-email','id'=>'r-form-1-email'])->label(false) ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="r-form-1-last-name">Confirm Password</label>
                                        <!-- <input type="text" name="r-form-1-last-name" placeholder="Last name..." class="r-form-1-last-name form-control" id="r-form-1-last-name">-->
                                        <?= $form->field($model, 'password_repeat')->passwordInput(['placeholder' => 'Confirm Password','class'=>'r-form-1-last-name form-control','id'=>'r-form-1-last-name'])->label(false) ?>
                                    </div>

                                    <button type="submit" class="btn">Sign me up!</button>
                                    <p class="terms">
                                        By signing up, you agree to our 
                                        <a href="#" class="launch-modal" data-modal-id="modal-terms">Terms and Conditions</a>.
                                    </p>
                                    <?php ActiveForm::end();  ?>
                                    <!-- </form>-->
                                </div>
                            </div>

                            <div class="col-sm-7 text wow fadeInUp">
                                <h1>Smartprice Business Account</h1>
                                <div class="description">
                                    <p class="medium-paragraph">
                                        We give you the chance to have access to millions of consumers and clients through our smartprice online marketing platform.
                                    </p>
                                </div>
                                <div class="top-buttons">
                                    <a class="btn btn-link-1" href="<?= Yii::$app->urlManager->createUrl(['site/login']);?>">Login <i class="fa fa-angle-right"></i></a>
                                    <a class="btn btn-link-2" href="#about-us">Learn More <i class="fa fa-lightbulb-o"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- About Us-->
                <div class="about-us-container section-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 more-features section-description wow fadeIn">
                                <h2>SmartPrice??</h2>
                                <div class="divider-1"><div class="line"></div></div>
                                <p class="medium-paragraph">Smartprice is a web based apllication that creates a connection between clients/consumers and goods and services they wish to acquire in the business world. Through this application business owners and managers are capable of the following: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7 more-features-box wow fadeInLeft">
                                <div class="more-features-box-text">
                                    <div class="more-features-box-text-icon"><i class="fa fa-paperclip"></i></div>
                                    <h3>Compare Prices from different stores</h3>
                                    <div class="more-features-box-text-description">
                                        Both Consumers and entrepreneurs are capable of comparing the prices of various goods and services conviniently in their respective comfort zone. 
                                    </div>
                                </div>
                                <div class="more-features-box-text">
                                    <div class="more-features-box-text-icon"><i class="fa fa-user"></i></div>
                                    <h3>Advertise goods to a large onlne market</h3>
                                    <div class="more-features-box-text-description">
                                        By adding your goods or services to our application, we are capable of marketing them to millions of people around the globe. 
                                    </div>
                                </div>
                                <div class="more-features-box-text">
                                    <div class="more-features-box-text-icon"><i class="fa fa-user"></i></div>
                                    <h3>View Relevant Statistics of how your business is performing</h3>
                                    <div class="more-features-box-text-description">
                                      Smartprice enables you to view statistics of your business performance through ratings and reviews.
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-5 more-features-box wow fadeInUp">
                            <img src="http://azmind.com/premium/faby/v1-2/layout-1/assets/img/devices/pc.png" alt="pc">
                        </div>
                    </div>
                </div>
            </div>

            <!-- HIW -->
            <div class="hiw-container section-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 features section-description wow fadeIn">
                            <h2>How it works</h2>
                            <div class="divider-1"><div class="line"></div></div>
                            <p class="medium-paragraph">Just follow the few simple steps to get going.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 features-box wow fadeInUp">
                            <div class="features-box-icon"><i class="fa fa-thumbs-up"></i></div>
                            <h3>Create a Business Account</h3>
                            <p>Create a smartprice business account by signing up. Its free and easy. </p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInDown">
                            <div class="features-box-icon"><i class="fa fa-cog"></i></div>
                            <h3>Complete your business profile</h3>
                            <p>Complete your business Profile. This is a very important step since this will be visible to everybody.</p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInUp">
                            <div class="features-box-icon"><i class="fa fa-commenting"></i></div>
                            <h3>Feed and manage your business data</h3>
                            <p>Feed your business data which will be accessible to all smartprice users. You can also manage all the data that you input.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 section-bottom-button wow fadeInUp">
                            <a class="btn btn-link-1 scroll-link" href="#top-content">Sign Up Now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="features-container section-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 features section-description wow fadeIn">
                            <h2>Why SmartPrice?</h2>
                            <div class="divider-1"><div class="line"></div></div>
                            <p class="medium-paragraph">What to expect.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 features-box wow fadeInUp">
                            <div class="features-box-icon"><i class="fa fa-thumbs-up"></i></div>
                            <h3>Easy To Use</h3>
                            <p>Doesn't need any special skills. Basic computer skills are enough.</p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInDown">
                            <div class="features-box-icon"><i class="fa fa-cog"></i></div>
                            <h3>Smartprice Marketing Tool</h3>
                            <p>Smartprice will give you the capability of sharing your items via social media and the smartprice platform.</p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInUp">
                            <div class="features-box-icon"><i class="fa fa-commenting"></i></div>
                            <h3>24/7 Support</h3>
                            <p>Be sure of our support. We offer support to our users anytime of the day/week.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 features-box wow fadeInDown">
                            <div class="features-box-icon"><i class="fa fa-magic"></i></div>
                            <h3>It is free</h3>
                            <p>Smartprice is free to all users and payment is only due after trading upto a certain limit.</p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInUp">
                            <div class="features-box-icon"><i class="fa fa-video-camera"></i></div>
                            <h3>Legitimate and Legal</h3>
                            <p>We companies that provide services regularly to ensure good customer  services.</p>
                        </div>
                        <div class="col-sm-4 features-box wow fadeInDown">
                            <div class="features-box-icon"><i class="fa fa-instagram"></i></div>
                            <h3>Big Community</h3>
                            <p>We give you access to a large online market (The Smartprice Community).</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 section-bottom-button wow fadeInUp">
                            <a class="btn btn-link-1 scroll-link" href="#top-content">Sign Up Now <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Footer -->
            <footer>
                <div class="contact-container container">
                    <div class="row">
                        <div class="col-sm-4 footer-about wow fadeInUp">
                            <h3>About Us</h3>
                            <p>
                             Smartprice is a web based apllication that creates a connection between clients/consumers and goods and services they wish to acquire in the business world. 
                         </p>
                         <p>
                            <a class="scroll-link" href="#about-us">Read More</a>
                        </p>
                    </div>
                    <div class="col-sm-4 footer-contact-info wow fadeInDown">
                        <h3>Contact Info</h3>
                        <p><i class="fa fa-map-marker"></i>IPS Building, Kimathi Street, Nairobi</p>
                        <p><i class="fa fa-phone"></i> Phone: +254 710 572 042</p>
                        <p><i class="fa fa-envelope"></i> Email: <a href="#">info@smartprice.com</a></p>
                        <p><i class="fa fa-skype"></i> Skype: Smartprice_INC</p>
                    </div>
                    <div class="col-sm-4 footer-social wow fadeInUp">
                        <h3>Want to Socialize?</h3>
                        <p>
                            We are also very active in social media, trying to answer all the questions you might have.
                            Check out our accounts:
                        </p>
                        <p>
                            <a href="#"><i class="fa fa-facebook"></i></a> 
                            <a href="#"><i class="fa fa-twitter"></i></a> 
                            <a href="#"><i class="fa fa-google-plus"></i></a> 
                            <a href="#"><i class="fa fa-instagram"></i></a> 

                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 footer-copyright">
                        &copy; <?= date('Y'); ?> Developed by  <a href="#">Wale Wabaya</a>
                    </div>
                    <div class="col-sm-7 footer-menu">
                        <ul>
                            <li>Go to:</li>
                            <li><a class="scroll-link" href="#top-content">Top</a></li>
                            <li><a class="scroll-link" href="#features">Features</a></li>
                            <li><a class="scroll-link" href="#hiw">How it works</a></li>
                            <li><a class="" href="<?= Yii::$app->urlManager->createUrl(['site/login']);?>">Login</a></li>
                            <li><a class="launch-modal" href="#" data-modal-id="modal-terms">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- MODAL: Terms and Conditions -->
        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h2 class="modal-title" id="modal-terms-label">Terms and Conditions</h2>
                    </div>
                    <div class="modal-body">
                        <p>Please read carefully the terms and conditions for using our product below:</p>
                        <h3>1. Dolor sit amet</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <ul>
                            <li>Easy To Use</li>
                            <li>Awesome Design</li>
                            <li>Cloud Based</li>
                        </ul>
                        <p>
                            Ut wisi enim ad minim veniam, <a href="#">quis nostrud exerci tation</a> ullamcorper suscipit lobortis nisl ut aliquip ex ea 
                            commodo consequat nostrud tation.
                        </p>
                        <h3>2. Sed do eiusmod</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                        <h3>3. Nostrud exerci tation</h3>
                        <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea 
                            commodo consequat nostrud tation.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">I Read it &amp; I Agree</button>
                    </div>
                </div>
            </div>
        </div>
