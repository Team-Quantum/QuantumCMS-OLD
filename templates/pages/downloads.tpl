{foreach from=$page_file_downloads item=file}
    <div class="download_button"><a href="{$system_path}dl/{$file->getFile()}" target="_blank">{$file->getDisplayName()}</a> </div><br/>
{/foreach}