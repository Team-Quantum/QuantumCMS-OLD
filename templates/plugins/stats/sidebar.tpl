<div id="server_statistic">
    <!-- Server Statistic -->
    <ul class="column_result2">
        <li class="result_column"><span><b>{lang}plugin.stats.server.title{/lang}</b></span></li>
        <li>{lang}plugin.stats.updated{/lang}: {$serverstatuses[0]->getLastCheck()|date_format:"%H:%M:%S"} h</li>

        {foreach from=$serverstatuses item=channel}
            <li class="{if $channel->isStatus()}online{else}offline{/if}">{$channel->getName()}</li>
        {/foreach}

    </ul>
    <ul class="column_result2">
        <li class="result_column"><span><b>{lang}plugin.stats.player.title{/lang}</b></span></li>
        <li class="offline"><span>Player Online: 0 </span></li>
        <li class="offline"><span>Player Online (24):  0 </span></li>
        <li class="online"><span><b>{lang}plugin.stats.accounts{/lang}:</b> {$accounts}</span></li>
        <li class="online"><span><b>{lang}plugin.stats.players{/lang}:</b> {$players}</span></li>
    </ul>
</div>