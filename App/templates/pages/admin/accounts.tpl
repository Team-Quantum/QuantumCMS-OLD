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
            <td>
                {if $account->getStatus() ne 'OK'}
                    <b style="color: red;">{$account->getStatus()}</b>
                {else}
                    {* Let's check us if the user is banned with availDt *}
                    {if $account->isTemporaryBanned()}
                        <b style="color: red">Banned until: {$account->getAvailDtDisplay()}</b>
                    {else}
                        <b style="color: green;">{$account->getStatus()}</b>
                    {/if}
                {/if}

            </td>
        </tr>
    {/foreach}
</table>
{navigator current=$system_admin_accounts_current max=$system_admin_accounts_max}