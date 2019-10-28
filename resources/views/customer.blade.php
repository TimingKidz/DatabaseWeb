<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Customer</title>
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
<link href="./main.css" rel="stylesheet"></head>

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
                            <div class="widget-content-left  header-user-info">
                                    <div class="widget-heading">
                                    <?php echo session('name'); ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php
                                        if(session('status')=="1"){
                                            echo "Employee";
                                        }else{
                                            echo "Admin";
                                        }
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
                                
                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">Menu</li>
                                <li>
                                    <a href="products">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Products
                                    </a>
                                </li>
                               
                                <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Stock In
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="customer"  class="mm-active">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Customers
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Saleorder
                                    </a>
                                </li>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>     <div class="app-main__outer">
                
  
  <div id="id01" class="modal"> 

      <form class="modal-content animate" action="/login"> 
              
          
                                        <div class="main-card card">
                                            <div class="card-body"><h5 class="card-title"><i class="metismenu-icon pe-7s-lock">  LOGIN</i></h5>
                                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> 
                                                <form class="">
                                                    <div class="position-relative form-group"><label for="Username" class="">Username</label><input name="email" id="Users" placeholder="Enter Username ...." type="email" class="form-control"></div>
                                                    <div class="position-relative form-group"><label for="Password" class="">Password</label><input name="password" id="Pass" placeholder="Enter Password ...." type="password"
                                                                                                                                                           class="form-control"></div>
                                                    
                                                    <button class="mt-1 btn btn-dark">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                    

       

          
      </form> 
  </div> 
  <div id="id03" class="modal"> 
                    <div class="modal-content animate"> 
                        <div class="main-card card">
                            <div class="card-body "><h4><i class="metismenu-icon pe-7s-lock">  Warning</i></h4>
                            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span> 
                                    
                                        <div class="text-center">
                                        <div id="delpop">
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
                                                <th class="text-center">#</th>
                                                <th >Name</th>
                                                <th class="text-center">Contact</th>
                                                <th class="text-center">Phone</th>                                                
                                                <th class="text-center"></th>
                                                <th class="text-center"></th>
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
                 

                    <script type="text/javascript"> 
                 
                            
                                                var tableproduct = "";
                                                var json = <?php echo $jscustomerlist; ?> ;
                                                json.forEach(function(a) {
                                                    tableproduct += ` <tr>
                                                            <td class="text-center text-muted"> ${a.customerNumber}</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">${a.customerName}</div>
                                                                                <div class="widget-subheading opacity-7">${a.city}, ${a.country}, ${a.postalCode}</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">${a.contactFirstName} ${a.contactLastName}</td>
                                                                <td class="text-center">${a.phone}</td>                                                                
                                                                <td class="text-center">
                                                                <a href="customer/${a.customerNumber}"><button id="${a.customerNumber}" class="btn btn-primary btn-sm">Detail</button></a>
                                                                <button class="btn btn-danger btn-sm"  id="${a.customerNumber}" onclick="delalert(this)">X</button>
                                                            </td>
                                                        </tr>`
                                                    
                                                });
                                                document.getElementById("tablelist").innerHTML = tableproduct;
                                                document.querySelector('#searchinput').addEventListener('input',noti);
                                                 function noti(e){
                                                    var input = document.getElementById("searchinput");
                                                    var filter = input.value.toUpperCase();
                                                    var list = json;
                                                    var i = 0 ;
                                                    var tableproduct = "";
                                                    json.forEach(function(a) {
                                                        if (((a.customerName.toString()).toUpperCase()).includes(filter)){
                                                            tableproduct += ` <tr>
                                                            <td class="text-center text-muted"> ${a.customerNumber}</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading">${a.customerName}</div>
                                                                                <div class="widget-subheading opacity-7">${a.city}, ${a.country}, ${a.postalCode}</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">${a.contactFirstName} ${a.contactLastName}</td>
                                                                <td class="text-center">${a.phone}</td>                                                                
                                                                <td class="text-center">
                                                                <a href="customer/${a.customerNumber}"><button id="${a.customerNumber}" class="btn btn-primary btn-sm">Detail</button></a>
                                                                
                                                                <button class="btn btn-danger btn-sm"  id="${a.customerNumber}" onclick="delalert(this)">X</button>
                                                            </td>
                                                        </tr>`
                                                        }
                                                    });
                                                    document.getElementById("tablelist").innerHTML = tableproduct;
                                                }
                                                function delalert(customernumber){
                                                    var p = customernumber.getAttribute("id");
                                                    document.getElementById('id03').style.display='block';
                                                    document.getElementById('delpop').innerHTML = `  <div>
                                                                        <h5>Are you sure ?</h5>
                                                                        </div>
                                                                        <form action="/customer/${p}" method="post" class="btn">
                                                                        {{ csrf_field() }}
                                                                      
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        
                                                                        <button class="btn btn-primary">YES</button>
                                                                        </form>
                                                                        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="btn btn-danger">Cancel</button>`;
                                                    
                                                }
                                
                                            
                    </script>
                    
                                               
                                            
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
