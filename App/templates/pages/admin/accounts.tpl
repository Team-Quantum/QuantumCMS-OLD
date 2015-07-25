{navigator current=$system_admin_accounts_current max=$system_admin_accounts_max}
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>E-Mail</th>
        <th>Status</th>
    </tr>
    {foreach from=$system_admin_accounts item=account}
        <tr data-href="{$system_path}Admin/Account/{$account->getLogin()|escape:'url'}">
            <td>{$account->getId()}</td>
            <td>{$account->getLogin()}</td>
            <td>{$account->getEmail()}</td>
            <td>{$account->getStatus()}</td>
        </tr>
    {/foreach}
</table>
{navigator current=$system_admin_accounts_current max=$system_admin_accounts_max}