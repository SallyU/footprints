<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>安静找自己 - 足迹 - 我的心灵归属地</title>
        <script type="text/javascript" src="<?php echo JS_URL; ?>jquery-1.7.2.min.js"></script>
        <style>
            audio[controls], canvas, video {
                display: inline-block;
            }
            html {
                font-size: 100%;
            }
            body {
                font-size: 13px;
                line-height: 1.231;
                margin: 0;
            }
            form {
                margin: 0;
            }
            button, input, select, textarea {
                font-size: 100%;
                margin: 0;
                vertical-align: baseline;
            }
            button, input {
                line-height: normal;
            }
            button, input[type="button"], input[type="reset"], input[type="submit"] {
                cursor: pointer;
            }
            button::-moz-focus-inner, input::-moz-focus-inner {
                border: 0 none;
                padding: 0;
            }
            html, body, #container, #wrap {
                cursor: default;
                height: 100%;*height:95%;
                width: 100%;*width:95%;
            }
            body {
                background-color: #F9F9F9;
                color: #808080;
                font-family: Tahoma,Helvetica,sans-serif;
                font-size: 13px;
                text-align: center;
                text-shadow: 0 1px #FFFFFF;
            }
            #container {
                margin: -50px auto 0;
                position: relative;
                width: 700px;
            }
            #wrap {
                height: 0;
                position: absolute;
                text-align: left;
                top: 50%;
            }
            #wrap div {
                display: none;
                font-size: 18px;
                font-weight: bolder;
                /*opacity: 0;*/
                /*position: absolute;*/
                width: 700px;
            }
            #wrap #first {
                opacity: 1;
            }
            #wrap .current {
                display: block !important;
                opacity: 1;
            }
            #wrap span {
                color: #A5A5A5;
                display: block;
                font-size: 13px;
                font-weight: normal;
                margin-top: 20px;
            }
            #wrap div.relax .time {
                display: inline;
            }
            #wrap div.relax .time2 {
                color: #808080;
                font-size: 18px;
                font-weight: bolder;
            }
            #ninety-sec, #donate {
                -moz-transition: opacity 100ms linear 0s;
                background: none repeat scroll 0 0 #1A1A1A;
                border-radius: 5px 5px 5px 5px;
                bottom: 20px;
                box-shadow: 0 0 10px #000000;
                color: #F9F9F9;
                opacity: 0.5;
                padding: 5px 10px;
                position: absolute;
                right: 20px;
                text-decoration: none;
                text-shadow: 0 1px #000000;
            }
            #donate {
                border: medium none;
                bottom: 0;
                color: #FF9933;
                font-weight: bolder;
                position: relative;
                right: 0;
            }
            #ninety-sec:hover, #donate:hover {
                opacity: 1;
            }
            #audio {
                left: -9999px;
                position: absolute;
                top: -9999px;
            }
            #wrap #google_plus, #wrap #google_plus div, #fb1, #fb2 {
                display: inline-block !important;
                margin: 0 !important;
                opacity: 1 !important;
                position: relative !important;
                width: auto;
            }
            .box_cue_green{
                text-align: center;
                color:#fff;
                position: absolute;
                z-index: 999;
                left:40%;
                top:40%;
                background-color: rgba(110,200,54,.85);
                background-color: #82c532\9;
                padding: 10px 20px;
                float: left;
                word-wrap: break-word;
                word-break: break-all;
                white-space: nowrap;
                font-size: 14px;
                border-radius: 5px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                line-height: 20px;
                -webkit-box-shadow:2px 2px 6px #ccc;-moz-box-shadow:2px 2px 6px #ccc;box-shadow:2px 2px 6px #ccc;
            }
            .box_cue_yellow{
                text-align: center;
                color:#fff;
                position: absolute;
                z-index: 999;
                left:40%;
                top:40%;
                background-color: rgba(255,172,0,.85);
                background-color: #fcb725\9;
                padding: 10px 20px;
                float: left;
                word-wrap: break-word;
                word-break: break-all;
                white-space: nowrap;
                font-size: 14px;
                border-radius: 5px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                line-height: 20px;
                -webkit-box-shadow:2px 2px 6px #ccc;-moz-box-shadow:2px 2px 6px #ccc;box-shadow:2px 2px 6px #ccc;
            }

            a {
                -moz-transition: all 0.2s linear 0s;
                color: #E4E4E4;
                text-decoration: none;
            }
        </style>
        <script type="text/javascript">
            $(function(){
                $("#music").html('<embed src="<?php echo QUIET_URL; ?>quiet.swf" autostart="true" loop="true" hidden="true"></embed>');
                $(document).keyup(function(event){
                    if(event.keyCode == 32){
                        quietrun();
                    }
                });
                $(document).mousedown(function(){
                    quietrun();
                });
            })
            
            var  stopindex=0;
            var  runflg=true;
            function quietrun(){
                if($(".current").attr("id")=="last"){
                    return false;
                }
                
                if($(".current").attr("id")=="relax"){
                    if(runflg){
                        stopindex = setInterval(changeTime,1000);
                        runflg=false;
                    }
                }else{
                    $(".current").next().addClass("current");
                    $(".current").first().removeClass("current");
                }
                
            }
            function changeTime(){
                index =  parseInt($("#time").html());
                if(index<=1){
                    clearInterval(stopindex);
                    $(".current").next().addClass("current");
                    $(".current").first().removeClass("current");
                }else{
                    $(".time").html(index-1);
                }
            }
        </script>
    </head>
    <body id="body">
        <div id="music"></div>
        <div id="container">
            <div id="wrap">
                <div name id="first" class="current">
                    这安静的地方需要你按动[空格]键来进行交互。<span>(现在，轻轻的按一下这个键。)</span>
                </div>
                <div>为了获得完整的体验，请把你的手机设置成静音模式，把电脑静音，然后按[F11]键，苹果机按[cmd+shift+f]键<span>
                        (同样，按[空格]键继续。)</span></div>
                <div>说真的，请静音你的手机。否则，我们做的毫无意义。<span>(请严肃。请严肃，请严肃。不要担心 - 这里不是一个像那些会吓你一跳的地方。)</span></div>
                <div id="music" itemprop="name">欢迎来到这安静的地方。</div>
                <div>在这安静的地方，没有领导和上级<span>(没有他们冲你的大呼小叫)</span></div>
                <div>也没有人人网的信息...</div>
                <div>...或微博...</div>
                <div style="font-size:22px;">...QQ...</div>
                <div style="font-size:24px;">...优酷...</div>
                <div style="font-size:28px;">...邮件...</div>
                <div style="font-size:32px;">...msn...</div>
                <div style="font-size:36px;">...等等...</div>
                <div style="font-size:40px;">...等等...</div>
                <div style="font-size:50px;">...等等...</div>
                <div>...</div>
                <div style="font-size:10px;">哦。</div>
                <div itemprop="description">你是否发现有太多的东西需要你的注意？</div>
                <div>你是否在想现在会错过所有这些重要的信息...</div>
                <div>请忍住。</div>
                <div>只需要几分钟。</div>
                <div>让你的脑子清静一会儿。</div>
                <div>我可以向你保证，你不遗漏任何非要立即处理的事情。</div>
                <div>如果你还在担心，我可以把你的事情概况一下。</div>
                <div>一些你不认识的”朋友“对最近发生的一些事情做了一些愚蠢的评论。<span>(或对你就最近发生的一些事情的看法做的一些愚蠢的评论)</span></div>
                <div>你认为这完全是一场闹剧，不是吗？</div>
                <div>一场关于我们人类究竟怎么了的闹剧。</div>
                <div>然而，每一场闹剧，都反映着一丝真相。</div>
                <div>这真相就是，随着使用所有的这些强大的社交工具，我们却忘记了另外一些东西。</div>
                <div>我们忘记了休息...</div>
                <div>...一次真正的休息。</div>
                <div>在公园里散散步，在大山里赏赏景，何等的美好...</div>
                <div>但是如果一直把手机带着身边，你实际上什么也做不了。</div>
                <div>这些毫无意义的小东西一直在增加你的负担。</div>
                <div>无意义。小。东西。</div>
                <div>无意义。</div>
                <div style="font-size:12px;">小。</div>
                <div style="font-size:10px;">东西。</div>
                <div>...一个朋友在你的的博客上留下了一条评论...</div>
                <div style="font-size:22px;">...一个朋友赞了你的分享...</div>
                <div style="font-size:26px;">...一个朋友分享了一个视频给你...</div>
                <div style="font-size:30px;">...一个朋友上线了...</div>
                <div style="font-size:34px;">...一个朋友邀请你参与一个活动...</div>
                <div style="font-size:44px;">...一个朋友这...</div>
                <div style="font-size:48px;">...一个朋友那...</div>
                <div style="font-size:50px;">...一个朋友...</div>
                <div style="font-size:60px;">...一个朋友...</div>
                <div style="font-size:70px;">...一个朋友...</div>
                <div style="font-size:80px;">毫无意义。</div>
                <div style="font-size:90px;">小。</div>
                <div style="font-size:10px;">事。</div>
                <div>...</div>
                <div>...</div>
                <div>...放松...</div>
                <div id="relax" class="relax">...放松 <span id="time" class="time time2">30</span> 秒...<span>(不要做任何事情。你可以做到。真的。死不了人。只是 <span class="time">30</span> 秒。)</span>
                </div>
                <div>...感觉好极了，不是吗？</div>
                <div>:)</div>
                <div>我很快将要向你说再见了。</div>
                <div>你将回到你的各种消息里。</div>
                <div>但在此之前，我只想给你一些建议。</div>
                <div>时不时...</div>
                <div>...停下所有要做的事情...</div>
                <div>...进入这安静的地方。</div>
                <div>...</div>
                <div style="font-size:12px;">再见。</div>
                <div style="font-size:12px;">.</div>
                <div id="last">
					<p><a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php echo IMG_URL; ?>logo.png" border="0"></a></p>
                    <a title="一个人的空间，静静的享受" href=""  style="font-size:12px;color: #808080;" ><label style="color: #ff6600;">❤</label> 有时候，享受安静真的是那么简单！</a>
                </div>
            </div>
        </div>
        <p id="op_result"></p>
    </body>
</html>