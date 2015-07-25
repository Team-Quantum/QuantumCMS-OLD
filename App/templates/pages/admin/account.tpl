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
    <br />
    <h3>Characters</h3>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Level</th>
        </tr>
        {foreach from=$system_admin_characters item=character}
            <tr data-href="{$system_path}Admin/Character/{$character->getName()|escape:'url'}">
                <td>{$character->getId()}</td>
                <td>{$character->getName()}</td>
                <td>{$character->getLevel()}</td>
            </tr>
        {/foreach}
    </table>

{else}
    <div class="alert alert-danger" role="alert">{lang}system.admin.account.notFound{/lang}</div>
{/if}