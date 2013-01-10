{include file="../../includes/header.tpl"}
{if $id > 0}
    <div>投票成功</div>
	{$_loginUser.nick}
    <div>你最喜欢的水果是：{$voteItem} </div>
{elseif $nologin}
    <div>您没登录，登录后才能投票</div>
{/if}
    <br/>

{if $report }
<div>目前的投票结果是：
    <div>
        <ul>
             {foreach from=$report item=item}
                 <li>
                    {$item.item_id}- {$item.name} ： {$item.count}
                 </li>
             {/foreach}
        </ul>
 </div>
 </div>
{/if}
<a href="/view/front/view.php"  >继续投票</a>
{include file="../../includes/footer.tpl"}