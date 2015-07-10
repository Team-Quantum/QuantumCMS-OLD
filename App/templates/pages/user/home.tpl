<div style="float: left; padding-right: 20px; height: 100%; border-right: 1px solid black;">
    <table>
        <tr>
            <th>Account:</th>
            <td>{$system_currentUser->getLogin()}</td>
        </tr>
        <tr>
            <th>Reich:</th>
            <td><img src="{$system_path}assets/img/empire_{$home_empire}.png" /></td>
        </tr>
        <tr>
            <th>Charaktere:</th>
            <td>{$home_character_count}</td>
        </tr>
        <tr>
            <th>Spielzeit:</th>
            <td>{$home_play_time}</td>
        </tr>
        <tr>
            <th>L&ouml;schcode:</th>
            <td>{$system_currentUser->getSocialId()}</td>
        </tr>
    </table>
</div>
<div style="float: left; padding-left: 20px;">
    {foreach from=$home_menuPoints item=menuPoint}
        <li><a href="{$system_path}{$menuPoint['link']}">{$menuPoint['title']}</a></li>
    {/foreach}
</div>
<div style="clear: both;">
</div>