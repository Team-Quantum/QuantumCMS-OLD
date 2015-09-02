{navigator current=$system_admin_guilds_current max=$system_admin_guilds_max}
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Owner</th>
        <th>Level</th>
        <th>W/D/L</th>
        <td>K/D</td>
    </tr>
    {foreach from=$system_admin_guilds item=guild}
        <tr data-href="{$system_path}Admin/Guild/{$guild->getName()|escape:'url'}">
            <td>{$guild->getId()}</td>
            <td>{$guild->getName()}</td>
            <td>
                <a href="{$system_path}Admin/Character/{$guild->getOwner()->getName()|escape:'url'}">
                    {$guild->getOwner()->getName()}
                </a>
            </td>
            <td>{$guild->getLevel()}</td>
            <td>{$guild->getWin()} / {$guild->getDraw()} / {$guild->getLoss()}</td>
            <td>{$guild->getWinRatio()}</td>
        </tr>
    {/foreach}
</table>
{navigator current=$system_admin_guilds_current max=$system_admin_guilds_max}