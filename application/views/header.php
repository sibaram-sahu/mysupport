<?php
if (!isset($this->session->userdata['logged_in'])) {
  header("location:".base_url());
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="sApp">
<head>
  <title>Support</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Kavoon" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
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
<body ng-controller="core" ng-cloak>
  <div id="loading">
    <img src="<?php echo base_url();?>clientlib/imgs/loading.gif" alt="" />
  </div>
  <?php
        if($this->session->tempdata('msg1')){
          echo $this->session->tempdata('msg1');
        }
   ?>
