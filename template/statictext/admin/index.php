<div>
    <table class="table">
        <tr>
            <th>Наименование</th>
            <th>Привью текста</th>
            <th>Действия</th>
        </tr>
        <?php foreach($MODEL as $key => $value): ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= substr(strip_tags($value), 0, 50) ?></td>
            <td>
                <a href="/admin/statictext/edit/<?= $key ?>">Редактировать</a>
                <a href="/admin/statictext/delete/<?= $key ?>">Удалить</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tfoot>
            <tr>
                <td colspan="3">
                    <a href="/admin/statictext/edit">Добавить</a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

