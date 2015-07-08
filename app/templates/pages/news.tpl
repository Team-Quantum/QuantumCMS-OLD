<h2>{lang}system.news.title{/lang}</h2>
<div class="info">
    {$news_wbb->getContent()}
    {if $news_wbb->isHasReadMore()}
        <a href="{$news_wbb->getReadMore()}">Read more</a>
    {/if}
</div>