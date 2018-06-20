<h1 class="sharesHeader">Акции</h1>
<div class="sharesContainer">
<?foreach ($shares_items as $data) : ?>
 <?foreach ($data as $single_shares_item) : ?>
	<div class="col-lg-4">
		<a href="/item/<?=$single_shares_item['category']?>/id/<?=$single_shares_item['id']?>">
			<div class="item sharesItem">
				<img src="/public/<?=$single_shares_item['c1_img1']?>" alt="" class="" > 
					<div class="desc">
						<h3><?=$single_shares_item['title']?></h3>
						<p class="descSharesItem"><?=$single_shares_item['description']?>
						</p>
						<div class="priceSharesProduct">
						<div class="row sharesRow">
							<div class="oldPrice col-3"><?=$single_shares_item['old_price']?>₽</div>
							<div class="newPrice col-3"><?=$single_shares_item['new_price']?>₽</div>
							<div class="moreInfo col-6">Подробнее</div>
						</div>
						</div>
					</div>
			</div>
		</a>
		
	</div>
  <? endforeach; ?>
<? endforeach; ?>
	






</div>