<?php require APPROOT . '/views/inc/header.php' ?>
<div class="jumbotron jumbotron-fluid text-center ">
  <div class="container">
    <h1 class="dislpay-3">
      <img src="https://mvc.nucliuz.com/img/nucliuzMVC-logo.png" id="jumbo-logo" style="">
      <?php echo $data['title']; ?>
    </h1>
    <p class="lead">
      <?php echo $data['description']; ?>
    </p>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>