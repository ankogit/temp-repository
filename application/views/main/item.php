<script>
   function imgchange() {
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
        <h1 class="red"><?=$title?></h1>
        <img src="/public/<?=$mass_img[0][0]?>" class="items active" id="color1" alt="">
		<?php if (!empty($mass_img[1][0])) { ?>
        <img src="/public/<?=$mass_img[1][0]?>" class="items" id="color2" alt="">
		<? } ?>
		<?php if (!empty($mass_img[2][0])) { ?>
        <img src="/public/<?=$mass_img[2][0]?>" class="items" id="color3" alt="">
		<? } ?>
          <div class="row">
              <div class="col-md-8">
                <p><?=$description?></p>
              </div>
          </div>
        <div class="visible-sm">
        <h4>Детали проекта</h4>
        <ul class="project_details">
            <?php if (!empty($material)){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Материал</span><span id="desc_val"><?=$material?></span></li>
            <?php } ?>
            
            <?php if ($oldPrice){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Цена</span><span id="desc_val"><?=$oldPrice?>₽</span></li>
            <?php } ?>
            
            <?php if ($newPrice){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Цена по скидке</span><span id="desc_val" style="color:#e74c3c;"><?=$newPrice?>₽</span></li>
            <?php } ?>
            
                <?php if(!empty($mass_color)) { ?><li><span id="desc"><i class="fa fa-pencil" aria-hidden="true"></i>Цвета:</span><span id="desc_val"></span></li><? } ?>
                                <!--<li><span id="desc"><i class="fa fa-link" aria-hidden="true"></i> Размер:</span><span id="desc_val">2800*200*54 мм</span></li>
                <li><span id="desc"><i class="fa fa-arrow-down" aria-hidden="true"></i> Скачать:</span><span id="desc_val"><a href="" download>Link</a></span></li>-->
                <form action="/" method="POST" name="s_form" onchange="imgchange()">
                <?php
                if(!empty($mass_color[0])){
                    ?>
                <label class="btn-change_color">
              <input type="radio" name="color" value="1">
              <span class="checkmark"><?=$mass_color[0]?></span>
        </label>
                <?php }?>
                
                 <?php
                if(!empty($mass_color[1])){
                    ?>
                <label class="btn-change_color">
              <input type="radio" name="color" value="2">
              <span class="checkmark"><?=$mass_color[1]?></span>
        </label>
                <?php }?>
                
                 <?php
                if(!empty($mass_color[2])){
                    ?>
                <label class="btn-change_color">
                    <input type="radio" name="color" value="3">
                    <span class="checkmark"><?=$mass_color[2]?></span>
        <label>
                <?php }?>
                </form>
        </ul>
        </div>
        <?php if (!empty($mass_drawings)){ ?>
		<div class="blueprint">
          <h3>Чертежи</h3>
          <div class="row">
    		  <?php foreach ($mass_drawings as $drawing): ?>
    		  <div class="col-md-6 col-sm-6"><img src="/public/<?=$drawing?>" alt=""></div>
    		  <?php endforeach; ?>
           </div>
        </div>
		<?php } ?>
		
      </section>
    </div>
    <div class="col-md-3">
        <div class="hidden-sm">
    	<h4>Детали проекта</h4>
    	<ul class="project_details">
			<?php if (!empty($material)){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Материал</span><span id="desc_val"><?=$material?></span></li>
			<?php } ?>
			
			<?php if ($oldPrice){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Цена</span><span id="desc_val"><?=$oldPrice?>₽</span></li>
			<?php } ?>
			
			<?php if ($newPrice){ ?>
                <li><span id="desc"><i class="fa fa-calendar" aria-hidden="true"></i> Цена по скидке</span><span id="desc_val" style="color:#e74c3c;"><?=$newPrice?>₽</span></li>
			<?php } ?>
			
                <?php if(!empty($mass_color)) { ?><li><span id="desc"><i class="fa fa-pencil" aria-hidden="true"></i>Цвета:</span><span id="desc_val"></span></li><? } ?>
                                <!--<li><span id="desc"><i class="fa fa-link" aria-hidden="true"></i> Размер:</span><span id="desc_val">2800*200*54 мм</span></li>
                <li><span id="desc"><i class="fa fa-arrow-down" aria-hidden="true"></i> Скачать:</span><span id="desc_val"><a href="" download>Link</a></span></li>-->
                <form action="/" method="POST" name="s_form" onchange="imgchange()">
                <?php
				if(!empty($mass_color[0])){
					?>
				<label class="btn-change_color">
              <input type="radio" name="color" value="1">
              <span class="checkmark"><?=$mass_color[0]?></span>
        </label>
				<?php }?>
				
				 <?php
				if(!empty($mass_color[1])){
					?>
				<label class="btn-change_color">
              <input type="radio" name="color" value="2">
              <span class="checkmark"><?=$mass_color[1]?></span>
        </label>
				<?php }?>
				
				 <?php
				if(!empty($mass_color[2])){
					?>
				<label class="btn-change_color">
                    <input type="radio" name="color" value="3">
                    <span class="checkmark"><?=$mass_color[2]?></span>
        <label>
				<?php }?>
                </form>
		</ul>
        </div>
				<div class="sidebar-nav">
                  <ul class="treeMenu">
                    <? foreach ($Categories as $treeMain => $tree) : ?>
					<? if (is_array($tree)) { ?>
                    <li class="tree"><a href="#"><?=$tree['name']?></a>
					<? array_pop($tree)?>
						<ul>
							<? foreach ($tree as $category=>$categoryText) : ?>
							<li><a href="/catalog/<?=$category?>"><?=$categoryText?></a></li>
							<? endforeach; ?>
						</ul>
					</li>
					<? } else {?>
						<li class="noTree"><a href="/catalog/<?=$treeMain?>"><?=$tree?></a>
					<? } ?>
                    <? endforeach; ?>
				  </ul>
			   </div>
               <br>
        </div>
    </div>
  </div>
</div>
