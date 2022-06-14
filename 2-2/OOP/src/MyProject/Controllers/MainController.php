<?php
    namespace MyProject\Controllers;
    use MyProject\View\View;
    use MyProject\Models\Articles\Article;

    class MainController{
        private $view;
        private $db;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }

        public function main(){
            $articles = Article::findAll();
            $title = '';
            $this->view->renderHtml('main/main.php', ['articles' => $articles, $title]);
        }


        public function sayHello(string $name){
            $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
        }

        public function  sayBye(string $name){
            $this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Страница прощания']);
        }
    }
?>