<h3> Topics List - <a href="/admin/topics/add">Add</a></h3>
<table class="table table-hover table-topics">
  <? foreach($topics as $topic){ ?>
  <tr>
    <td class="active"><a href="/admin/topics/edit/<?=$topic->id?>"><?=$topic->name?></a></td>
    <td class="active actions"><a href="/admin/topics/delete/<?=$topic->id?>">Delete</a></td>
  </tr>
  <? } ?>
</table>
