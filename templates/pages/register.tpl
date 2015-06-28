<form method="post" action="{$system_path}Login">
    <input value="" name="acc_name" type="text" min="8" maxlength="16" required="required" placeholder="{lang}system.register.account{/lang}"/><br/>
    <input value="" name="visible_name" type="text" min="8" maxlength="16" required="required" placeholder="{lang}system.register.boardname{/lang}"/><br/>
    <input value="" name="password" type="password" min="8" maxlength="16" required="required" placeholder="{lang}system.register.pass{/lang}"/><br/>
    <input value="" name="check_password" type="password" min="8" maxlength="16" required="required" placeholder="{lang}system.register.pass2{/lang}"/><br/>
    <input value="" name="mailadress" type="email" maxlength="50" required="required" placeholder="{lang}system.register.mail{/lang}"/><br/>
    <input value="" name="check_mailadress" type="email" maxlength="50" required="required" placeholder="{lang}system.register.mail2{/lang}"/><br/>
    <input value="" name="deletecode" type="text" min="7" maxlength="7" required="required" placeholder="{lang}system.register.deletecode{/lang}"/><br/>
    {recaptcha}<br/>
    <button name="do_reg" type="submit">{lang}system.button.submit{/lang}</button><button type="reset">{lang}system.button.reset{/lang}</button>
</form>