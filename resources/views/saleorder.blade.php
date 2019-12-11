<?php

session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Saleorder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    
<link href="../main.css" rel="stylesheet"></head>

<body>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-mean-fruit header-text-light">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto" id="sidebar1">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu" id="sidebar2">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu" id="sidebar3">
                <span>
                    <button type="button" class="btn-shadow p-1 btn btn-dark btn-sm" id="myBtn">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content" >
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                            <!-- <div class="widget-heading">&nbsp</div> -->
                                <div class="widget-content-left  header-user-info">
                                    <div class="widget-heading">
                                    <?php echo session('name'); ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php
                                        echo session('status');
                                           
                                        ?>
                                    </div>
                                </div>
                                <div class="widget-content-left ml-3" id="sidebar4">
                                
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item"><?php echo session('email'); ?></button>
                                            <form action="/logout" method="post"> 
                                                {{ csrf_field() }}
                                                <button tabindex="0" class="dropdown-item pe-7s-unlock">&nbsp Logout</button>
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>        
        
        <div class="app-main">
        <div class="app-sidebar sidebar-shadow bg-vicious-stance sidebar-text-light" id="sidebar">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                
                            
                                   
                               


                                <li class="app-sidebar__heading">Menu</li>
                                <li>
                                    <a href="../products" >
                                    <i class="metismenu-icon pe-7s-box2"></i>
                                        Products
                                    </a>
                                </li>
                                <?php
                                if(strpos(session('status'),'Sale') !== false){
                                    echo '<li>
                                    <a href="../stockin">
                                    <i class="metismenu-icon pe-7s-box1"></i>
                                        Stock In
                                    </a>
                                </li>';
                                }
                                ?>
                                
                                
                                <li>
                                    <a href="../customer">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                        Customers
                                    </a>
                                </li>
                                <li>
                                    <a href="../saleorder" class="mm-active">
                                    <i class="metismenu-icon pe-7s-note2"></i>
                                        Saleorder
                                    </a>
                                </li>
                                <li>
                                <a href="dashboard">
                                <i class="metismenu-icon pe-7s-cash"></i>
                                        Payment
                                    </a>
                                </li>
                                <?php
                                        if(session('status') != "Sales Rep"){
                                        echo '<li>
                                            <a href="../ERM">
                                            <i class="metismenu-icon pe-7s-user"></i>
                                            ERM
                                            </a>
                                        </li>';
                                        }
                                ?>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>    <div class="app-main__outer">
                
     
    <div id="id04" class="modal"> 
        <div class="modal-content animate"> 
            <div class="main-card card">
                <div class="card-body "><h4></h4>
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">×</span> 
                    <div class="">
                    <div class="main-card">
                                    <div class="card-body"><h5 class="card-title">EDIT</h5>
                                            <div class="form-row">
                                                <div class="col-md-5">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">Status</label> 
                                                <select name="select" id="select" class="form-control">
                                                    
                                                    
                                                </select>
                                                </div>
                                               
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="position-relative form-group" id="dateup"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-row">
                                             <div class="col-md-12 text-right">
                        <button type="button" onclick="sendupdate()" class="btn btn-success">Update</button>
                                    </div>
                                    </div>
                                            
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
  
 
    <div id="id03" class="modal"> 
        <div class="modal-content-del animate"> 
            <div class="main-card card">
                <div class="card-body "><h4></h4>
                <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span> 
                    <div class="text-center">
                        <div>
                        <div class="mb-4 mt-4"><h5>Are you sure ?</h5></div>
                        <div class="mb-4">
                        <button type="button" class="btn btn-primary" id="delbut" name="" onclick="deleteitem(this)">YES</button>
                        
                        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
              
 

 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                    <div class="mr-2">
                                        Customers
                                    </div>  
                                    
                                    <div class="col-md-1">
                                        <div class="search-wrapper">
                                            <div class="input-holder">
                                                <input type="text" class="search-input" placeholder="Type to search" id="searchinput">
                                                <button class="search-icon"><span></span></button>
                                            </div>
                                            <button class="close"></button>
                                        </div>
                                    </div>
                                </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Order NO.</th>
                                                <th >Customer Name</th>
                                                <th class="text-center">Order Date</th>
                                                <th class="text-center">Required Date</th>
                                                <th class="text-center">Shipped Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Point</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tablelist">
                                                <!-- table -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ddd">
                        
                    </div>
                    
                    <script src="../assets/scripts/htmlGen.js" type="text/javascript"></script>
                    <script src="../assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        
                        var json = 0;
                        function getorders(){
                            var data = 0;
                            $.ajax({
                                type: "get",
                                url: "/saleorderreq",
                                success: function(response){
                                    data = response;
                                },
                                async: false,
                            });
                            return JSON.parse(data);
                        }

                        
                        function Gentable(){
                            json = getorders();
                            var tableproduct = "";
                            var i = 0;
                            json.forEach(function(a) {
                                tableproduct += tablesale(a.orderNumber,a.customerName,a.orderDate,a.requiredDate,a.shippedDate,a.status,a.pointEarn);
                            });
                            document.getElementById("tablelist").innerHTML = tableproduct;
                        }
                        Gentable();

                        
                        document.querySelector('#searchinput').addEventListener('input',noti);
                        function noti(e){
                            var input = document.getElementById("searchinput");
                            var filter = input.value.toUpperCase();
                            var i = 0 ;
                            var tableproduct = "";
                            json.forEach(function(a) {
                                if (((a.customerName.toString()).toUpperCase()).includes(filter)){
                                    tableproduct += tablesale(a.orderNumber,a.customerName,a.orderDate,a.requiredDate,a.shippedDate,a.status,a.pointEarn);
                                }
                            });
                            document.getElementById("tablelist").innerHTML = tableproduct;
                        }
                        function delalert(productCode){
                            var p = productCode.getAttribute("id");
                            document.getElementById('id03').style.display='block';
                            document.getElementById('delbut').setAttribute("name",p);
                        }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        function deleteitem(a){
                            var p = a.getAttribute("name");
                            $.ajax({
                                type: 'delete',
                                url: '/customers/'+p,
                                success: function (data) {         
                                    document.getElementById('id03').style.display='none';
                                    Gentable();
                                }
                            });
                        }        
                        var order = 0;
                        function update(a){
                            var orederNumber = a.getAttribute("id");
                            document.getElementById('id04').style.display='block';  
                            document.getElementById("select").innerHTML = `
                                                        <option id="Cancelled">Cancelled</option>
                                                        <option id="Disputed">Disputed</option>
                                                        <option id="In Process">In Process</option>
                                                        <option id="On Hold">On Hold</option>
                                                        <option id="Resolved">Resolved</option>
                                                        <option id="Shipped">Shipped</option>` ;         
                                      
                            json.forEach(function(a) {
                                if(a.orderNumber == orederNumber){
                                    order = a;
                                }
                            });
                            document.getElementById(`${order.status}`).setAttribute("selected", "selected");
                            var date = order.shippedDate.split("-");
                            document.getElementById("dateup").innerHTML = `<label for="exampleEmail11" class="">Shipped Date</label><input id="dateship" placeholder="Customer Name" type="date" class="form-control" value="${date[0]}-${date[1]}-${date[2]}">`
                           
                        }

                        function sendupdate(){
                            document.getElementById('id04').style.display='none';  
                            var update =  { "date": document.getElementById("dateship").value.toString(), 
                                             "status": document.getElementById("select").value.toString(),
                                             "orderNumber": order.orderNumber.toString()
                                             };
                            $.ajax({
                                type: "put",
                                url: "/updateorder",
                                data: update,
                                success: function(response){
                                    Gentable();
                                },
                                error: function (error) {
                                    console.log(error);
                                 alert(error.responseText);
                                
                            }

                            });
                        }
                    </script>
                    
                                               
                                            
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>
