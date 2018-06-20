<?php
namespace application\models;
use application\core\Model;
use Imagick;
class Admin extends Model {
    public $error;
    public function loginValidate($post) {
        $config = require 'application/config/admin.php';
        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }
    public function postValidate($post, $files, $type) {
        $nameLen = iconv_strlen($post['title']);
        $descriptionLen = iconv_strlen($post['description']);
        if ($nameLen < 3 or $nameLen > 100) {
            $this->error = 'Название должно содержать от 3 до 100 символов';
            return false;
        } elseif ($descriptionLen < 3 or $descriptionLen > 500) {
            $this->error = 'Описание должно содержать от 3 до 500 символов';
            return false;
        }
		if (count($_FILES['photos']['name'])>40 and $type == 'add') {
            $this->error = 'Максимум можно выбрать 40 чертежей';
            return false;
        }
        if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
            $this->error = 'Главное изображение не выбрано';
            return false;
        }
		 if (empty($post['color1text']) and $type == 'add') {
            $this->error = 'Цвет 1 не может быть пустым';
            return false;
        }
        return true;
    }

    public function editBannersImg(){
    	$succ = false;
		if (!empty($_FILES['banner1']['name'])){
			$imgName = "img/banner1.png";
			move_uploaded_file($_FILES['banner1']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE banner SET banner1 = "'.$imgName.' " WHERE id=1 '); 
			$succ = true;
		}
		if (!empty($_FILES['banner2']['name'])){
			$imgName = "img/banner2.png";
			move_uploaded_file($_FILES['banner2']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE banner SET banner2 = "'.$imgName.' " WHERE id=1 '); 
			$succ = true;
		}
		if (!empty($_FILES['banner3']['name'])){
			$imgName = "img/banner3.png";
			move_uploaded_file($_FILES['banner3']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE banner SET banner3 = "'.$imgName.' " WHERE id=1 '); 
			$succ = true;
		}
		return  $succ;
    }
	
	public function newsValidate($post){
		if(!empty($post['title']) && !empty($post['description'])){
			return true;
		}
		else return false;
	}
	
	public function getNew($id) {
		  $result = $this->db->row("SELECT * FROM news WHERE id = '$id' ");
		  return $result;
	}
	
	public function newEdit($post,$id){
		$params = [
            'id' => $id,
            'title' => $post['title'],
            'description' => $post['description'],
        ];
		 $this->db->query('UPDATE news SET title = :title, description = :description WHERE id = :id', $params);
		 
		 if (!empty($_FILES['newsImg']['name'])){
			$imgName = "images/news/new_".$id.".png";
			if(file_exists("public/".$imgName)){
				unlink("public/".$imgName);
			}
			move_uploaded_file($_FILES['newsImg']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE news SET img = "'.$imgName.'"  WHERE id = '.$id); 
		}
	}
	
	public function newsAdd($post) {
		$params = [
            'id' => '',
            'title' => $post['title'],
            'description' => $post['description'],
        ];
		$this->db->query('INSERT INTO news (id, title, description) VALUES (:id, :title, :description)', $params);
		 $id = $this->db->lastInsertId();
		if (!empty($_FILES['newsImg']['name'])){
			$imgName = "images/news/new_".$id.".png";
			move_uploaded_file($_FILES['newsImg']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE news SET img = "'.$imgName.'"  WHERE id = '.$id); 
		}
		return $id;
	}
	
    public function postAdd($post, $table) {
        $params = [
            'id' => '',
            'title' => $post['title'],
            'description' => $post['description'],
        ];
        $this->db->query('INSERT INTO '.$table.' (id, title, description) VALUES (:id, :title, :description)', $params);
        $id = $this->db->lastInsertId();
        $params = [
            'id' => $id,
            'c1_img1' => 'images/'.$table.$this->db->lastInsertId().'.jpg',
        ];
        $this->db->query('UPDATE '.$table.' SET c1_img1 = :c1_img1 WHERE id = :id', $params);
		
		if (!empty($post['material'])){
			$material = $post['material'];
			$this->db->query('UPDATE '.$table.' SET material = "'.$material.'" WHERE id = '.$id);
		}
		
		if (!empty($post['oldPrice'])){
			$oldPrice = $post['oldPrice'];
			$this->db->query('UPDATE '.$table.' SET old_price = "'.$oldPrice.'" WHERE id = '.$id);
		}
		
		if (!empty($post['newPrice'])){
			$newPrice = $post['newPrice'];
			$this->db->query('UPDATE '.$table.' SET new_price = "'.$newPrice.'"  WHERE id = '.$id); 
		}
		
		if (!empty($post['color1text'])){
			$color1text = $post['color1text'];
			$this->db->query('UPDATE '.$table.' SET color_1 = "'.$color1text.'"  WHERE id = '.$id); 
		}
		
		if (!empty($post['color2text']) && !empty($_FILES['color2img']['name'])){
			$color2text = $post['color2text'];
			$imgName = "images/second/c2_img1_".$table."_".$id.".png";
			move_uploaded_file($_FILES['color2img']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE '.$table.' SET color_2 = "'.$color2text.'"  WHERE id = '.$id); 
			$this->db->query('UPDATE '.$table.' SET c2_img1 = "'.$imgName.'"  WHERE id = '.$id); 
		}
		
		if (!empty($post['color3text']) && !empty($_FILES['color3img']['name'])){
			$color3text = $post['color3text'];
			$imgName = "images/third/c3_img1_".$table."_".$id.".png";
			move_uploaded_file($_FILES['color3img']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE '.$table.' SET color_3 = "'.$color3text.'"  WHERE id = '.$id); 
			$this->db->query('UPDATE '.$table.' SET c3_img1 = "'.$imgName.'"  WHERE id = '.$id); 
		}
        return $id;
    }
    public function postEdit($post, $id, $table) {
        $params = [
            'id' => $id,
            'title' => $post['title'],
            'description' => $post['description'],
			'material' => $post['material'],
			'old_price' => $post['oldPrice'],
			'new_price' => $post['newPrice'],
			'color_1' => $post['color1text'],
			'color_2' => $post['color2text'],
			'color_3' => $post['color3text'],
        ];
        $this->db->query('UPDATE '.$table.' SET title = :title, description = :description, material = :material, old_price = :old_price, new_price = :new_price, color_1 = :color_1, color_2 = :color_2, color_3 = :color_3 WHERE id = :id', $params);
		
		if (!empty($_FILES['color2img']['name'])){
			$imgName = "images/second/c2_img1_".$table."_".$id.".png";
			if(file_exists("public/".$imgName)){
				unlink("public/".$imgName);
			}
			move_uploaded_file($_FILES['color2img']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE '.$table.' SET c2_img1 = "'.$imgName.'"  WHERE id = '.$id); 
		}
		
		if (!empty($_FILES['color3img']['name'])){
			$imgName = "images/third/c3_img1_".$table."_".$id.".png";
			if(file_exists("public/".$imgName)){
				unlink("public/".$imgName);
			}
			move_uploaded_file($_FILES['color3img']['tmp_name'],"public/".$imgName);
			$this->db->query('UPDATE '.$table.' SET c3_img1 = "'.$imgName.'"  WHERE id = '.$id); 
		}
		$this->postEditDrawings($table, $id);
    }
    public function postInfo($post) {
        $id = 0;
        $params = [
            'id' => $id,
            'header' => $post['header'],
            'descr' => $post['desc'],
            'phoneText' => $post['phoneText'],
            'sectionsFirst' => $post['sectionsFirst'],
            'sectionsThird' => $post['sectionsThird'],
        ];
        $this->db->query('UPDATE footer SET header = :header, `desc` = :descr, phoneText = :phoneText, sectionsFirst = :sectionsFirst, sectionsThird = :sectionsThird WHERE id = :id', $params);
    }
    public function postEI($post) {
        $id = 0;
        $params = [
            'id' => $id,
            'advHead' => $post['advHead'],
            'advMain' => $post['advMain'],
            'whyHead' => $post['whyHead'],
            'whyFirst' => $post['whyFirst'],
            'whySecond' => $post['whySecond'],
            'whyThird' => $post['whyThird'],
            'whyFourth' => $post['whyFourth'],
            'whyMain' => $post['whyMain'],
            'guaHead' => $post['guaHead'],
            'guaMain' => $post['guaMain'],
            'news' => $post['news'],
            'shares' => $post['shares'],
            'catalog' => $post['catalog'],
            'delivery' => $post['delivery'],
        ];
        $this->db->query('UPDATE front SET advHead = :advHead, advMain = :advMain, whyHead = :whyHead, whyFirst = :whyFirst, whySecond = :whySecond, whyThird = :whyThird, whyFourth = :whyFourth, whyMain = :whyMain, guaHead = :guaHead, guaMain = :guaMain, news = :news, shares = :shares, catalog = :catalog, delivery = :delivery WHERE id = :id', $params);
    }
    public function postUploadImage($path, $id, $category) {
        $img = new Imagick($path);
        $img->cropThumbnailImage(1080, 600);
        $img->setImageCompressionQuality(80);
        $img->writeImage('public/images/'.$category.$id.'.jpg');
    }
	
	public function postUploadDrawings($category, $id) {
	 if (!empty($_FILES['photos']['name'][0])) {
			for ($i=0; $i<count($_FILES['photos']['name']); $i++){
				$imgName = "images/drawings/".$category."_".$id."_".($i+1).".png";
				if(file_exists("public/".$imgName)){
					unlink("public/".$imgName);
				}
				move_uploaded_file($_FILES['photos']['tmp_name'][$i],"public/".$imgName);
				$drawing = "drawing_".($i+1);
				$this->db->query('UPDATE '.$category.' SET '.$drawing.' = "'.$imgName.'"  WHERE id = '.$id); 
			}
     }
	}
	
	public function postEditDrawings($category, $id) {
	 if (!empty($_FILES['photos']['name'][0])) {
			for ($i=0; $i<count($_FILES['photos']['name']); $i++){
				$imgName = "images/drawings/".$category."_".$id."_".($i+1).".png";
				move_uploaded_file($_FILES['photos']['tmp_name'][$i],"public/".$imgName);
				$drawing = "drawing_".($i+1);
				$this->db->query('UPDATE '.$category.' SET '.$drawing.' = "'.$imgName.'"  WHERE id = '.$id); 
			}
     }
	}


    public function isPostExists($table, $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT * FROM '.$table.' WHERE id = :id', $params);
    }
    public function postDelete($id, $table) {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM '.$table.' WHERE id = :id', $params);
        if($table != 'news') unlink('public/images/'.$table.$id.'.jpg');
        else  unlink('public/images/news/new_'.$id.'.png');
    }
    public function postData($table, $id) {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM '.$table.' WHERE id = :id', $params);
    }
}