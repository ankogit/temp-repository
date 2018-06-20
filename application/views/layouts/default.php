<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="ru"> 
<!--<![endif]-->

<head>

    <meta charset="utf-8">

    <title><?php echo $title; ?></title>
    <meta name="description" content="">

    <!--<link rel="shortcut icon" href="/public/img/favicon/favicon_0.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-touch-icon-114x114.png">-->

    <link rel="shortcut icon" href="/public/img/favicon/favicon_1.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/img/favicon/apple-touch-icon-114x114.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="/public/libs/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/public/libs/animate/animate.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/css/fonts.css">
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/media.css">

    <script src="https://use.fontawesome.com/c40b7447b3.js"></script>
    <script src="/public/libs/modernizr/modernizr.js"></script>


        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		<script type="text/javascript" src="//yandex.st/jquery/1.9.1/jquery.min.js"></script>
        <script src="/public/js/delivery.js" type="text/javascript"></script>
</head>



<body>

<div id="app">
    <!--<header>
        <div class="headline">
            <div class="container-fluid">
                <p><i class="fa fa-phone"></i> Офис: 8 (988) 535-27-67  <i class="fa fa-envelope"></i> mebel-tag@mail.ru <i class="fa fa-map-marker"></i> г. Таганрог, Чехова 112 </p>
            </div>
        </div>
        <div class="header_menu">
            
            <ul id="top_menu">
                <div id="logo_top_menu"><img src="/public/img/logo_ver8465.png" alt="logo"></div>
                <a href="/"><li>Главная</li></a>
                <a href="/catalog/all"><li>Каталог</li></a>
                <a href="/delivery"><li>Заказ</li></a>
                <a href="/about"><li>О нас</li></a>
            </ul>
        </div>
    </header>-->
    <header>
        <button @click="showSlide = !showSlide">
            <i class="ion-md-menu"></i>
        </button>
        <p><i class="fa fa-phone"></i> <?=$footer[0]['phoneText']?>  <i class="fa fa-envelope"></i> <?=$footer[0]['sectionsThird']?> <i class="fa fa-map-marker"></i> <?=$footer[0]['sectionsFirst']?> </p>
        <button class="header-search-b1" @click="showSearch = !showSearch">
                <i class="ion-md-search"></i>
        </button>
        <div class="header-search" v-show="showSearch">
            <!--<form action="/search" method="post">-->
                <div class="input-group">
                    <span class="input-group-addon">Поиск</span>
                    <input type="search" name="search_text" id="search_text" placeholder="Ведите артикул или название товара..." class="form-control">
                </div>
            <!--</form>-->
            <button class="header-search-b2" @click="showSearch = !showSearch">
                <i class="ion-close"></i>
            </button>
            
            <div id="result-search">qweqweqwe</div>
        </div>
        
    </header>
    <transition name="slide">
        <aside v-show="showSlide">
        <ul>
            <li><a href="/"><i class="ion-md-home"></i> Главная</a></li>
            <li><a href="/catalog/all"><i class="ion-md-list-box"></i> Каталог</a></li>
			<li><a href="/shares"><i class="ion-md-pricetags"></i> Акции</a></li>
            <li><a href="/delivery"><i class="ion-md-basket"></i> Заказ</a></li>
            <li><a href="/news"><i class="ion-md-paper"></i> Новости</a></li>
        </ul>
        </aside>
    </transition>

</div>

        <section class="main">
        <?php echo $content; ?>
        </section>

    <footer>
        <div class="footer_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <!--<div class="footer_logo"></div>-->
                        <h1 class="white"><?=$footer[0]['header']?></h1>

                        <h2 class="white"><?=$footer[0]['desc']?></h2>

                        <!-- <h3><?=$footer[0]['contactsHead']?></h3>

                        <h3><?=$footer[0]['phoneHead']?></h3>

                        <h3 class="red"><?=$footer[0]['phoneText']?></h3> -->
                    </div>
                    <div class="col-md-5">
                        <div class="feedback">
                            <h2 class="white"><?=$footer[0]['feedBack']?></h2>
                            <div class="row">
                                <div class="col-md-6"><input class="name" type="text" placeholder="Имя..."></div>
                                <div class="col-md-6"><input class="phone" type="text" placeholder="Телефон..."></div>
                                <div class="col-md-12"><textarea class="order" placeholder="Заказ..."></textarea><br><button class="send">Отправить</button></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h2 class="white"><!-- <?=$footer[0]['sectionsHead']?> -->Контакты:</h2>
                        <ul class="lists">
                            <li class="arrow_red">Адрес: <a href="/"><?=$footer[0]['sectionsFirst']?></a></li>
                            <li class="arrow_red">Телефон: <a href="/"><?=$footer[0]['phoneText']?></a></li>
                           <!-- <li class="arrow_red"><a href="/">+7 (8634) 647-926</a></li> -->
                            <li class="arrow_red">E-mail: <a href="/"><?=$footer[0]['sectionsThird']?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom_line">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 hidden-sm">
                        © 2018 created by <a href="http://ionerednew.ru/">ionerednew</a> & <a href="https://mandarinshow.ru">anko</a>
                    </div>
                    <div class="col-md-6">
                        <div class="footer_menu">
                            <a href="/">Главная</a>
                            <a href="/catalog">Каталог</a>
                            <a href="/delivery">Заказ</a>
                            <a href="/news">Новости</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="hidden"></div>

    <div class="loader">
        <div class="loader_inner"></div>
    </div>



    <!--[if lt IE 9]>
    <script src="/assets/libs/html5shiv/es5-shim.min.js"></script>
    <script src="/assets/libs/html5shiv/html5shiv.min.js"></script>
    <script src="/assets/libs/html5shiv/html5shiv-printshiv.min.js"></script>
    <script src="/assets/libs/respond/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<script type="text/javascript" src="/public/js/menu.js"></script>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>

    <script src="/public/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="/public/js/form.js"></script>
    <script src="/public/libs/waypoints/waypoints.js"></script>
    <script src="/public/libs/animate/animate-css.js"></script>
    <script src="/public/libs/plugins-scroll/plugins-scroll.js"></script>

    <script src="/public/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/public/libs/imagefill/jquery-imagefill.js"></script>
    <script src="/public/libs/masonry/masonry.pkgd.min.js"></script>

    <script src="/public/js/common.js"></script>
    <script src="/public/js/text_writing.js"></script>
    <script src="/public/js/myslider.js"></script>



    <script>
    $(document).ready(function(){
        load_data();
        function load_data(query){
            $.ajax({
                url:"/search",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result-search').html(data);
                }
            });
        }
        
        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '') {
                load_data(search);
            }
            else {
                load_data();
            }
        });
    });
    </script>


    <script>
        new Vue({
            el: "#app",
            data: {
                showSlide: false,
                showSearch: false,
            }
        })
    </script>
</body>
</html>