<html>
<head>
    <title>{$system_pageTitle}</title>
    <link rel="stylesheet" type="text/css" href="{$system_path}css/main.css" />
    <link rel="stylesheet" type="text/css" href="{$system_path}css/wiki.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!--<iframe width="1px" height="1px" src="https://www.youtube.com/embed/5CLFwCUyWqY?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>-->
        <div id="headerlogo">
            <div id="headertitle">
                {$system_pageTitle} - <span class="headertext">{$system_slogan}</span>
            </div>
            <div id="download_button">
                <a href="#" class="download">DOWNLOAD CLIENT<br /><span class="download_dec">version 1.0</span></a>
            </div>
        </div>
        <div id="left">
            <div id="box">
                {* Top Navigation and Account Details here *}
                {include file="topNav.tpl"}
            </div>

            <div id="box">
                <div class="info">
                    Super Epic CMS ihr Young Sluts! <3
                </div>
            </div>

            <div id="box">
                {* Page Content *}
                {include file=$pageTemplate}
            </div>

            <div id="box">
                <div id="foot_links_main">
                    {* Footer with Backlinks *}
                    <div id="footer_backlinks">
                        <a href="#" target="_blank"><img height="32px" width="32px" src="img/icons/footer/youtube.png"/></a>
                        <a href="#" target="_blank"><img height="32px" width="32px" src="img/icons/footer/fb.png"/></a>
                        <a href="#" target="_blank"><img height="32px" width="32px" src="img/icons/footer/twitter.png"/></a>
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
                    Welcome! {$system_pageTitle} is a FREE-to-play massive online world packed with intense action and brutal fighting.
                </div>
            </div>
            <div id="box">
                {include file="pages/includes/status.tpl"}
            </div>
            <div id="box"></div>
            <div id="box"></div>
            <div id="box"></div>
            <div id="box"></div>
            <div id="box"></div>
        </div>
    </div>
</body>
</html>