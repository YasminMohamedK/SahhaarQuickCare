<?php
class Pages extends Controller
{

    public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }

    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/About.php';
        require_once $viewPath;
        $aboutView = new About($this->getModel(), $this);
        $aboutView->output();
    }
    public function gallery()
    {
        $viewPath = VIEWS_PATH . 'pages/Gallery.php';
        require_once $viewPath;
        $galleryView = new gallery($this->getModel(), $this);
        $galleryView->output();
    }
    public function view_users()
    {
        $viewPath = VIEWS_PATH . 'pages/view_users.php';
        require_once $viewPath;
        $view_users = new view_users($this->getModel(), $this);
        $view_users->output();
    }
}
