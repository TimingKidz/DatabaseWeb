<?php

session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Products</title>
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
        <div class="app-header header-shadow bg-slick-carbon header-text-light">
            <div class="app-header__logo">
                <div class="logo-src"></div>
            </div>  
            <div class="app-header__content" >
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-right header-user-info ml-3" id="login"> 
                                    <button type="button" class="btn-shadow p-1 btn btn-dark btn-sm" onclick="document.getElementById('id01').style.display='block'" id="log">
                                    <i class="metismenu-icon pe-7s-lock" id="logbut"> LOGIN</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>        
        <div class="app-main">
                   
            <div class="app-main__inner">
                <div id="id01" class="modal"> 
                    <form class="modal-content animate" action="/login" method="post"> 
                        <div class="main-card card">
                            <div class="card-body"><h5 class="card-title"><i class="metismenu-icon pe-7s-lock">  LOGIN</i></h5>
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> 
                                    <form class="">
                                    {{ csrf_field() }}
                                        <div class="position-relative form-group"><label for="Username" class="">E-mail</label><input name="email"  placeholder="Enter Email ...." type="email" class="form-control"></div>
                                        <div class="position-relative form-group"><label for="Password" class="">Password</label><input name="password"  placeholder="Enter Password ...." type="password" class="form-control"></div>
                                        <div class="text-right">
                                        <button class="mt-0 btn btn-dark">Login</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </form> 
                </div>
                @if(session()->has('alert'))
                <div id="id03" class="modal"> 
                    <form class="modal-content animate"> 
                        <div class="main-card card alert-warning">
                            <div class="card-body "><h4><i class="metismenu-icon pe-7s-lock">  Warning</i></h4>
                            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">×</span> 
                                    <form class="">
                                        <div class="text-center">
                                            <h5>{{ session('alert') }}</h5><br>
                                        </div>
                                   
                                    </form>
                            </div>
                        </div>
                    </form> 
                </div>
               <script>document.getElementById('id03').style.display='block'</script>
               @endif
                <div id="id02" class="modal" id="detailpopup"> 
                    <form class="modal-content animate"> 
                        <div class="main-card card">
                            <div class="card-body"><h5 class="card-title"><i class="metismenu-icon pe-7s-lock">  Product Detail</i></h5>
                            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span> 
                                <form >
                                    <div id="detailpop">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form> 
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">
                                <div class="col-md-1">
                                        Products
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
                                                <th class="text-center">In Stock</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center"></th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody id="tablelist">

                                            
                                           
                                            </tbody>
                                        </table>
                                    </div> 
                                 
                                </div>
                            </div>
                        </div>
                      
                    
                    </div>
                 

                    <script type="text/javascript"> 
                  
                    
                                                var tableproduct = "";
                                                var i = 0;
                                                var json = <?php echo $jsproductlist; ?> ;
                                                json.forEach(function(a) {
                                                    tableproduct += ` <tr>
                                                            <td class="text-center text-muted"> ${++i}</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">${a.productName}</div>
                                                                                    <div class="widget-subheading opacity-7">${a.productLine}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">${a.quantityInStock}</td>
                                                                <td class="text-center">
                                                                    <div class="text-center">${a.MSRP}</div>
                                                                </td>
                                                                <td class="text-center">
                                                                <button onclick="detailpopup(this)" type="button" id="${a.productCode}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detail</button>
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
                                                        if (((a.productName.toString()).toUpperCase()).includes(filter)){
                                                            tableproduct += ` <tr>
                                                            <td class="text-center text-muted"> ${++i}</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg">
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">${a.productName}</div>
                                                                                    <div class="widget-subheading opacity-7">${a.productLine}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">${a.quantityInStock}</td>
                                                                <td class="text-center">
                                                                    <div class="text-center">${a.MSRP}</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button onclick="detailpopup(this)" type="button" id="${a.productCode}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detail</button>
                                                            </td>
                                                        </tr>`
                                                        }
                                                    });
                                                    document.getElementById("tablelist").innerHTML = tableproduct;
                                                }
                                                function detailpopup(products) {

                                                    document.getElementById('id02').style.display='block';
                                                    var productcode = products.getAttribute("id");
                                                    var text = "";
                                                    json.forEach(function(a) {
                                                        
                                                       if(a.productCode == productcode){
                                                            text = `
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                        Product Detail
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Last</a></li>
                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">Current</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                        <canvas id="canvas"></canvas>
                                        ${a.productDescription}
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Top Authors</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/9.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/5.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Vinnie Wagstaff</div>
                                                        <div class="widget-subheading">Java Programmer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>429</span>
                                                            <small class="text-warning pl-2">
                                                                <i class="fa fa-dot-circle"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ella-Rose Henry</div>
                                                        <div class="widget-subheading">Web Developer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>129</span>
                                                            <small class="text-danger pl-2">
                                                                <i class="fa fa-angle-down"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Ruben Tillman</div>
                                                        <div class="widget-subheading">UI Designer</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="font-size-xlg text-muted">
                                                            <small class="opacity-5 pr-1">$</small>
                                                            <span>54</span>
                                                            <small class="text-success pl-2">
                                                                <i class="fa fa-angle-up"></i>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
                                                       }
                                                       
                                                    });
                                                    document.getElementById("detailpop").innerHTML = text;
                                                    console.log(text);

                                                }
                                            
                    </script>
                    
                                               
                                            
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
