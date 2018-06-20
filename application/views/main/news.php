<h1 class="sharesHeader">Новости</h1>
<div class="sharesContainer">
<?foreach ($news as $single_new) : ?>
	<div class="col-lg-4">
		<a href="/novelty/singlenew/id/<?=$single_new['id']?>">
			<div class="item sharesItem">
				<img src="/public/<?=$single_new['img']?>" alt="" class="" > 
					<div class="desc">
						<h3><?=$single_new['title']?></h3>
						<p class="descSharesItem"><?=$single_new['description']?>
						</p>
						<div class="priceSharesProduct">
						<div class="row sharesRow">
							<div class="oldPrice col-3"></div>
							<div class="newPrice col-3"></div>
							<div class="moreInfo col-6">Подробнее</div>
						</div>
						</div>
					</div>
			</div>
		</a>
		
	</div>
<? endforeach; ?>
	






</div>