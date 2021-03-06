<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Новости:</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (empty($list)): ?>
                            <p>Список новостей пуст</p>
                        <?php else: ?>
                            <table class="table">
                                <tr>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Редактировать</th>
                                    <th>Удалить</th>
                                </tr>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['description'], ENT_QUOTES); ?></td>
                                        <td><a href="/admin/editnew/<?=$val['id']?>" class="btn btn-primary">Редактировать</a></td>
                                        <td><a href="/admin/delete/news/<?=$val['id']?>"  class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>