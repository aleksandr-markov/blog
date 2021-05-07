
<div class="container">

<table id="table_id" class="display">
    <thead>
    <tr>
        <th>Логин</th>
        <th>Дата создания</th>
        <th>Название поста</th>
        <th>Текст поста</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item): ?>
    <tr>
        <td><?=$item['login']?></td>
        <td><?=$item['date_create']?></td>
        <td><?=$item['title']?></td>
        <td><?=$item['text']?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

</div>


<!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>-->