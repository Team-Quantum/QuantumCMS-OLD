<div class="navleft">
    {if $system_currentUser == null}
        {lang}system.main.welcome{/lang} <b>{lang}system.main.guest{/lang}</b>.
        <a href="{$system_path}/Login">{lang}system.page.login{/lang}</a> |
        <a href="{$system_path}/Register">{lang}system.page.register{/lang}</a>
    {else}
        {lang}system.main.welcome{/lang} <b>{$system_currentUser->getLogin()}</b>.
    {/if}
</div>
<div class="navright">
    <a class="blue" href="#">Home</a>
</div>