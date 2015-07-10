<table>
    <tr>
        <th>{lang}system.main.character{/lang}</th>
        <th>{lang}system.main.job{/lang}</th>
        <th>{lang}system.main.level{/lang}</th>
        <th>{lang}system.main.playtime{/lang}</th>
        <th>{lang}system.main.guild{/lang}</th>
    </tr>
    {foreach from=$user_characters item=char}
        <tr>
            <td><a href="{$system_path}Character/{$char->getName()|escape:'url'}">{$char->getName()}</a></td>
            <td>{$char->getTranslatedJob()}</td>
            <td>{$char->getLevel()}</td>
            <td>{$char->getPlaytimeHuman()}</td>
            <td>
                {if $char->hasGuild()}
                    <a href="{$system_path}Guild/{$char->getGuildName()|escape:'url'}">{$char->getGuildName()}</a>
                {else}
                    {lang}system.user.noGuild{/lang}
                {/if}
            </td>
        </tr>
    {/foreach}
</table>