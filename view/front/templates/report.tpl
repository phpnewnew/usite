{include file="../../includes/header.tpl"}
{if $id > 0}
    <div>ͶƱ�ɹ�</div>
	{$_loginUser.nick}
    <div>����ϲ����ˮ���ǣ�{$voteItem} </div>
{elseif $nologin}
    <div>��û��¼����¼�����ͶƱ</div>
{/if}
    <br/>

{if $report }
<div>Ŀǰ��ͶƱ����ǣ�
    <div>
        <ul>
             {foreach from=$report item=item}
                 <li>
                    {$item.item_id}- {$item.name} �� {$item.count}
                 </li>
             {/foreach}
        </ul>
 </div>
 </div>
{/if}
<a href="/view/front/view.php"  >����ͶƱ</a>
{include file="../../includes/footer.tpl"}