<?php

use yii\widgets\ActiveForm;

$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="address-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <div class="contact-address box-shadow">
                    <i class="zmdi zmdi-pin"></i>
                    <h6>00200 - Nairobi,</h6>
                    <h6>Kenya</h6>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="contact-address box-shadow">
                    <i class="zmdi zmdi-phone"></i>
                    <h6>+254 710572042</h6>
                    <h6>+254 710572042</h6>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="contact-address box-shadow">
                    <i class="zmdi zmdi-email"></i>
                    <h6>healthylifestyle@gmail.com</h6>
                    <h6>info@healthylifestyle.co.ke</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="message-box-section mt--50 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="message-box box-shadow white-bg">
                    <form id="contact-form" action="mail.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your name here">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" placeholder="Your email here">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="subject" placeholder="Subject here">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Your phone here">
                            </div>
                            <div class="col-md-12">
                                <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                                <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">send message</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>