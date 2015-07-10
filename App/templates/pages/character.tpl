{if $character_found}
    <table>
        <tr>
            <th>Name:</th>
            <td>{$character_player->getName()}</td>
            <td rowspan="6">
                <img src="{$system_path}assets/img/jobs/{$character_player->getJob()}.png" />
            </td>
        </tr>
        <tr>
            <th>Alignment:</th>
            <td>{$character_player->getAlignmentHTML()}</td>
        </tr>
        <tr>
            <th>Level:</th>
            <td>{$character_player->getLevel()}</td>
        </tr>
        <tr>
            <th>EXP:</th>
            <td>{$character_player->getExp()}</td>
        </tr>
        {if $character_player->hasGuild()}
            <tr>
                <th>Guild:</th>
                <td>
                    <a href="{$system_path}Guild/{$character_player->getGuildName()|escape:'url'}">
                        {$character_player->getGuildName()}
                    </a>
                </td>
            </tr>
        {/if}
        <tr>
            <th>Job:</th>
            <td>{$character_player->getTranslatedJob()}</td>
        </tr>
        <tr>
            <th>Playtime:</th>
            <td>{$character_player->getPlaytimeHuman()}</td>
        </tr>
    </table>

{else}
    -.-
{/if}
