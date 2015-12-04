<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Update</title>
    <link rel="stylesheet" href="<?php echo BACKEND_CSS_URL; ?>detail.css">

<style type="text/css">
    div .errorMessage{color:red;}
    label .required {color:red;}
</style>
</head>
<body>
<div id="main">
    <div id="position">
        &nbsp;您当前的位置-&gt;《<?php echo $article_info->title; ?>》详细内容
    </div>
    <div id="container">
        <div class="tr-1">
            <div class="td-1">
            标题：
            </div>
            <div class="td-2">
            <?php echo $article_info->title; ?>
            </div>
            <div class="td-3">
            </div>
        </div>
        <div class="tr-1">
            <div class="td-1">
            作者：
            </div>
            <div class="td-2">
            <?php echo $article_info->author; ?>
            </div>
            <div class="td-3">
            </div>
        </div>

        <div class="tr-1">
            <div class="td-1">
            描述：
            </div>
            <div class="td-2">
            <?php echo $article_info->des; ?>
            </div>
            <div class="td-3">
            </div>
        </div>


        <div class="tr-2">
            <div class="td-2">
            <?php echo $article_info->content; ?> 
            </div>
        </div>
    </div>

</div>





</body></html>