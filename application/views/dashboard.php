<?php
  include('header.php');
 ?>
<div ng-controller="dashboard">

 <nav class="navbar navbar-default bor_rad0">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand fkavoon ltrSpc2 pad15" href="">Support</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href=""><i class="fa fa-cube" aria-hidden="true"></i> SIBASPAGE</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" data-toggle="modal" data-target="#createticket"><i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i> Create ticket</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="" ><?php echo $name; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="" data-toggle="modal" data-target="#changePassword"><i class="fa fa-key" aria-hidden="true"></i> Change password</a></li>
            <li><a href="<?php echo base_url();?>oauth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-push-1">
      <div class="form-group">
        <input type="text" class="form-control" ng-model="search" placeholder="Search ticket..."/>
      </div>
      <ul ng-if="tckt.length" class="list-group">
        <li class="list-group-item relative">
          <span>{{((tcktCnt[0].close.t_sts/tckt.length)*100)|number:0}}%</span>
          <span><i class="fa fa-flag fa-fw red"></i> Open {{tcktCnt[0].open.t_sts}}</span>
          <span><i class="fa fa-flag fa-fw green"></i> Close {{tcktCnt[0].close.t_sts}}</span>
          <span class="pull-right">
            <span><i class="fa fa-square fa-fw urgent" aria-hidden="true"></i>urgent {{tcktCnt[0].urgent.t_pri}}</span>
            <span><i class="fa fa-square fa-fw high" aria-hidden="true"></i>high {{tcktCnt[0].high.t_pri}}</span>
            <span><i class="fa fa-square fa-fw medium" aria-hidden="true"></i>medium {{tcktCnt[0].medium.t_pri}}</span>
            <span><i class="fa fa-square fa-fw low" aria-hidden="true"></i>low {{tcktCnt[0].low.t_pri}}</span>
          </span>
        </li>
        <li class="list-group-item relative" ng-animate="'feed'" ng-repeat="tkt in tckt|filter:search " ng-class="{'urgentL':tkt.t_pri=='urgent','highL':tkt.t_pri=='high','mediumL':tkt.t_pri=='medium','lowL':tkt.t_pri=='low'}">
          <h3>{{tkt.t_name}} (#{{tkt.t_id}})</h3>
          <p>{{tkt.t_desc}}</p>
          <span><i class="fa fa-flag fa-fw" ng-class="{'red':tkt.t_sts=='open','green':tkt.t_sts=='close'}"></i> <b data-toggle="tooltip" title="Created by">{{tkt.t_cre}}</b> <i class="fa fa-calendar fa-fw" aria-hidden="true"></i> <span data-toggle="tooltip" title="Created on">{{tkt.t_dt}}</span></span>
          <p class="top-right ">
            <span class="btn-group">
              <button ng-click="viewticket(tkt)" type="button" data-toggle="tooltip" title="View" data-placement="bottom" class="btn btn-xs btn-link"><i class="fa fa-fw fa-eye" aria-hidden="true"></i></button>
              <button ng-click="editticket(tkt)" type="button" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-xs btn-link"><i class="fa-fw fa fa-pencil" aria-hidden="true"></i></button>
              <button ng-click="deleteticket(tkt)" type="button" data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-xs btn-link"><i class="fa fa-fw fa-trash" aria-hidden="true"></i></button>
            </span>
          </p>
        </li>
      </ul>
      <ul ng-if="!tckt.length" class="list-group">
        <li class="list-group-item relative">
          <span><i class="fa fa-bullhorn fa-fw red"></i> No tickets are found. </span>
          <span class="pull-right pointer" data-toggle="modal" data-target="#createticket"><i class="fa fa-plus-circle fa-fw green"></i> Creare a new ticket</span>
        </li>
      </ul>
    </div>
  </div>
</div>

<div id="createticket" class="modal fade animated fadeInDown" role="dialog">
  <div class="modal-dialog mar-100T">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i> Create Ticket</h4>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url();?>Ticket/setTicket" method="post">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Enter title" value="">
          </div>
          <div class="form-group">
            <textarea name="desc" rows="8" cols="40" class="form-control" placeholder="Enter description"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="">Select status</option>
              <option selected="selected" value="open">Open</option>
              <option value="close">Close</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="prority">
              <option value="">Select priority</option>
              <option value="urgent">Urgent</option>
              <option value="high">High</option>
              <option selected="selected" value="medium">Medium</option>
              <option value="low">Low</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" name="createticket" class="btn btn-primary btn-block">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="viewticket" class="modal fade animated fadeInDown" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-bullhorn fa-fw" aria-hidden="true" ng-init="v.tkt.name=vtckt.name"></i> {{vtckt.name}}</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <p>{{vtckt.desc}}</p>
          </div>
          <div class="form-group col-sm-4 pad0">
            <select class="form-control" name="status" ng-model="vtckt.sts">
              <option value="">Select status</option>
              <option value="open">Open</option>
              <option value="close">Close</option>
            </select>
          </div>
          <div class="form-group col-sm-4">
            <select class="form-control" name="prority" ng-model="vtckt.pri">
              <option value="">Select priority</option>
              <option value="urgent">Urgent</option>
              <option value="high">High</option>
              <option value="medium">Medium</option>
              <option value="low">Low</option>
            </select>
          </div>
          <div class="form-group">
            <button type="button" ng-click="updateTicket(vtckt)" name="createticket" class="btn btn-primary btn-block">Update</button>
          </div>
      </div>
    </div>
  </div>
</div>
<div id="editticket" class="modal fade animated fadeInDown" role="dialog" ng-init="edtkt={};">
  <div class="modal-dialog mar-100T">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i> Edit Ticket</h4>
      </div>
      <div class="modal-body">
        <form class="" method="post">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Enter title" ng-model="edtkt.name">
          </div>
          <div class="form-group">
            <textarea name="desc" rows="8" cols="40" class="form-control" placeholder="Enter description" ng-model="edtkt.desc"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="status" ng-model="edtkt.sts">
              <option value="">Select status</option>
              <option value="open">Open</option>
              <option value="close">Close</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="prority" ng-model="edtkt.pri">
              <option value="">Select priority</option>
              <option value="urgent">Urgent</option>
              <option value="high">High</option>
              <option value="medium">Medium</option>
              <option value="low">Low</option>
            </select>
          </div>
          <div class="form-group">
            <button type="button" name="createticket" class="btn btn-primary btn-block" ng-click="updateTicket(edtkt)">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="changePassword" class="modal fade animated fadeInDown" role="dialog" ng-init="chpas={}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Change Password</h4>
      </div>
      <div class="modal-body">
        <form class="" method="post">
          <div ng-if="mm" class="pad5 alert alert-danger bor0"> <i class="fa fa-key fa-fw"></i>Password Mismatch</div>
          <div class="form-group">
            <input type="password" name="title" class="form-control" placeholder="Enter password" ng-model="chpas.pas">
          </div>
          <div class="form-group">
            <input type="password" name="title" class="form-control" placeholder="Enter Confirm password" ng-model="chpas.cpas">
          </div>
          <div class="form-group">
            <button type="button" name="createticket" class="btn btn-primary btn-block" ng-click="chngPas(chpas)">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php
  include('footer.php');
 ?>
