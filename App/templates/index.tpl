<!DOCTYPE html>
<html lang="en">
<head>
    <title>{$system_pageTitle}</title>

    <!-- Favicon Integration -->
    <link rel="shortcut icon" href="{$system_path}assets/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{$system_path}assets/img/favicon/apple-touch-icon.png">

    <!-- Main/Wiki/Board Page Style -->
    <link rel="stylesheet" type="text/css" href="{$system_path}assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="{$system_path}assets/css/wiki.css" />
    <link rel="stylesheet" type="text/css" href="{$system_path}assets/css/board.css" />

    <!-- jQuery -->
    <!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

    <!-- Anything Slider optional plugins -->
    <script src="{$system_path}assets/js/slider/jquery.easing.1.2.js"></script>

    <!-- Anything Slider -->
    <link href="{$system_path}assets/css/slider/anythingslider.css" rel="stylesheet">
    <link rel="stylesheet" href="{$system_path}assets/css/slider/theme-metallic.css">
    <script src="{$system_path}assets/js/slider/jquery.anythingslider.js"></script>

    <!-- AnythingSlider optional extensions -->
    <!-- <script src="js/jquery.anythingslider.fx.js"></script> -->
    <!-- <script src="js/jquery.anythingslider.video.js"></script> -->

    <!-- ColorBox -->
    <link href="{$system_path}assets/css/colorbox/colorbox.css" rel="stylesheet">
    <script src="{$system_path}assets/js/colorbox/jquery.colorbox-min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">

    <style>
        #slider1 { width: 350px; height: 195px; list-style: none}
    </style>

    <!-- AnythingSlider initialization -->
    <script>
        // DOM Ready
        $(function(){
            $('#slider1').anythingSlider({
                toggleControls : true,
                theme          : 'metallic',
                autoPlay	   : true,
                autoPlayLocked : false,
                enableStartStop: true
            });
        });
    </script>

    <meta charset="utf-8">
</head>
<body>
    <div id="wrapper">
        <!--<iframe width="1px" height="1px" src="https://www.youtube.com/embed/5CLFwCUyWqY?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>-->
        <div id="headerlogo">
            <div id="headertitle">
                <a href="{$system_path}" target="_self">
                    {$system_pageTitle} - <span class="headertext">{$system_slogan}</span>
                </a>
            </div>
            <div id="download_button">
                <a href="{$system_path}Downloads" class="download">{lang}system.button.download{/lang}<br><span class="download_dec">{lang}system.button.download.text{/lang}</span></a>
            </div>
        </div>
        <div id="left">
            <div id="box">
                {* Top Navigation and Account Details here *}
                {include file="topNav.tpl"}
            </div>

            {* Slider 'Plugin' *}
            <div id="box">
                <ul id="slider1">
                    <li><img width="195" height="97" src="{$system_path}assets/media/images/ex06.jpg"></li>
                    <li><iframe width="195" height="97" src="https://www.youtube.com/embed/fYMQO3she9E?modestbranding=1&amp;autohide=1&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen></iframe></li>
                    <li><img width="195" height="97" src="{$system_path}assets/media/images/ex03.jpg"></li>
                </ul>
            </div>

            <div id="box">
                {* Page Content *}
                {include file=$pageTemplate}
            </div>

            <div id="box">
                <div id="foot_links_main">
                    {* Footer with Backlinks *}
                    <div id="footer_backlinks">
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="{$system_path}assets/img/icons/footer/youtube.png"/>
                        </a>
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="{$system_path}assets/img/icons/footer/fb.png"/>
                        </a>
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="{$system_path}assets/img/icons/footer/twitter.png"/>
                        </a>
                    </div>
                    <a href="#" target="_blank">Impressum</a> |
                    <a href="http://www.elitepvpers.com" target="_blank">Elitepvpers</a> |
                    <a href="http://www.metin2dev.org" target="_blank">Metin2dev</a> |
                    <a href="#" target="_blank">AGB's</a> |
                    <a href="#" target="_blank">Contact</a>
                </div>
            </div>


            {* Copyright Box
               Please note that's allowed to add your copyright but it's forbidden to remove the copyright
               of Team-Quantum.
            *}
            <div id="box">
                {include file="copyright.tpl"}
            </div>
        </div>
        <div id="right">
            <div id="box">
                <div class="info">
                    Welcome! {$system_pageTitle} is a FREE-to-play massive online world packed with intense action and
                    brutal fighting.
                </div>
            </div>
            {foreach from=$system_sidebar_right item=tpl}
                <div id="box">{include file=$tpl}</div>
            {/foreach}
        </div>
    </div>
</body>
</html>