<h3> Categories List - <a href="/admin/categories/add">Add</a></h3>
<table class="table table-hover table-categories">
  <? foreach($categories as $category){ ?>
  <tr>
    <td class="active"><a href="/admin/categories/edit/<?=$category->id?>"><?=$category->name?></a></td>
    <td class="active actions"><a href="/admin/categories/delete/<?=$category->id?>">Delete</a></td>
  </tr>
  <? } ?>
</table>
