<html>
<head>
    <title>{$system_pageTitle}</title>
    <link rel="stylesheet" type="text/css" href="{$system_path}css/main.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
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
                {* Page Content *}
                {include file=$pageTemplate}
            </div>

            {* Copyright Box
               Please note that's allowed to add your copyright but it's forbidden to remove the copy right
               of Team-Quantum.
            *}
            <div id="box">
                <div id="footer_copyright"
                    {include file="copyright.tpl"}
                </div>
            </div>
        </div>
        <div id="right">

        </div>
    </div>
</body>
</html>