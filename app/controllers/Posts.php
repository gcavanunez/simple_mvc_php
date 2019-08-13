<?php
class Posts extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      return redirect('users/login');
    }
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }
  public function index()
  {
    // Get posts
    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index', $data);
  }
  public function add()
  {

    // check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // sanitize post array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [

        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => '',
        'user_id' => $_SESSION['user_id']
      ];
      if (empty($data['title'])) {
        $data['title_err'] = ' Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = ' Please enter body text';
      }

      // make sure no erros
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // validated 
        if ($this->postModel->addPost($data)) {
          flash('post_message', "Post Created");
          redirect('posts');
        } else {
          flash('post_message', "Error encountered", 'alert alert-danger');

          $this->view('posts/add', $data);
        }
      } else {
        // load view with errors
        $this->view('posts/add', $data);
      }
    } else {

      $data = [
        'title' => '',
        'body' => ''
      ];
      $this->view('posts/add', $data);

    }
  }
  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $data = ['post' => $post, 'user' => $user];
    $this->view('posts/show', $data);
  }
  public function edit($id)
  {

    // check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // sanitize post array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => '',
        'user_id' => $_SESSION['user_id'],
        'id' => $id
      ];
      if (empty($data['title'])) {
        $data['title_err'] = ' Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = ' Please enter body text';
      }

      // make sure no erros
      if (!empty($data['title_err']) || !empty($data['body_err'])) {
        // load view with errors
        return $this->view('posts/edit', $data);
      }
      // validated 
      if (!$this->postModel->updatePost($data)) {
        flash('post_message', "Error encountered", 'alert alert-danger');
        return $this->view('posts/edit', $data);
      }
      flash(' post_message ', "Post Updated");
      return redirect('posts');

    } else {
      // get existing post from model
      $post = $this->postModel->getOnlyPostById($id);
      // check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        flash('post_message', "You do not have permision to edit the post", ' alert alert-danger ');
        return redirect('posts');
      }
      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body
      ];
      $this->view('posts/edit', $data);

    }
  }
  public function delete($id)
  {
    // check for POST
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
      return redirect('posts');
    }
    // get existing post from model
    $post = $this->postModel->getOnlyPostById($id);
    // check for owner
    if ($post->user_id != $_SESSION['user_id']) {
      flash('post_message', "You do not have permision to delete the post", ' alert alert-danger ');
      return redirect('posts');
    }
    if (!$this->postModel->deletePost($id)) {
      flash('post_message', 'Post was unabled to be eliminated', 'alert alert-danger');
      return redirect('posts/view/' . $id);
    }
    flash('post_message', 'Post eliminated');
    return redirect('posts');

  }
}