        <div class="na">
            <div class="my"><span><a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>"><?php echo Yii::app()->user->nickname; ?></a></span>
                <a href="<?php echo Yii::app()->createUrl('user/home',array('uid'=>Yii::app()->user->id)); ?>"><img alt="<?php echo Yii::app()->user->nickname; ?>" title="<?php echo Yii::app()->user->nickname; ?>" src="<?php echo Yii::app()->user->photo; ?>" class="img"></a>
            </div>
                <table border="0" width="95%" cellspacing="0" cellpadding="5" class="fl">
                    <tbody><tr>
                            <td class="line_r">
                                <a class="bold p14" href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>">
                                <?php 
                                $shui = Yii::app()->user->id;
                                $gznu = "select * from {{follow}} where uid=$shui";
                                $numGZ = count(Follow::model()->findAllBySql($gznu));
                                echo $numGZ; ?></a><br>
                                <a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>">关注</a>
                            </td>
                            <td class="line_r">
                                <a class="bold p14" href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>">
                                <?php 
                                $byshui = Yii::app()->user->id;
                                $fansnu = "select * from {{follow}} where touid=$byshui";
                                $numFAN = count(Follow::model()->findAllBySql($fansnu));
                                echo $numFAN; ?></a><br>
                                <a href="<?php echo Yii::app()->createUrl('follow',array('uid'=>Yii::app()->user->id)); ?>">粉丝</a>
                            </td>
                            <td>
                                <a class="bold p14" href="<?php echo Yii::app()->createUrl('weiyu/search',array('uid'=>Yii::app()->user->id)); ?>"><?php
                                echo $count = Weiyu::model()->countByAttributes(array('create_user_id'=>Yii::app()->user->id));?></a><br>
                                <a href="<?php echo Yii::app()->createUrl('weiyu/search',array('uid'=>Yii::app()->user->id)); ?>">微语</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="app">
                    <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('article/create'); ?>" style="color:green;padding-left:35px;">写新感觉</a>
                        </li>
                        <li><a href="<?php echo Yii::app()->createUrl('article/myarticle',array('uid'=>Yii::app()->user->id)); ?>">
                            <span>
                                <?php
                                echo $count = Article::model()->countByAttributes(array('author_id'=>Yii::app()->user->id));?>
                            </span>
                            </a><a href="<?php echo Yii::app()->createUrl('article/myarticle',array('uid'=>Yii::app()->user->id)); ?>">我的感觉</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('weiyu'); ?>">
                            <span>
                            <?php
                                echo $count = Weiyu::model()->countByAttributes(array('create_user_id'=>Yii::app()->user->id));?>
                            </span></a><a href="<?php echo Yii::app()->createUrl('weiyu'); ?>">我的微语</a>
                        </li>
                        <li><a href=""><span><?php
                                echo $sl = Album::model()->countByAttributes(array('user_id'=>Yii::app()->user->id));?></span></a><a href="<?php echo Yii::app()->createUrl('album/myalbum'); ?>">我的相册</a></li>
                        <li><a href="./index.php?r=user/fav">
                            <span>
                            <?php
                                $c1 = Picshoucang::model()->countByAttributes(array('pic_uid'=>Yii::app()->user->id));
                                $c2 = Shoucang::model()->countByAttributes(array('uid'=>Yii::app()->user->id));
                                $num = $c1 + $c2;
                                echo $num;?>
                            </span></a>
                            <a href="./index.php?r=user/fav">我的收藏</a>
                        </li>
                        <!-- <li><a href=""><span>0</span></a><a href="">小集体</a></li> -->
                        <li><a href="" target="_blank"><span>1</span></a><a href="./index.php?r=quiet/index" target="_blank">找自己</a></li>

                        <!-- <li><a href=""><span>0</span></a><a href="">电影</a></li>
                        <li><a href=""><span>0</span></a><a href="">音乐</a></li>
                        <li><a href=""><span>0</span></a><a href="">读书</a></li> -->
                    </ul>
                </div>
            </div>