<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class MainController extends Controller {

    public function indexAction() {
        $result = $this->model->getNews();
        $Categories = require 'application/config/categories.php';
        $counter = 0;
        foreach ($Categories as $cat => $value):
            $category[$counter] = $cat;
            $counter++;
            if ($counter == 6) break;
        endforeach;
		
		$front = $this->model->getFront();

            
        for ($i=0;$i<6;$i++){
            $index_items[$i]=$this->model->getLastSingleProduct($category[$i]);
        }
        
    
        
        $vars = [
            'news' => $result,
            'index_items' => $index_items,
            'category' => $category,
			'front' => $front,
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function sendmsgAction() {
    	if (!empty($_POST)){
    		if($this->model->sendFeedBack($_POST)){
    			$this->view->message('Успешно', 'Письмо отправлено. ');
    		}
    		else {
    			$this->view->message('Ошибка', 'Пожалуйста, введите все данные.');
    		}
    	}
    	else{
    		$this->view->message('Ошибка', 'Пожалуйста, введите все данные. ');
    	}

    }

    public function searchAction() {
        /*if (!empty($_POST)) {
            if (!$this->model->contactValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            //mail('titef@p33.org', 'Сообщение из блога', $_POST['name'].'|'.$_POST['email'].'|'.$_POST['text']);
            $this->view->message('success', 'Сообщение отправлено ');
        } else {
            $this->view->message('success', 'Сообщение не отправлено ');
        }
        $this->view->render('Поиск');*/
        $this->route['category'] = 'all';
        $output = '';
        if(isset($_POST["query"])) {
            $search = nl2br(htmlspecialchars(trim($_POST["query"]), ENT_QUOTES), false);

            $result = $this->model->searchAllProducts($this->route, $search);
        }

        if(!empty($result)) {
            
            foreach ($result as $data) {
                foreach ($data as $data2) {
                //debug($data2);
                $output .= '
                <div class="res">
                <a href="/item/'.$data2['category'].'/id/'.$data2['id'].'">
                    <div class="row">
                        <div class="col-3"><h3>'.$data2['title'].'</h3></div>
                        <div class="col-9 hidden-xs-down"><p>'.$data2['description'].'</p></div>
                    </div>
                </a>
                </div>
                <hr>
                ';
                }
            }
            echo $output;
        }
        else {
            echo '<div class="res">Ничего не найдено</div>';
        }

    }

    public function adAction() {
        echo "Страница рекламы";
    }

    public function aboutAction() {
        $this->view->render('О нас');
    }

    public function deliveryAction() {
        $this->view->render('Доставка');
    }
	
	public function sharesAction() {
		$result = $this -> model -> getAllSharesProducts();
		$vars = [
		'shares_items' => $result,
		];
		$this->view->render('Акции', $vars);
		
	}
	
	public function newsAction() {
		$result = $this -> model -> getAllNews();
		$vars = [
		'news' => $result,
		];
		$this->view->render('Новости', $vars);
	}
	
	public function noveltyAction() {
		$id=$this->route['id'];
		$result = $this -> model -> getNew($id);
		$vars = [
		'new' => $result,
		'id' => $id,
		];
		$this->view->render('Новость', $vars);
	}

    public function catalogAction() {
        if(!isset($this->route['category'])) $this->route['category'] = 'all';
        if($this->route['category'] == 'all') {
            $result = $this->model->getAllProducts($this->route);
            $countPost = $this->model->postsCountAll();
        } else {
            $result = $this->model->getProducts($this->route['category'], $this->route, 1);
            $countPost = $this->model->postsCount($this->route['category']);
        }

        $pagination = new Pagination($this->route, $countPost, 9);
        //$result = $this->model->getProducts($this->route['category']);

        $Categories = require 'application/config/categoriesMenu.php';
        $CategoriesTo = require 'application/config/categories.php';
        $header = ($this->route['category'] == 'all') ? 'Каталог' : $CategoriesTo[$this->route['category']];
        //debug($pagination->get());
        $vars = [
        	'header' => $header,
            'catalog' => $result,
            'Categories' => $Categories,
            'pagination' => $pagination->get(),
        ];
        $this->view->render('category страница', $vars);
    }

    public function itemAction() {
    	$id=$this->route['id'];
    	$zero=0;
    	$module=$this->route['category'];
    	$single_product=$this->model->getSingleProduct($module,$id);
        if(empty($single_product)) $this->view->errorCode(404);
    	$title = $single_product[$zero]['title']; //название
    	$description = $single_product[$zero]['description']; //описание
		$oldPrice = $single_product[$zero]['old_price'];
		$newPrice = $single_product[$zero]['new_price'];
        $mass_color=array();
        if (!empty($single_product[$zero]['color_1'])) $mass_color[0]=$single_product[$zero]['color_1']; //первый цвет товара
        if (!empty($single_product[$zero]['color_2'])) $mass_color[1]=$single_product[$zero]['color_2'];//второй цвет(если есть)
        if (!empty($single_product[$zero]['color_3'])) $mass_color[2]=$single_product[$zero]['color_3'];//третий цвет(если есть)
        if (!empty($single_product[$zero]['material'])) $material=$single_product[$zero]['material']; else $material=false; //материал, из которого сделан товар
        $mass_img=array();
        $mass_img[0][0]=$single_product[$zero]['c1_img1']; //ссылка на Цвет1 Картинка1. Вид ссылки : 'images/shkaf10/c1_img1.jpg'
        if (!empty($single_product[$zero]['c1_img2'])) $mass_img[0][1]=$single_product[$zero]['c1_img2']; //ссылка на Цвет1 Картинка2
        if (!empty($single_product[$zero]['c2_img1'])) $mass_img[1][0]= $single_product[$zero]['c2_img1'];
        if (!empty($single_product[$zero]['c2_img2'])) $mass_img[1][1]= $single_product[$zero]['c2_img2'];
        if (!empty($single_product[$zero]['c3_img1'])) $mass_img[2][0]= $single_product[$zero]['c3_img1'];
        if (!empty($single_product[$zero]['c3_img2'])) $mass_img[2][1]= $single_product[$zero]['c3_img2'];
        $mass_drawings=array();
        $counter=0;
        //ссылки на чертежи вида : 'images/shkaf10/drawing_1.jpg'
        for ($i=1;$i<=15;$i++){
            $drawing='drawing_'.$i;
            if (!empty($single_product[$zero][$drawing])) {
              $mass_drawings[$counter]=$single_product[$zero][$drawing];
              $counter++;
            }
            else break;
        }

        $Categories = require 'application/config/categoriesMenu.php';
   
        $vars = [
			'description' => $description,
            'mass_drawings' => $mass_drawings,
            'title' => $title,
			'mass_color' => $mass_color,
			'mass_img' => $mass_img,
			'material' => $material,
			'mass_drawings' => $mass_drawings,
			'Categories' => $Categories,
			'oldPrice' => $oldPrice,
			'newPrice' => $newPrice,
        ];
        $this->view->render('item страница', $vars);
    }


}