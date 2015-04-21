<h3> Developers List - <a href="/admin/developers/add">Add</a></h3>
<table class="table table-hover table-developers">
  <? foreach($developers as $developer){ ?>
  <tr>
    <td class="active"><a href="/admin/developers/edit/<?=$developer->id?>"><?=$developer->last_name?>, <?=$developer->first_name?></a></td>
    <td class="active actions"><a href="/admin/developers/delete/<?=$developer->id?>">Delete</a></td>
  </tr>
  <? } ?>
</table>
