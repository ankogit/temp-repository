<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/admin/info" method="post" >
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['header'], ENT_QUOTES); ?>" name="header">
                            </div>
                            <div class="form-group">
                                <label>Кратное описание</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['desc'], ENT_QUOTES); ?>" name="desc">
                            </div>
                            <div class="form-group">
                                <label>Телефон</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['phoneText'], ENT_QUOTES); ?>" name="phoneText">
                            </div>
                            <div class="form-group">
                                <label>Адрес</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['sectionsFirst'], ENT_QUOTES); ?>" name="sectionsFirst">
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['sectionsThird'], ENT_QUOTES); ?>" name="sectionsThird">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>