<?php

use yii\helpers\Url; ?>

<li class="">
    <a href="javascript:;"><span class="title">Settings</span>
        <span class="arrow"></span></a>
    <span class="icon-thumbnail"><i class="fa fa-cogs"></i></span>
    <ul class="sub-menu">
        <li>
            <a href="javascript:;"><span class="title">Configurations</span>
                <span class="arrow"></span></a>
            <span class="icon-thumbnail">co</span>
            <ul class="sub-menu">
                <li>
                    <a href="<?= Url::to(['/settings/countries/index']) ?>">Countries</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/counties/index']) ?>">Counties</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/sub-counties/index']) ?>">Sub Counties</a>
                    <span class="icon-thumbnail">s</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/towns/index']) ?>">Towns</a>
                    <span class="icon-thumbnail">t</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/currency/index']) ?>">Currency</a>
                    <span class="icon-thumbnail">c</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/numbering-format/index']) ?>">Numbering Format</a>
                    <span class="icon-thumbnail">n</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/settings/payment-methods/index']) ?>">Payment Methods</a>
                    <span class="icon-thumbnail">p</span>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;"><span class="title">Access Control</span>
                <span class="arrow"></span></a>
            <span class="icon-thumbnail">ac</span>
            <ul class="sub-menu">
                <li>
                    <a href="<?= Url::to(['/admin/index']) ?>">Assignment</a>
                    <span class="icon-thumbnail">a</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/admin/role']) ?>">Roles</a>
                    <span class="icon-thumbnail">r</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/admin/permission']) ?>">Permissions</a>
                    <span class="icon-thumbnail">p</span>
                </li>
                <!--Rules-->
                <li>
                    <a href="<?= Url::to(['/admin/route']) ?>">Routes</a>
                    <span class="icon-thumbnail">r</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/admin/menu']) ?>">Menu</a>
                    <span class="icon-thumbnail">m</span>
                </li>
                <li>
                    <a href="<?= Url::to(['/admin/user']) ?>">Users</a>
                    <span class="icon-thumbnail">u</span>
                </li>
            </ul>
        </li>
    </ul>
</li>

