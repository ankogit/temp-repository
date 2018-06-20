
    <!--<section class="place_for_slider">
       
    <div id="slider">
        <div id="Banner4" class="single_slide" ></div>
        <div id="Banner1" class="single_slide" ></div>
        <div id="Banner2" class="single_slide" ></div>
        <div id="Banner3" class="single_slide" ></div>

    </div>



    <ul id="nab">
      <li class="navpred"><a style="position:absolute; left:1%; top:36%;"><img class="str" src="http://ufgel.ru/images/left.png"> </a> </li>
      <li class="navposl"><a style="position:absolute; right:1%; top:36%;"><img class="str" src="http://ufgel.ru/images/right.png"> </a> </li>
    </ul>
  
<div class="navigation"></div>

    </section>-->
   <section class="banner">
    <section class="top-baner" data-current="0">
    <div class="slide"></div>
<div class="slide"></div>
<div class="slide"></div>
        <!--<div class="container my-auto">
            <h1>Тихий Дон</h1>
            <hr class="style-seven">
			<p>
            <span class="text_cont_inner"></span>
			<span class="flash">|</span>
			</p>
            <br>
            <a href="#newitems">Товары</a>
        </div>-->
    </section>
        <div class="leftTriangle"></div>
        <div class="rightTriangle"></div>
</section>
	<div class="container my-auto">
 <h1>Тихий Дон</h1>
            <hr class="style-seven">
			<p>
            <span class="text_cont_inner"></span>
			<span class="flash">|</span>
			</p>
            <br>
            <a href="/catalog">Товары</a>
        </div>


    <!--<section class="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="line_menu">
                        <a href="" id="active">Гостинные</a>
                        <a href="">Диваны</a>
                        <a href="">Столы</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <div class="container" id="newitems">
        <div class="row">
            <div class="col-md-3">
                <a href="/item/<?=$category[0]?>/id/<?=$index_items[0][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?= $index_items[0][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[0][0]['title'] ?></h3>
                            <p><?=$index_items[0][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/item/<?=$category[1]?>/id/<?=$index_items[1][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?=$index_items[1][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[1][0]['title'] ?></h3>
                            <p><?=$index_items[1][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/item/<?=$category[2]?>/id/<?=$index_items[2][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?=$index_items[2][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[2][0]['title'] ?></h3>
                            <p><?=$index_items[2][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="/item/<?=$category[3]?>/id/<?=$index_items[3][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?=$index_items[3][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[3][0]['title'] ?></h3>
                            <p><?=$index_items[3][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="/item/<?=$category[4]?>/id/<?=$index_items[4][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?=$index_items[4][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[4][0]['title'] ?></h3>
                            <p><?=$index_items[4][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="/item/<?=$category[5]?>/id/<?=$index_items[5][0]['id']?>">
                    <div class="item">
                        <img src="/public/<?=$index_items[5][0]['c1_img1'] ?>" alt="">
                        <div class="desc">
                            <h3><?=$index_items[5][0]['title'] ?></h3>
                            <p><?=$index_items[5][0]['description'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="content_line"><h1>ТИХИЙ ДОН</h1></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="red"><?=$front[0]['advHead']?></h2>
                <p><?=$front[0]['advMain']?></p>
            </div>
            <div class="col-md-3 whywel">
                <h3><?=$front[0]['whyHead']?></h3>
                <ul class="lists">
                    <li class="arrow_red"><?=$front[0]['whyFirst']?></li>
                    <li class="arrow_red"><?=$front[0]['whySecond']?></li>
                    <li class="arrow_red"><?=$front[0]['whyThird']?></li>
                    <li class="arrow_red"><?=$front[0]['whyFourth']?></li>
                </ul>
            </div>
            <div class="col-md-6 whywem">
                <br><p><?=$front[0]['whyMain']?></p>
            </div>
            <div class="col-md-3 whywer">
                <h3><?=$front[0]['guaHead']?></h3>
                <p><?=$front[0]['guaMain']?></p>
            </div>
        </div>
    </div>

<section class="contact">
    <div class="margin_block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_box inLeft">
                        <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <h2>Новости</h2>
                        <p><?=$front[0]['news']?></p>
                        <a href="/news"><button class="submit">Перейти</button></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_box inUp">
                        <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <h2>Акции</h2>
                        <p><?=$front[0]['shares']?></p>
                        <a href="/shares"><button class="submit">Перейти</button></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_box inDown">
                        <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <h2>Каталог</h2>
                        <p><?=$front[0]['catalog']?></p>
                        <a href="/catalog/all"><button class="submit">Перейти</button></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_box inRight">
                        <div class="icon icolor_v1"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <h2>Доставка</h2>
                        <p><?=$front[0]['delivery']?></p>
                        <a href="/delivery"><button class="submit">Перейти</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
















<!--
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="container">
                        <div class="row">
                            <div class="item col-md-4">
                                <img src="/assets/img/test.jpg" alt="">
                                <a href="">
                                    <div class="desc">
                                        <h3>Some text</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis beatae nihil officia impedit quidem labore, sit quam.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                            <div class="item col-md-4">
                                ITEM
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    LEFT SIDE MENU
                </div>
            </div>
        </div>
-->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2710.167927947281!2d38.91559821549385!3d47.21329642305747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e3fd43d694b49f%3A0x292509419e30438c!2z0YPQuy4g0KfQtdGF0L7QstCwLCAxMTIsINCi0LDQs9Cw0L3RgNC-0LMsINCg0L7RgdGC0L7QstGB0LrQsNGPINC-0LHQuy4sIDM0NzkzNQ!5e0!3m2!1sru!2sru!4v1518351826603" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>


