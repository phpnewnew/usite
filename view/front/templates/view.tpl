{include file="../../includes/header.tpl"}
<div>
　　<table width="322" border="1" align="center" cellpadding="3" cellspacing="0">
		<th>序号</th>
		<th>水果名称</th>
        {foreach from=$items item=item}
        <tr>
			<td>{$item.id}</td>
             <td>{$item.name}</td>
        </tr>
        {/foreach}	
　　</table>

</div>
<table>
    <tr>
        <td>
            <div class="voteForm">
                <p>你最喜欢的水果</p>
                <br>
                <br>

                <form action="/view/front/report.php" method="post">
				
					{foreach from=$items item=item}
						<input type="radio" name="fruit" value="{$item.id}-{$item.name}">{$item.name}</input>
						<br>
					{/foreach}	
                    <input type="submit" value="submit">
                </form>

            </div>
        </td>
    </tr>

    <tr>
        <td>
            <input class="appDomin" type="hidden" value="{$myDomain}"/>
            <div class="report"></div>
            <button class="viewreport">查看报告</button>
        </td>
    </tr>

    <tr>
        <td>
            <input class="topinput" type="text" value=""/>
            <div class="topoutput"></div>
            <button class="topbtn">top get shop api</button>
        </td>
    </tr>

</table>
<script src="/assets/javascripts/exchange.js"></script>
{include file="../../includes/footer.tpl"}



