<?php require APPROOT . '/views/inc/header.php' ?>

<?php flash('post_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1 class="white-text">Posts</h1>
  </div>
  <div class="col-md-6">
    <h1><a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i>Add
        post</a></h1>
  </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
<div class="card card-body mb-3 card-night-time">
  <h4 class="card-title white-text">
    <?php echo $post->title; ?>
  </h4>
  <div class="mb-3 written-by">
    written by
    <?php echo $post->name; ?> on
    <?php echo $post->postCreated; ?>
  </div>
  <p class="card-text white-text">
    <?php echo $post->body; ?>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">Read more</a>
  </p>
</div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php' ?>