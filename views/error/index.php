{capture assign="context"}
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Oops!</h3>
    </div>
    <div class="panel-body">
        {$errorMessage}
    </div>
</div>
{/capture}
{include file="../templates/layout.tpl"}
