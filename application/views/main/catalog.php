<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1 class="sharesHeader"><?=$header?></h1>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-9">
        <div class="row">
        <?php foreach ($catalog as $data): ?>
          <div class="col-md-4">
                <a href="/item/<?=$data['category']?>/id/<?=$data['id']?>">
                    <div class="item">
                       <img src="/public/<?php echo $data['c1_img1']; ?>">
                        <div class="desc">
                        <h3><?php echo $data['title']; ?></h3>
                        <p><?php echo $data['description']; ?></p>
                        </div>
                    </div>
                </a>
          </div>
        <?php endforeach; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $pagination; ?>
                    <!--<ul class="pagination justify-content-center">
                        <li class="disabled"><a href="/123" class="prev">prev</a></li>
                        <li class="active"><a href="" >1</a></li>
                        <li class=""><a href="" class="swchItem">2</a></li>
                        <li class=""><a href="" class="swchItem">3</a></li>
                        <li class=""><a href="" class="next">next</a></li>
                    </ul>-->
                </div>
            </div>
        </div>
        </div>
    </div>
        <div class="col-md-3">
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
