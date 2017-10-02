
                                                        <!-- single-cart --> 
                                                        <div class="single-cart clearfix">
                                                            <div class="cart-img f-left">
                                                                <a href="#">
                                                                    <img style="height:111px; width:100px;" src="/lifestyle/backend/web/<?php // $detail->prod_img?>" alt="Cart Product" />
                                                                </a>
                                                                <div class="del-icon">
                                                                    <a href="<?php // Yii::$app->urlManager->createUrl(['site/uncart','id'=>$detail->id])?>">
                                                                        <i class="zmdi zmdi-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="cart-info f-left">
                                                                <h6 class="text-capitalize">
                                                                    <a href="#"><?php // $detail->name?>ggghhh</a>
                                                                </h6>
                                                                <p>
                                                                    <?php // echo $detail->category->name; ?>
                                                                </p>
                                                                <p>
                                                                    <span>Price <strong>:</strong></span><?php // 'Ksh '.$detail->price ?>
                                                                </p>
                                                              <!--<p>
                                                                    <span>Color <strong>:</strong></span>Black, White
                                                                </p>-->
                                                            </div>
                                                        </div>
                                                        <!--End of Single Cart-->