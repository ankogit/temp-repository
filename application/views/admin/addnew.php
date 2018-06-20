<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/addnew" method = "post" enctype="multipart/form-data">                  
                            <div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
							<div class="form-group">
                                <label>Изображение</label>
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="newsImg">
                            </div>

							
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>