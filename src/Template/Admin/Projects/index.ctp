<h3> Projects List - <a href="/admin/projects/add">Add</a></h3>
<table class="table table-hover table-projects">
  <? foreach($projects as $project){ ?>
  <tr>
    <td class="active"><a href="/admin/projects/edit/<?=$project->id?>"><?=$project->name?></a></td>
    <td class="active actions"><a href="/admin/projects/delete/<?=$project->id?>">Delete</a></td>
  </tr>
  <? } ?>
</table>
