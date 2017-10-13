<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

//$this->title = $this->title . 'About';

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left ">
                    <h2 class="uppercase">about healthy lifestyle</h2>
                    <h6 class="mb-40">Who we are, What we do:</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="about-photo p-20 bg-img-1">
                    <img src="<?= Yii::$app->urlManager->baseUrl ?>/frontend/web/images/bg/bg1.png" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-description mt-50">
                    <p>We distribute forever living products from Forever Living, a company that was founded in 1978. It is now a multi-billion dollar company, based in Scottsdale, Arizona, that manufactures and sells dozens of wellness and beauty products. These lifeenhancing products, provide us with the opportunity to own our own business and secure our financial future with a proven plan. With over nine and a half million Forever Business Owners in over 150 countries, Forever Living offers the once in a lifetime opportunity of living a healthier and wealthier life.</p>

                    <p>Rex Maughan who is the founder of the company, knew there had to be something more to life than struggling to support his family and battling constant exhaustion. There were two things he needed to find to drastically improve the quality of his life that is; better health and financial freedom.</p>

                    <p>For years, Rex searched for a way to obtain these two things, but wasn’t satisfied with anything he found. So in 1978, he invited 43 people to attend the first Forever Living Products meeting in Tempe, Arizona, where he unveiled a customized plan that would provide him and others with better health and financial freedom.</p>
                </div>
            </div>
        </div>
    </div>
</div>
