{navigator current=$system_admin_characters_current max=$system_admin_characters_max}
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Account</th>
        <th>Name</th>
        <th>Level</th>
    </tr>
    {foreach from=$system_admin_characters item=character}
        <tr data-href="{$system_path}Admin/Character/{$character->getName()|escape:'url'}">
            <td>{$character->getId()}</td>
            <td>
                <a href="{$system_path}Admin/Account/{$character->getAccountName()|escape:'url'}">
                    {$character->getAccountName()}
                </a>
            </td>
            <td>{$character->getName()}</td>
            <td>{$character->getLevel()}</td>
        </tr>
    {/foreach}
</table>
{navigator current=$system_admin_characters_current max=$system_admin_characters_max}