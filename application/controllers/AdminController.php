<?php
namespace application\controllers;
use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;
class AdminController extends Controller {
    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }
    public function loginAction() {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('/admin/add');
        }
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('/admin/add');
        }
        $this->view->render('Вход');
    }
	
	public function addnewAction(){
	 if (!empty($_POST)) {
		 if (!$this->model->newsValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->newsAdd($_POST);
            if (!$id) {
                $this->view->message('success', 'Ошибка обработки запроса');
            }
			$this->view->message('success', 'Пост добавлен');
	 }
		$this->view->render('Добавить новость');
	}
	
	public function editnewAction() {
		$id = $this->route['id'];
        $vars = [
            'data' => $this->model->getNew($id)[0],
			'route' => $id,
        ];
        if (!empty($_POST)) {
            if (!$this->model->newsValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
			
            $this->model->newEdit($_POST, $id);
            $this->view->message('success', 'Сохранено');
        }

        $this->view->render('Редактировать новость', $vars);
    }
	
    public function addAction() {
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, $_FILES, 'add')) {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->postAdd($_POST, $_POST['category']);
            if (!$id) {
                $this->view->message('success', 'Ошибка обработки запроса');
            }
            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id, $_POST['category']);
			$this->model->postUploadDrawings($_POST['category'], $id);
            $this->view->message('success', 'Пост добавлен');
        }
        $Categories = require 'application/config/categories.php';
        $vars = [
            'categories' => $Categories,
        ];
        $this->view->render('Добавить товар', $vars);
    }
    public function editAction() {
        //debug($this->model->isPostExists('angular', $this->route['id']));
        if (!$this->model->isPostExists($this->route['category'], $this->route['id'])) {
            $this->view->errorCode(404);
        }
        if (!empty($_POST)) {
            if (!$this->model->postValidate($_POST, $_FILES, 'edit')) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->postEdit($_POST, $this->route['id'], $this->route['category']);
            if ($_FILES['img']['tmp_name']) {
                $this->model->postUploadImage($_FILES['img']['tmp_name'], $this->route['id'], $this->route['category']);
            }
            $this->view->message('success', 'Сохранено');
        }
        $Categories = require 'application/config/categories.php';
        $vars = [
            'categories' => $Categories,
            'category' => $this->route['category'],
            'data' => $this->model->postData($this->route['category'], $this->route['id'])[0],
        ];
        $this->view->render('Редактировать пост', $vars);
    }

    public function infoAction() {
        if (!empty($_POST)) {
            /*if (!$this->model->postValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }*/
            $this->model->postInfo($_POST);
            $this->view->message('success', 'Сохранено');
        }

        $vars = [
            'data' => $this->model->postData('footer', '0')[0],
        ];
        $this->view->render('Основная информация', $vars);
    }

    public function eindexAction() {
        if (!empty($_POST)) {
            /*if (!$this->model->postValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }*/
            $this->model->postEI($_POST);
            $this->view->message('success', 'Сохранено');
        }

        $vars = [
            'data' => $this->model->postData('front', '0')[0],
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function deleteAction() {
        if (!$this->model->isPostExists($this->route['category'], $this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->postDelete($this->route['id'], $this->route['category']);

        $redPage = $_SERVER['HTTP_REFERER'];
        if(!isset($redPage)) $redPage = '/admin/posts';
        $this->view->redirect($redPage);
    }
    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('/admin/login');
    }
    public function itemsAction() {
        $mainModel = new Main;
        
        $pagination = new Pagination($this->route, $mainModel->postsCountAll());

        $vars = [
            'pagination' => $pagination->get(),
            'list' => $mainModel->getAllProducts($this->route, 10),
        ];
        $this->view->render('Товары', $vars);
    }
	
    public function newsAction() {
        $mainModel = new Main;
        
        $vars = [
            'list' => $mainModel->getAllNews(),
        ];
        $this->view->render('Новости', $vars);
    }

    public function editbannerAction() {
        if (!empty($_FILES)){
            if($this->model->editBannersImg()){
              $this->view->message('success', 'Сохранено');
            }
            else{
                $this->view->message('error', 'Выберите изображение/изображения');
            }
        }
       


        $this->view->render('Изменение баннера');
    }

}