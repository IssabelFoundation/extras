<table width="98%"  border="0" cellpadding="10" align="center">
{foreach from=$arrData key=k item=data}
  <tr>
    <td width="290" align="center"><img src="{$data.img}" align="center" width="290" >&nbsp;</td>
    <td valign="middle"><table class="tabForm" align="left" width="100%">
          <tr>
            <td><b>{$data.name}</b><br>
              {$data.description}<br>
              <b>{$tag_manuf_description}</b><br>
              <i>"{$data.manufacturer_desc}"</i><br>
              <b>{$download_link}: </b><a href="{$data.download_link}">{$data.download_link}</a><br>
              <b>{$tag_manufacturer}:</b> <a href="{$data.manufacturer_linkh}">{$data.manufacturer}</a><br>
            </td>
          </tr>
        </table>
    </td>
  </tr>

{/foreach}

</table>
