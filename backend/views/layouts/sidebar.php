<?php

use mdm\admin\components\MenuHelper;
use mdm\admin\components\Helper;
use yii\helpers\Url;

$user = Yii::$app->user->identity;
$url = Yii::$app->urlManager;
?>
<?php
$items = MenuHelper::getAssignedMenu(Yii::$app->user->id);
//var_dump(json_encode($items));
//die();
?>


<div class="page-sidebar " id="main-menu">

    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
        <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
                <img src="<?php // $user->user_image ? Yii::$app->urlManager->baseUrl . '/' . $user->user_image : Yii::$app->urlManager->baseUrl . '/images/icons/user.png'                                                      ?>" alt="" data-src="" data-src-retina="" width="69" height="69"/>
                <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
                <div class="username"><?php //$user->first_name                                                     ?> <span class="semi-bold"> <?php // $user->last_name                                                    ?></span></div>
                <div class="status">Logged in</div>
            </div>
        </div>


        <p class="menu-title sm">BROWSE <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>

        <ul>
            <?php
            echo $this->render('_menus/_dashboard');
            ?>
            <?php
            echo $this->render('_menus/_inv');
            ?>
            <?php
            echo $this->render('_menus/_orders');
            ?>
            <?php
            echo $this->render('_menus/_blog');
            ?>
            <?php
            echo $this->render('_menus/_users');
            ?>
            <?php
            echo $this->render('_menus/_settings');
            ?>



            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets"> <a href="javascript:;"> <i class="material-icons"></i></a>
                <ul class="sub-menu">
                    <li class="side-bar-widgets">
                        <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                        <ul class="folders">
                            <li><a href="#">
                                    <div class="status-icon green"></div>
                                    My quick tasks </a> </li>
                            <li><a href="#">
                                    <div class="status-icon red"></div>
                                    To do list </a> </li>
                            <li><a href="#">
                                    <div class="status-icon blue"></div>
                                    Projects </a> </li>
                            <li class="folder-input" style="display:none">
                                <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name">
                            </li>
                        </ul>
                        <p class="menu-title">PROJECTS </p>
                        <div class="status-widget">
                            <div class="status-widget-wrapper">
                                <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                                <p>Redesign home page</p>
                            </div>
                        </div>
                        <div class="status-widget">
                            <div class="status-widget-wrapper">
                                <div class="title">envato<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                                <p>Statistical report</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>

        <ul>

        </ul>

        <!-- <div class="side-bar-widgets">
             <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
             <ul class="folders">
                 <li><a href="#">
                         <div class="status-icon green"></div>
                         My quick tasks </a> </li>
                 <li><a href="#">
                         <div class="status-icon red"></div>
                         To do list </a> </li>
                 <li><a href="#">
                         <div class="status-icon blue"></div>
                         Projects </a> </li>
                 <li class="folder-input" style="display:none">
                     <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="">
                 </li>
             </ul>
             <p class="menu-title">PROJECTS </p>
             <div class="status-widget">
                 <div class="status-widget-wrapper">
                     <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                     <p>Redesign home page</p>
                 </div>
             </div>
             <div class="status-widget">
                 <div class="status-widget-wrapper">
                     <div class="title">envato<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                     <p>Statistical report</p>
                 </div>
             </div>
         </div>-->
        <div class="clearfix"></div>

    </div>
</div>

<a href="#" class="scrollup">Scroll</a>
<div class="footer-widget">
    <div class="progress transparent progress-small no-radius no-margin">
        <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
    </div>
    <div class="pull-right">
        <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
        <a href="lockscreen.html"><i class="material-icons">power_settings_new</i></a></div>
</div>
