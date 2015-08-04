<?php
namespace App\Pages;

use Quantum\BasePage;
use Quantum\Core;
use Quantum\Data\NewsObject;

class News extends BasePage{

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function preRender($core, $smarty)
    {
        // TODO: Load News From Database [Config -> Wbb3, Wbb4, internalDB, ...]
        $newsWbb3 = NULL;
        $newsWbb4 = NULL;
        $newsInternal = NULL;
        $text = NULL;



        $news = new NewsObject($this->parseBBCode($this->cutString($text)), 'http://www.metin2dev.org', true);
        $smarty->assign('news_text', $news);
        $smarty->assign('thread_id', '1');
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty \Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty)
    {
        return 'pages/news.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty \Smarty
     * @return void
     */
    public function postRender($core, $smarty)
    {
    }

    private function parseBBCode($message) {
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

    private function cutString($text){
        //  return count($text);

        if(strlen($text)>500){
            $msg = substr($text, 0, 500);
            return $msg.' ...';
        }else{
            return substr($text, 0, 500);
        }

    }

    private function loadNews($version = 'internal', $msgn = 5){

        // $version = $this->core->getSettings()['news']['version']
        // $msgn = $this->core->getSettings()['news']['messages']

        $em = $this->core->getServerDatabase('player')->getEntityManager();

        if($version == 'internal'){

            if($this->core->getSettings()['news']['type']['internal'] == 'board'){
                $news = $em->getRepository('\\Quantum\\DBO\\Internal\\Board')->findBy(array(), array(), $msgn, 0);


            }elseif($this->core->getSettings()['news']['type']['internal'] == 'internal'){
                $news = $em->getRepository('\\Quantum\\DBO\\Internal\\News')->findBy(array(), array(), $msgn, 0);


            }else{
                throw new \InvalidArgumentException;
            }

        }elseif($version == 'wbb3'){
            $threadTable = "wbb1_1_thread";
            $postTable = "wbb1_1_post";

            $news = $em->getRepository('\\Quantum\\DBO\\Wbb3')->findBy(array(), array(), $msgn, 0);

        }elseif($version == 'wbb4'){
            $threadTable = "wbb1_1_thread";
            $postTable = "wbb1_1_post";

            $news = $em->getRepository('\\Quantum\\DBO\\Wbb4')->findBy(array(), array(), $msgn, 0);

            $newsObject = $em->getConnection()->query();

        }else{
            throw new \InvalidArgumentException;
        }
    }
}