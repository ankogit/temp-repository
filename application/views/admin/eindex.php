<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/admin/eindex" method="post" >
                        <div class="content_line"><h1>ТИХИЙ ДОН</h1></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="red"><br><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['advHead'], ENT_QUOTES); ?>" name="advHead"></h2>
                                    <p><textarea class="form-control" cols="30" rows="10" name="advMain"><?php echo htmlspecialchars($data['advMain'], ENT_QUOTES); ?></textarea></p>
                                </div>
                                <div class="col-md-3 whywel">
                                    <h3><br><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['whyHead'], ENT_QUOTES); ?>" name="whyHead"></h3>
                                    <ul class="lists">
                                        <li class="arro"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['whyFirst'], ENT_QUOTES); ?>" name="whyFirst"></li>
                                        <li class="arro"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['whySecond'], ENT_QUOTES); ?>" name="whySecond"></li>
                                        <li class="arro"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['whyThird'], ENT_QUOTES); ?>" name="whyThird"></li>
                                        <li class="arro"><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['whyFourth'], ENT_QUOTES); ?>" name="whyFourth"></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 whywem">
                                    <br><p><textarea class="form-control" cols="30" rows="10" name="whyMain"><?php echo htmlspecialchars($data['whyMain'], ENT_QUOTES); ?></textarea></p>
                                </div>
                                <div class="col-md-3 whywer">
                                    <h3><input class="form-control" type="text" value="<?php echo htmlspecialchars($data['guaHead'], ENT_QUOTES); ?>" name="guaHead"></h3>
                                    <p><textarea class="form-control" cols="30" rows="10" name="guaMain"><?php echo htmlspecialchars($data['guaMain'], ENT_QUOTES); ?></textarea></p>
                                </div>
                            </div>
                        </div>

                        <section class="contact">
                            <div class="margin_block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="info_box inLeft">
                                                <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                <h2>Новости</h2>
                                                <p><textarea class="form-control" cols="30" rows="10" name="news"><?php echo htmlspecialchars($data['news'], ENT_QUOTES); ?></textarea></p>
                                                <a href=""><button class="submit">Перейти</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="info_box inUp">
                                                <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                <h2>Акции</h2>
                                                <p><textarea class="form-control" cols="30" rows="10" name="shares"><?php echo htmlspecialchars($data['shares'], ENT_QUOTES); ?></textarea></p>
                                                <a href="/shares"><button class="submit">Перейти</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="info_box inDown">
                                                <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                <h2>Каталог</h2>
                                                <p><textarea class="form-control" cols="30" rows="10" name="catalog"><?php echo htmlspecialchars($data['catalog'], ENT_QUOTES); ?></textarea></p>
                                                <a href="/catalog/all"><button class="submit">Перейти</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="info_box inRight">
                                                <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                                <h2>Доставка</h2>
                                                <p><textarea class="form-control" cols="30" rows="10" name="delivery"><?php echo htmlspecialchars($data['delivery'], ENT_QUOTES); ?></textarea></p>
                                                <a href="/delivery"><button class="submit">Перейти</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                            <br><br>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>