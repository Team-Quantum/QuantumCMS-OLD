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
    {foreach from=$system_admin_inventories item=inventory key=pageNo}
        <div class="m2-inventory" data-m2-width="5" data-m2-height="9">
            {foreach from=$inventory item=item}
                <div class="m2-item" data-m2-pos="{$item->getPos() - 9*5*$pageNo}" data-m2-vnum="18" data-m2-name="{$item->getVnum()}"></div>
            {/foreach}
        </div>
    {/foreach}
{else}
    <div class="alert alert-danger" role="alert">{lang}system.admin.character.notFound{/lang}</div>
{/if}