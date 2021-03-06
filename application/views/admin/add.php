<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/add" method = "post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="sel1">Категория:</label>
                              <select class="form-control" id="sel1" name="category">
                                <?php foreach ($categories as $category => $value) :?>
                                <option value="<?=$category?>"><?=$value?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
							<div class="form-group">
                                <label>Материал</label>
                                <input class="form-control" type="text" name="material">
                            </div>
							<div class="form-group">
                                <label>Цвет 1(Главное изображение)</label>
                                <input class="form-control" type="text" name="color1text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="img">
                            </div>
							<div class="form-group">
                                <label>Цвет 2</label>
                                <input class="form-control" type="text" name="color2text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="color2img">
                            </div>
							<div class="form-group">
                                <label>Цвет 3</label>
                                <input class="form-control" type="text" name="color3text">
								<input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="color3img">
                            </div>
							<div class="form-group">
                                <label>Чертежи</label>
                                <input class="form-control" multiple name = "photos[]" accept=".png, .jpg, .jpeg" type = "file" >
                            </div>
							<div class="form-group">
                                <label>Цена без скидки</label>
                                <input class="form-control" type="text" name="oldPrice">
                            </div>
							<div class="form-group">
                                <label>Цена со скидкой</label>
                                <input class="form-control" type="text" name="newPrice">
                            </div>
							
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>