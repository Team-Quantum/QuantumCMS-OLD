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
        <dd>{$system_admin_character->getExpFormatted()}</dd>

        <dt>Gold</dt>
        <dd>{$system_admin_character->getGoldFormatted()}</dd>

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
    <br />
    <h3>Inventory</h3>
    <div class="m2-inventory" data-m2-width="5" data-m2-height="9">
        <div class="m2-item" data-m2-pos="21" data-m2-vnum="18" data-m2-name="Sword+8"></div>
        <div class="m2-item" data-m2-pos="23"></div>
    </div>

    <div class="m2-inventory" data-m2-width="5" data-m2-height="9">

    </div>
{else}
    <div class="alert alert-danger" role="alert">{lang}system.admin.character.notFound{/lang}</div>
{/if}