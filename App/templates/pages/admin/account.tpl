{if $account_found}
    <dl class="dl-horizontal">
        <dt>ID</dt>
        <dd>{$system_admin_account->getId()}</dd>

        <dt>Login</dt>
        <dd>{$system_admin_account->getLogin()}</dd>

        <dt>Social ID</dt>
        <dd>{$system_admin_account->getSocialId()}</dd>

        <dt>E-Mail</dt>
        <dd>{$system_admin_account->getEmail()}</dd>

        <dt>Created at</dt>
        <dd>{$system_admin_account->getCreateTimeDisplay()}</dd>

        <dt>Last play</dt>
        <dd>{$system_admin_account->getLastPlayDisplay()}</dd>

        <dt>Status</dt>
        <dd>{$system_admin_account->getStatus()}</dd>
    </dl>

{else}
    <div class="alert alert-danger" role="alert">{lang}system.admin.account.notFound{/lang}</div>
{/if}