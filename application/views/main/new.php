<?php
include('db_fns.php'); //подключение файла с функциями
db_connect(); //подключение к бд
$All_products=GetAllProducts();
	$Categories =  array("angular","bedrooms","cabinets","chair_bed","children_sofas","children_room","hallways","journal_table","living_rooms","modular_sofas", "office_furniture", "cabinets_victory","small_sized","sofas_beds","tv_curbstones");
	for ($i=0; $i<count($Categories); $i++) {
		$counter=0;
		$category=$Categories[$i];
    	foreach ($All_products[$category] as $single_product):
		if ($counter==6) break;
    	echo '
    	<div class="col-md-3">
            <a href="item/'.$category.'/id/'.$single_product['id'].'">
                <div class="item">
                   <img src="../'.$single_product["c1_img1"].' ">
            	    <div class="desc">
            			<h3>'.$single_product["title"].'</h3>
            			<p>'.$single_product["description"].'</p>
            		</div>
                </div>
            </a>
    	</div>';
		$counter++;
    	endforeach;
    }
	?>