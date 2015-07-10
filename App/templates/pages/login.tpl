<form method="post" action="{$system_path}Login">
    {foreach from=$errors item=error}
        <div class="error">{$error}</div>
    {/foreach}
    <label for="username">{lang}system.page.login.username{/lang}:</label><br />
    <input name="username" id="username" type="text" size="35" /><br />
    <label for="password">{lang}system.page.login.password{/lang}:</label><br />
    <input name="password" id="password" type="password" size="35" /><br /><br />
    {recaptcha}
    <input name="login" type="submit" value="{lang}system.page.login.doLogin{/lang}" />
    <input type="hidden" name="action" value="system-login" />
</form>