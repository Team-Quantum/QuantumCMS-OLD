{foreach from=$info item=i}
    <div class="info">{$i}</div>
{/foreach}
{foreach from=$success item=s}
    <div class="success">{$s}</div>
{/foreach}
{foreach from=$errors item=error}
    <div class="error">{$error}</div>
{/foreach}
<div style="float: left; padding-right: 20px; border-right: 1px solid black;">
    <form method="post" action="{$system_path}User/ChangeDetails">
        <label for="old_pass">Passwort &auml;ndern:</label><br />
        <input name="old_pass" id="old_pass" type="password" size="16" placeholder="Altes Passwort" /><br />
        <input name="new_pass" id="new_pass" type="password" size="16" placeholder="Neues Passwort" /><br />
        <input name="new_pass2" id="new_pass2" type="password" size="16" placeholder="Neues Passwort" /><br />
        <input name="change_pass" type="submit" value="{lang}system.button.submit{/lang}" />
        <input type="hidden" name="action" value="user-change-pass" />
    </form>
</div>
<div style="float: left; padding-left: 20px; padding-right: 20px; border-right: 1px solid black;">
    <form method="post" action="{$system_path}User/ChangeDetails">
        <label for="old_mail">E-Mail &auml;ndern:</label><br />
        <input name="old_mail" id="old_mail" type="email" size="16" placeholder="Alte E-Mail" /><br />
        <input name="new_mail" id="new_mail" type="email" size="16" placeholder="Neue E-Mail" /><br />
        <input name="new_mail2" id="new_mail2" type="email" size="16" placeholder="Neue E-Mail" /><br />
        <input name="change_mail" type="submit" value="{lang}system.button.submit{/lang}" />
        <input type="hidden" name="action" value="user-change-mail" />
    </form>
</div>
<div style="float: left; padding-left: 20px;">
    <form method="post" action="{$system_path}User/ChangeDetails">
        <label for="old_name">Anzeigename &auml;ndern:</label><br />
        <input name="old_name" id="old_name" type="text" size="16" placeholder="Alter Name" /><br />
        <input name="new_name" id="new_name" type="text" size="16" placeholder="Neuer Name" /><br />
        <input name="new_name2" id="new_name2" type="text" size="16" placeholder="Neuer Name" /><br />
        <input name="change_name" type="submit" value="{lang}system.button.submit{/lang}" />
        <input type="hidden" name="action" value="user-change-name" />
    </form>
</div>
<div style="clear: both;">
</div>