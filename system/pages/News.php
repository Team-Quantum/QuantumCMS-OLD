<?php

namespace Quantum\pages;

use Quantum\Core;
use Quantum\Data\NewsObject;

class News implements IPage{

    private function BBCodeParser($message) {
        return nl2br(utf8_encode(preg_replace(array(  '~\[b\](.*?)\[/b\]~s',
            '~\[i\](.*?)\[/i\]~s',
            '~\[u\](.*?)\[/u\]~s',
            '~\[quote\](.*?)\[/quote\]~s',
            '~\[size=(.*?)\](.*?)\[/size\]~s',
            '~\[color=(.*?)\](.*?)\[/color\]~s',
            '~\[url=(.*?)\](.*?)\[/url\]~s',
            '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
            '~\[youtube=.*?v=(.*)\].*\[/youtube\]~s',
            '~\[align=center\](.*?)\[/align\]~s',
        ),
            array('<b>$1</b>',
                '<i>$1</i>',
                '<span style="text-decoration:underline;">$1</span>',
                '<pre>$1</'.'pre>',
                '<span style="font-size:$1px;">$2</span>',
                '<span style="color:$1;">$2</span>',
                '<a href=$1>$2</a>',
                '<img src="$1" alt=" onmouseover= "this.src="$1";this.width=1100;this.height=350;" />',
                '<iframe width="360" height="250" src="//www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>',
                '<center>$1</center>'

            ), $message)));
    }

    private function CutString($text){
      //  return count($text);

        if(strlen($text)>500){
            $msg = substr($text, 0, 500);
            return $msg.' ...';
        }else{
            return substr($text, 0, 500);
        }

    }

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        // TODO: Load News From Database [Config -> Wbb3, Wbb4, internalDB, ...]

        $text = 'Hallo liebe Community,<br/>die [u]wöchentliche Serverwartung[/u] wird morgen früh [color=#ff6600]um 3 Uhr[/color] stattfinden.<br/>Ab dann ist der [color=#ff6600]Gameserver für ca. 1h nicht erreichbar[/color].<br/><br/>Wir bitten um Verständnis für die Unannehmlichkeiten.<br/><br/>[youtube=?v=c0oMwcMSqoY][/youtube]<br/>Liebe Grüße,<br/>.PolluX';

        $news = new NewsObject($this->BBCodeParser($this->CutString($text)), 'http://www.metin2dev.org', true);
        $smarty->assign('news_wbb', $news);
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
        // TODO: Implement getTemplate() method.
        return 'pages/home.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
        // TODO: Implement postRender() method.
    }
}