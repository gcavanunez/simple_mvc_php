<?php require APPROOT . '/views/inc/header.php' ?>

<?php flash('post_message'); ?>
<div class="card card-body bg-light mt-5">
  <h2>Edit Post</h2>
  <p>Create a post with this form</p>
  <form action="<?php echo URLROOT ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
    <div class="form-group">
      <label for="title">Title: <sup>*</sup></label>
      <input type="text" id="title" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
        value="<?php echo $data['title']; ?>">
      <span class="invalid-feedback">
        <?php echo $data['title_err']; ?></span>
    </div>
    <div class="form-group">
      <label for="body">body: <sup>*</sup></label>
      <textarea id="body" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
      <span class="invalid-feedback">
        <?php echo $data['body_err']; ?></span>
    </div>
    <div class="row">
      <div class="col"><a href="<?php echo URLROOT ?>/posts" class="btn btn-light btn-block"><i class="fa fa-arrow-left"></i>
          back</a></div>

      <div class="col"><input type="submit" value="Update" class="btn btn-success btn-block"></div>
    </div>
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php' ?>