<?php require APPROOT . '/views/inc/header.php' ?>
<div class="row mb-3">
  <div class="col">
    <h1 class="white-text text-left">
      <? echo $data['post']->title; ?>
    </h1>
  </div>
</div>
<div class="card card-body mb-3 card-night-time">
  <div class="mb-3 written-by">
    written by
    <?php echo $data['post']->name; ?> on
    <?php echo $data['post']->postCreated; ?>
  </div>
  <p class="card-text white-text">
    <?php echo $data['post']->body; ?>
  </p>
</div>
<div class="row mb-3">

  <div class="col-md-6">
    <h1><a href="<?php echo URLROOT; ?>/posts" class="btn btn-dark pull-left"><i class="fa fa-arrow-left"></i>Back</a>
    </h1>
  </div>
  <div class="col-md-6">
    <?php if ($data['post']->userId == $_SESSION['user_id']) : ?>
    <h1><a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->postId; ?>" class="btn btn-warning pull-right">Edit</a>
      <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->postId; ?>" method="POST">
        <input type="submit" value="Delete" class="btn btn-danger pull-right">
      </form>
    </h1>
    <?php endif; ?>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>