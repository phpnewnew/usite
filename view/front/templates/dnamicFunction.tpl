{include file="../../includes/header.tpl"}
<form method="post" action="/view/front/dnamicFunction.php">
<table>
    <tr>
        <td>
            ѡ��������ͣ�
        </td>
        <td>
            <select name="type">
                    <option value ="top">ͨ��top�ӿڲ�ѯ������Ϣ</option>
                    <option value ="base">��������</option>

        </select>
        </td>
    </tr>

    <tr>
          <td>
            ѡ��������ƣ�
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
            ���뷽����
        </td>
        <td>
               <input type="text" name="method" value=""/>
        </td>
    </tr>

    <tr>
          <td>
            ���������
        </td>
        <td>
            <input type="text" name="parameters" value="" />
        </td>
    </tr>

     <tr>
          <td>
            �����
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

