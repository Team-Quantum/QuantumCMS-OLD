<style>
    #marginsides pre{
        margin-left: 15px;
    }
</style>

{* Server Statistics *}
<div class="col-xs-1" style="width: 50%">
	<pre>
		<table class="table table-striped">
            <thead>
            <tr><th>Serverstatistik</th></tr>
            </thead>
            <tbody>
            {foreach from=$overview item=value key=name}
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
            <tr><th>Accountstatistik</th></tr>
            </thead>
            <tbody>
            {foreach from=$accountStats item=value key=name}
                {if $name == Jinno}
                    <tr class="info"><td>{$name}</td><td>{$value}</td></tr>
                {elseif $name == Shinsoo}
                    <tr class="danger"><td>{$name}</td><td>{$value}</td></tr>
                {elseif $name == Chunjo}
                    <tr><td>{$name}</td><td>{$value}</td></tr>
                {else}
                    <tr class="success"><td>{$name}</td><td>{$value}</td></tr>
                {/if}
            {/foreach}
            </tbody>
        </table>
	</pre>
</div>
<br/>
{* other information
<div id="marginsides">
    <pre>
        <table class="table">
            <thead>
            <tr><th>Webspace Info</th></tr>
            </thead>
            <tbody>
            {foreach from=$admin_server_info item=lel key=hm}
                <tr><td>{$hm}</td><td>{$lel}</td></tr>
            {/foreach}
            </tbody>
        </table>
    </pre>
</div>
*}