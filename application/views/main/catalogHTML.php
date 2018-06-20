<?php top('Главная');?>
<script>
   function imgchange()
   {
    var elem;
    var elemP = document.getElementsByClassName('active')[0];
    elemP.classList.toggle('active');
     var color = document.querySelector('[name="color"]:checked').value
         srcAll = {'1' : 'color1', '2' : 'color2', '3': 'color3'};
         elem = document.getElementById(srcAll[color]);
         elem.classList.toggle('active');
   };

</script>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section class="single_item">
        <h1 class="red">Lorem</h1>
        <img class="items active" id="color1" src="/assets/img/test.jpg" alt="">
        <img class="items" id="color2" src="/assets/img/test.jpg" alt="">
        <img class="items" id="color3" src="/assets/img/test.jpg" alt="">
          <div class="row">
            <div class="col-md-4">
            <h4>Детали проекта</h4>
            <ul class="project_details">
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Артикул:</span><span id="desc_val">125123123</span></li>
                <li><span id="desc"><i class="fa fa-pencil" aria-hidden="true"></i> Цвет:</span><span id="desc_val">red</span></li>
                <li><span id="desc"><i class="fa fa-window-maximize" aria-hidden="true"></i> Материал:</span><span id="desc_val">ddood</span></li>
                <li><span id="desc"><i class="fa fa-link" aria-hidden="true"></i> Размер:</span><span id="desc_val">2800*200*54 мм</span></li>
                <li><span id="desc"><i class="fa fa-arrow-down" aria-hidden="true"></i> Скачать:</span><span id="desc_val"><a href="" download>Link</a></span></li>
                <form action="/" method="POST" name="s_form" onchange="imgchange()">
                <li><span id="desc">
                    <label><input type="radio" name="color" value="1">Цвет1</label>
                </span></li>
                <li><span id="desc">
                    <label><input type="radio" name="color" value="2">Цвет2</label>
                </span></li>
                <li><span id="desc">
                    <label><input type="radio" name="color" value="3">Цвет3</label>
                </span></li>
                </form>
            </ul>
        </div>
          <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.</p>
          </div>
        </div>
        
        <div class="blueprint">
          <h3>Черчежи</h3>
          <div class="col-md-6"><img src="/assets/img/test.jpg" alt=""></div>
          <div class="col-md-6"><img src="/assets/img/test.jpg" alt=""></div>
          <div class="col-md-6"><img src="/assets/img/test.jpg" alt=""></div>
        </div>
      </section>
    </div>
    <div class="col-md-3">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure suscipit sit reiciendis porro, excepturi repudiandae cupiditate voluptas laboriosam voluptatem quisquam impedit modi veniam necessitatibus id beatae repellat sapiente sed, magnam.
    </div>
  </div>
</div>
<?php bottom();?>