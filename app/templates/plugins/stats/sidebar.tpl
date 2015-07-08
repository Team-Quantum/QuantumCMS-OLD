<div id="server_statistic">
    <!-- Server Statistic -->
    <ul class="column_result2">
        <li class="result_column"><span><b>{lang}plugin.stats.server.title{/lang}</b></span></li>
        {if isset($serverstatues[0])}
            <li>{lang}plugin.stats.updated{/lang}: {$serverstatuses[0]->getLastCheck()|date_format:"%H:%M:%S"} h</li>
        {/if}

        {foreach from=$serverstatuses item=channel}
            <li class="{if $channel->isStatus()}online{else}offline{/if}"><b>{$channel->getName()}</b></li>
        {/foreach}

    </ul>
    <ul class="column_result2">
        <li class="result_column"><span><b>{lang}plugin.stats.player.title{/lang}</b></span></li>
        <li class="{if $playerOnlineNow==0}offline{else}online{/if}"><span>
                <b>{lang}plugin.stats.player.online.now{/lang}</b> {$playerOnlineNow}</span></li>
        <li class="{if $playerOnlineLastDay==0}offline{else}online{/if}"><span>
                <b>{lang}plugin.stats.player.online.day{/lang}</b> {$playerOnlineLastDay}</span></li>
        <li class="online"><span><b>{lang}plugin.stats.accounts{/lang}:</b> {$accounts}</span></li>
        <li class="online"><span><b>{lang}plugin.stats.players{/lang}:</b> {$players}</span></li>
        <li class="online"><span><b>{lang}plugin.stats.guilds{/lang}:</b> {$guilds}</span></li>
    </ul>
</div>