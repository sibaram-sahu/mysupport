<?php
if (isset($this->session->userdata['logged_in'])) {
  header("location:".base_url().'app/view/dashboard');
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Support</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
      echo link_tag('clientlib/css/bootstrap.min.css');
      echo link_tag('clientlib/css/default.css');
      echo link_tag('clientlib/css/font-awesome.min.css');
      echo link_tag('clientlib/css/animate.css');
      echo link_tag('clientlib/css/master.css');
  ?>
     <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

  <!-- login form -->

  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-sm-push-4 sh2 animated fadeInDown">
        <div class="logo text-center">
          <h1 class="fbaloo">Support</h1>
        </div>
        <form class="" action="<?php echo base_url();?>oauth/" method="post">
          <?php echo $this->session->flashdata('msg'); ?>
          <div class="form-group">
            <?php echo form_error('usr'); ?>
            <?php echo form_error('pas'); ?>
            <label for="usr">Username</label>
            <input type="text" name="usr" class="form-control" />
          </div>
          <div class="form-group">
            <label for="pas">Password</label>
            <input type="password" name="pas" class="form-control" />
          </div>
          <div class="form-group">
            <button type="submit" class="btn-block btn btn-primary">Sign in</button>
          </div>
        </form>
        <p class="text-center">
          v1.0 &copy; 2016 All rights reserved by <a href="http://www.sibaspage.com">sibaspage</a>
        </p>
      </div>
    </div>
  </div>


</body>
</html>
