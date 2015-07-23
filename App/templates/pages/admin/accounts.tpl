<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Login</th>
        <th>E-Mail</th>
        <th>Status</th>
    </tr>
    {foreach from=$system_admin_accounts item=account}
        <tr>
            <td>{$account->getId()}</td>
            <td>{$account->getLogin()}</td>
            <td>{$account->getEmail()}</td>
            <td>{$account->getStatus()}</td>
        </tr>
    {/foreach}
</table>
<ul class="pagination" style="float: right">
    <li>
        <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    {for $i=$system_admin_accounts_current - 5 to $system_admin_accounts_current + 5}
        {if $i <= 0 or $i > $system_admin_accounts_max}{continue}{/if}
        <li{if $i == $system_admin_accounts_current} class="active"{/if}><a href="#">{$i}</a></li>
    {/for}
    <li>
        <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>