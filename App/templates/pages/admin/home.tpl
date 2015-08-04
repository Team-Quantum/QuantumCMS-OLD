<style>
    #marginsides pre{
        margin-left: 15px;
        /*margin-right: 15px;*/
    }
</style>

{* Server Statistics *}
<div class="col-xs-1" style="width: 50%">
	<pre>
		<table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th><th>Value</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$array item=value key=name}
                <tr data-href="{$system_path}Admin/{$name}"><td>{$name}</td><td>{$value}</td></tr>
            {/foreach}
            </tbody>
        </table>
	</pre>
</div>
<div>
	<pre>
		<table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th><th>Value</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$accountStats item=value key=name}
                {if $name == Jinno}
                    <tr class="info"><td>{$name}</td><td>{$value->format()}</td></tr>
                {elseif $name == Shinsoo}
                    <tr class="danger"><td>{$name}</td><td>{$value->format()}</td></tr>
                {elseif $name == Chunjo}
                    <tr><td>{$name}</td><td>{$value->format()}</td></tr>
                {else}
                    <tr class="success"><td>{$name}</td><td>{$value->format()}</td></tr>
                {/if}
            {/foreach}
            </tbody>
        </table>
	</pre>
</div>
<br/>
{* other information *}
<div id="marginsides">
    <pre>
        <table class="table">
            <thead>
                <tr>
                    <th>Typ</th><th>Wert</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$server_info item=lel key=hm}
                    <tr><td>{$hm}</td><td>{$lel}</td></tr>
                {/foreach}
            </tbody>
        </table>
    </pre>
    <pre>
        <table class="table">
            <thead>
            <tr>
                <th>Typ</th><th>Wert</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$session_info item=lel key=hm}
                <tr><td>{$hm}</td><td>{$lel}</td></tr>
            {/foreach}
            </tbody>
        </table>
    </pre>
    <pre>
        <table class="table">
            <thead>
            <tr>
                <th>Typ</th><th>Wert</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$cookie_info item=lel key=hm}
                <tr><td>{$hm}</td><td>{$lel}</td></tr>
            {/foreach}
            </tbody>
        </table>
    </pre>
</div>
