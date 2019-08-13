<?php
class Pages extends Controller
{
  public function __construct()
  {
    // $this->postModel = $this->model('Post');
  }

  public function index()
  {
    if (isLoggedIn()) {
      return redirect('posts');
    }
    // $posts = $this->postModel->getPosts();
    // $data = ['title' => 'Welcome', 'posts' => $posts];
    $data = ['title' => 'NucliuzMVC'];
    $data['description'] = 'Simple social network built on the NucliuzMVC PHP framework';
    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      "title" => "About Us",
      "description" => "The NucliuzMVC PHP framework is my answer to the past 7 php spaguetti code projects I've delivered base on pure necesity, thank you Brad @traversyMedia"
    ];
    $this->view('pages/about', $data);
  }
}