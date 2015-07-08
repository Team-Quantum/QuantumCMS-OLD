<h2>{lang}system.migrate.title{/lang}</h2>
{if !$disable}
<div class="info">
    {lang}system.migrate.desc{/lang}
</div>
<form method="post" action="{$system_path}MigrateAccount">
    <label for="visible_name">{lang}system.register.field.visible_name{/lang}:</label><br />
    <input name="visible_name" id="visible_name" type="text" size="35" /><br />
    <input name="login" type="submit" value="{lang}system.button.submit{/lang}" />
    <input type="hidden" name="action" value="system-migrate-account" />
</form>
{else}
    <div class="error">
        {lang}system.migrate.error{/lang}
    </div>
{/if}