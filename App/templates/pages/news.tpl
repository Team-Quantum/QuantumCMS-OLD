<h2>{lang}system.news.title{/lang}</h2>
<div class="info">
    {$news_text}
    {*$news_text->getContent()*}
    {*if $news_text->isHasReadMore()*}

    <br/>

    {if $news_text}
        <a href="{$system_path}/{$board_link}index.php/Thread/{$thread_id}" target="_blank">Read more Wbb4</a><br/>
        <a href="{$system_path}/{$board_link}index.php?page=Thread&threadID={$thread_id}" target="_blank">Read more Wbb3</a>
        <!--<a href="{*$board_link->getReadMore()*}">Read more</a>-->
    {/if}
</div>