{include file="../../includes/header.tpl"}
<form method="post" action="/view/front/dnamicFunction.php">
<table>
    <tr>
        <td>
            选择服务类型：
        </td>
        <td>
            <select name="type">
                    <option value ="top">通过top接口查询店铺信息</option>
                    <option value ="base">基础服务</option>

        </select>
        </td>
    </tr>

    <tr>
          <td>
            选择服务名称：
        </td>
        <td>
              <select name="service">
                    <option value ="cache">cache</option>
                    <option value ="filestore">filestore</option>
                    <option value="fetch">fetch</option>
            </select>
        </td>
    </tr>

      <tr>
          <td>
            输入方法：
        </td>
        <td>
               <input type="text" name="method" value=""/>
        </td>
    </tr>

    <tr>
          <td>
            输入参数：
        </td>
        <td>
            <input type="text" name="parameters" value="" />
        </td>
    </tr>

     <tr>
          <td>
            结果：
        </td>
        <td>
            <input type="text" name="result" value="request: {$requeststr}, result:{$result}" style="width: 300px; height: 300px;"/>
        </td>
    </tr>

         <tr>
         <td>

        </td>
        <td>
            <input type="submit" value="submit">
        </td>
    </tr>

</table>

{include file="../../includes/footer.tpl"}

 </form>

