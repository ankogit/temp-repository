<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

	public function getNews() {
		$result = $this->db->row('SELECT title, description FROM news');
		return $result;
	}

	public function getMail() {
		 $result = $this->db->row('SELECT sectionsThird FROM footer WHERE id=0');
		 return $result[0]['sectionsThird'];
	}

    public function getProducts($category, $route, $isPag = 0, $max = 9) {
        if ($isPag) {
            $params = [
                'max' => $max,
                'start' => ((($route['page'] ?? 1) - 1) * $max),
            ];
            $result = $this->db->row('SELECT * FROM '.$category.' ORDER BY id DESC LIMIT :start, :max', $params);
        } else {
            $result = $this->db->row('SELECT * FROM '.$category.' ORDER BY id DESC');
        }
        for ($i=0; $i < count($result); $i++) { 
            $result[$i]['category'] = $category;
        }
        return $result;
    }

    public function sendFeedBack($post){
		$success=false;
		if (!empty($post['name']) && !empty($post['phone']) & !empty($post['order'])) {
			$name = $post['name'];
			$phone = $post['phone'];
			$order = $post['order'];
			$msg='От: '.$name.'.<br> Номер телефона: '.$phone.'.<br> Вопрос: '.$order; 
			$from_name="tikhiy-don15.ru";
			$from_mail="support@tikhiy-don15.ru";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= "From: ".$from_name." <".$from_mail."> \r\n";
			$headers .= "Content-type: text/html; charset=utf-8 \r\n";
			$to_mail = $this-> getMail();
	      if(mail($to_mail,'Обратная свявь',$msg, $headers)) $success=true;
		}

	return $success;
	}
	
	
	public function getAllNews() {
		  $result = $this->db->row('SELECT * FROM news ORDER BY id ASC');
		  return $result;
	}
	
	public function getNew($id) {
		  $result = $this->db->row("SELECT * FROM news WHERE id = '$id' ");
		  return $result;
	}
	
	
	public function getSharesProducts($category) {
		  $result = $this->db->row('SELECT * FROM '.$category.' WHERE new_price <> 0');
		  for ($i=0; $i < count($result); $i++) { 
            $result[$i]['category'] = $category;
		  }
          return $result;
	}
	
		
	
	
	public function getAllSharesProducts() {
		   $Categories = require 'application/config/categories.php';
			foreach ($Categories as $category => $value) :
				$CategoriesArray[]=$category;
			endforeach;
			$result=array();
        for ($i=0; $i<count($Categories); $i++) {
			if (!empty($this->getSharesProducts($CategoriesArray[$i]))) {
				$result[$CategoriesArray[$i]]= $this->getSharesProducts($CategoriesArray[$i]);
			}
        }
     return $result;
	}
	
	public function getFront() {
        $result = $this->db->row('SELECT * FROM front');
        return $result;
    }
	
	public function getFooter() {
        $result = $this->db->row('SELECT * FROM footer');
        return $result;
    }

    public function getSingleProduct($category, $id) {
        $result = $this->db->row('SELECT * FROM '.$category.' WHERE id = '.$id.'');
        return $result;
    }

    public function postsCount($table) {
        return $this->db->column('SELECT COUNT(id) FROM '.$table.'');
    }

    public function postsCountAll() {
        $Categories = require 'application/config/categories.php';
        foreach ($Categories as $category => $value) :
            $CategoriesArray[]=$category;
        endforeach;
        $result = 0;
        for ($i=0; $i<count($Categories); $i++) {
            $result += $this->postsCount($CategoriesArray[$i]);
        }
        return $result;
    }

    public function getAllProducts($route, $max = 9) {
        $Categories = require 'application/config/categories.php';
        foreach ($Categories as $category => $value) :
            $CategoriesArray[]=$category;
        endforeach;
        $result=array();
        for ($i=0; $i<count($Categories); $i++) {
            $result[$CategoriesArray[$i]]= $this->getProducts($CategoriesArray[$i], $route);
        }

        $i = 0;
        $j = 0;
        $countPost = $this->postsCountAll();
        $result2=array();
        do {
            foreach ($result as $category => $val){
                foreach ($val as $data) {
                    $j++;
                    if($j > ((($route['page'] ?? 1) - 1) * $max)){
                        //echo $j.'-'.$data['title'].'<br>';
                        if($i < $max) {
                            $category = $category;
                            $data['category'] = $category;
                            array_push($result2, $data);
                        } else break;
                        ++$i;
                        /*if(($i > $max)) {
                            break;
                        } else {
                            //echo $i.'-'.$data['title'].'<br>';
                            $category = $category;
                            $data['category'] = $category;
                            array_push($result2, $data);
                        }*/
                    }
                    
                }
            }
        } while (0);


        //debug($result2);

        return $result2;
    }


    public function searchProducts($category, $route, $search) {
        $result = $this->db->row("SELECT * FROM ".$category." WHERE title LIKE '%".$search."%'
            OR description LIKE '%".$search."%' 
            OR search LIKE '%".$search."%' 
            OR id LIKE '%".$search."%' 
            ");
        for ($i=0; $i < count($result); $i++) { 
            $result[$i]['category'] = $category;
        }
        return $result;
    }

    public function searchAllProducts($route, $search) {
        $Categories = require 'application/config/categories.php';
        foreach ($Categories as $category => $value) :
            $CategoriesArray[]=$category;
        endforeach;
        $result=array();
        for ($i=0; $i<count($Categories); $i++) {
            $search_query=array();
            $search_query = $this->searchProducts($CategoriesArray[$i], $route, $search);
            if(!empty($search_query)) $result[$CategoriesArray[$i]]= $search_query;
            
        }
/*
        $i = 0;
        $j = 0;
        $countPost = $this->postsCountAll();
        $result2=array();
        do {
            foreach ($result as $category => $val){
                foreach ($val as $data) {
                    if($j > ((($route['page'] ?? 1) - 1) * $max)){
                        //echo $j.'-'.$data['title'].'<br>';
                        ++$i;
                        if(($i > $max)) {
                            break;
                        } else {
                            //echo $i.'-'.$data['title'].'<br>';
                            $category = $category;
                            $data['category'] = $category;
                            array_push($result2, $data);
                        }
                    }
                    $j++;
                }
            }
        } while (0);

*/
        //debug($result2);

        return $result;
    }


    public function getLastSingleProduct($category) {
        $result = $this->db->row('SELECT * FROM '.$category.' WHERE id =(SELECT MAX(id) FROM '.$category.')'); 

        return $result;
    }
}