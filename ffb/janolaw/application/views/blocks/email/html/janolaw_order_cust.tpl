[{$smarty.block.parent}]

[{foreach from=$aJanolawData item=data}]
    <div style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; margin: 10px 0 10px;">
        <h3>[{$data.oxtitle}]</h3>
        [{$data.oxcontent}]
    </div>
[{/foreach}]
