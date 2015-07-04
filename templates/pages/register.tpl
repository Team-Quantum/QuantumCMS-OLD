<form method="post" action="{$system_path}Register">
    {foreach from=$errors item=error}
        <div class="error">{$error}</div>
    {/foreach}
    {if $register_success}
        <div class="success">{lang}system.register.success{/lang}</div>
    {/if}
    <input value="" name="acc_name" type="text" min="8" maxlength="16" required="required" placeholder="{lang}system.register.field.acc_name{/lang}"/><br/>
    <input value="" name="visible_name" type="text" min="8" maxlength="16" required="required" placeholder="{lang}system.register.field.visible_name{/lang}"/><br/>
    <input value="" name="password" type="password" min="8" maxlength="16" required="required" placeholder="{lang}system.register.field.password{/lang}"/><br/>
    <input value="" name="check_password" type="password" min="8" maxlength="16" required="required" placeholder="{lang}system.register.field.check_password{/lang}"/><br/>
    <input value="" name="mailaddress" type="email" maxlength="50" required="required" placeholder="{lang}system.register.field.mailaddress{/lang}"/><br/>
    <input value="" name="check_mailaddress" type="email" maxlength="50" required="required" placeholder="{lang}system.register.field.check_mailaddress{/lang}"/><br/>
    <input value="" name="deletecode" type="text" min="7" maxlength="7" required="required" placeholder="{lang}system.register.field.deletecode{/lang}"/><br/><br/>
    {recaptcha}
    <input name="do_reg" type="submit" value="{lang}system.button.submit{/lang}" />
    <input type="reset" value="{lang}system.button.reset{/lang}" />
    <input type="hidden" name="action" value="system-register" />
</form>