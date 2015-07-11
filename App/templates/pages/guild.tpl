{if $guild_found}
    <table>
        <tr>
            <th>Name:</th>
            <td>{$guild->getName()}</td>
        </tr>
        <tr>
            <th>Level:</th>
            <td>{$guild->getLevel()}</td>
        </tr>
        <tr>
            <th>EXP:</th>
            <td>{$guild->getExp()}</td>
        </tr>
        <tr>
            <th>W/D/L:</th>
            <td>{$guild->getWin()} / {$guild->getDraw()} / {$guild->getLoss()}</td>
        </tr>
        <tr>
            <th>Win-Ratio:</th>
            <td>{$guild->getWinRatio()}</td>
        </tr>
        <tr>
            <th>Owner:</th>
            <td>
                <a href="{$system_path}Character/{$guild->getOwner()->getName()|escape:'url'}">
                    {$guild->getOwner()->getName()}
                </a>
            </td>
        </tr>
        <tr>
            <th style="vertical-align: top">Members:</th>
            <td>
                {foreach from=$guild->getMembers() item=member}
                    <a href="{$system_path}Character/{$member->getName()|escape:'url'}">
                        {$member->getName()}
                    </a><br />
                {/foreach}
            </td>
        </tr>
    </table>

{else}
    -.-
{/if}
