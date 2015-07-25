{if $character_found}
    <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd>{$system_admin_character->getName()}</dd>

        <dt>Account</dt>
        <dd>
            <a href="{$system_path}Admin/Account/{$system_admin_character->getAccountName()|escape:'url'}">
                {$system_admin_character->getAccountName()}
            </a>
        </dd>

        <dt>Level</dt>
        <dd>{$system_admin_character->getLevel()}</dd>

        <dt>EXP</dt>
        <dd>{$system_admin_character->getExp()}</dd>

        <dt>Gold</dt>
        <dd>{$system_admin_character->getGold()}</dd>

        <dt>Guild</dt>
        <dd>
            <a href="{$system_path}Admin/Guild/{$system_admin_character->getGuildName()|escape:'url'}">
                {$system_admin_character->getGuildName()}
            </a>
        </dd>

        <dt>Alignment</dt>
        <dd>{$system_admin_character->getAlignmentHTML()}</dd>

        <dt>Job</dt>
        <dd>{$system_admin_character->getJobDisplay()}</dd>

        <dt>Empire</dt>
        <dd>{$system_admin_character->getEmpireDisplay()}</dd>
    </dl>
{else}
    <div class="alert alert-danger" role="alert">{lang}system.admin.character.notFound{/lang}</div>
{/if}