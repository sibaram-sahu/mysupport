// angular js

var sApp = angular.module('sApp',['ui.bootstrap','ngAnimate'])
//array filter
.filter('arr',['$log',function($log){
  return function(o,t){
    var res = [];
    if(angular.isObject(t)){
      var type = Object.keys(t)[0];
      switch (type) {
        case 'count':
          var c,d,e={};
          angular.forEach(t.count,function(v,k){
            c = 0;
            d = Object.keys(v)[0];
            angular.forEach(o,function(v1,k1){
              if(v1[d] == v[d]){
                c++;
              }
            });
            e[v[d]]={[d]:c};
          });
          res.push(e);
          return res;
          break;
        default:
          return '';
      }
    }
  }
}])
.controller('core',['$scope','$rootScope','$http','$filter',function(s,rs,$http,$filter){

  rs.APPURL = 'http://www.sibaspage.com/projects/support';
}])// core end
.controller('dashboard',['$scope','$rootScope','$http','$filter','$location',function(s,rs,$http,$filter,loc){
    s.tckt = [];s.vtckt={};
    $http({method:'POST',url:  rs.APPURL+'/ticket/getTicket'})
    .then(function(r){
      s.tckt=r.data;
      s.tcktCnt = $filter('arr')(s.tckt,{'count':[{'t_sts':'close'},{'t_sts':'open'},{'t_pri':'urgent'},{'t_pri':'high'},{'t_pri':'medium'},{'t_pri':'low'}]});
    });

    //view ticket
    s.viewticket = function(t){
      $("#viewticket").modal();
      s.vtckt = {
        'name':t.t_name,
        'desc':t.t_desc,
        'sts':t.t_sts,
        'pri':t.t_pri,
        'id':t.t_id
      };
    };
    //edit ticket
    s.editticket = function(t){
      $("#editticket").modal();
      s.edtkt = {
        'name':t.t_name,
        'desc':t.t_desc,
        'sts':t.t_sts,
        'pri':t.t_pri,
        'cre':t.t_cre,
        'id':t.t_id
      }
    };
    //delete ticket
    s.deleteticket = function(t){
      if(confirm("Are you sure ?")){
        $http({method:'POST',url:  rs.APPURL+'/ticket/deleteTicket/'+t.t_id})
        .then(function(r){
          location.reload();
        });
      }
    };

    //update ticket
    s.updateTicket = function(a){
      if(a){
        var params =  JSON.stringify(a);
        $http({
          method:'POST',
          url:rs.APPURL+'/ticket/updateTicket/',
          headers: {'Content-Type': 'application/json'},
          data:params
        })
        .then(function(r){
          if(r.data){
            location.reload();
          }
        });
      }
    };

    //change password
    s.chngPas = function(a){
      s.mm=0;
      if(a.pas==a.cpas){
        var t = a.pas;
        $http({
          method:'POST',
          url:rs.APPURL+'/oauth/changePassword/',
          headers: {'Content-Type': 'application/json'},
          data:t
        })
        .then(function(r){console.log(r);
          if(r.data){
            location.reload();
          }
        });
      }
      else{
        s.mm=1;
      }
    };
}]);// dashboard end

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('.top-right-msg').fadeOut(10000);
});
$(window).load(function(){
   $('#loading').fadeOut(2000);
});
