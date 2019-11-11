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
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <div class="mt-2"><h2><i class="pe-7s-shopbag"></i></h2></div>
            </button>
            <div class="theme-settings__inner">
                <div class="ml-3 mr-3">
                    <h5 class="card-title pt-3">Cart</h5>
                    <div class="scroll-area pre-scroll">
                        <div class="scrollbar-container ps--active-y">
                            <div class="ml-3 mr-3 mb-4">
                                <div class="row">                                
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th >Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Qty.</th>   
                                                <th class="text-center">Total</th>                                    
                                                <th class="text-center"></th>
                                            </tr>
                                            </thead>
                                            <tbody id="cartp">
                                                <!-- tableCart -->
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="ml-3 mr-3 mb-4 fixed-bottom">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="pt-2">Customer :</h6>
                                </div>
                                <div class="col-sm-9">
                                    <div class="position-relative form-group"><input onchange="cusAddr(this)" id="customernumber" placeholder="insert customer number" type="" class="form-control"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="position-relative form-group"><label for="addr">Shipping Address</label><select disabled name="select" id="shipaddr" class="form-control">
                                        <!-- getAddr -->
                                    </select></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="position-relative form-group"><label for="addr">Billing Address</label><select disabled name="select" id="billaddr" class="form-control">
                                        <!-- getAddr -->
                                    </select></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <!-- <h6 class="pt-2">Voucher :</h6> -->
                                    <div class="position-relative form-group"><label for="reqdate">Required Date</label><input id="reqdate" type="date" class="form-control"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="position-relative form-group"><label for="voucher">Voucher</label><input onchange="upVoucher(this)" id="voucher" placeholder="insert voucher code" class="form-control"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="card-title pt-1">Total</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h4 id="cartTotal">$0.00</h4>
                                </div>
                                <div class="col-sm-3">
                                    <button onclick="proceed()" class="pull-right mt-1 btn btn-warning">Check out</button>
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
                                    <a href="../products" class="mm-active">
                                        <i class="metismenu-icon pe-7s-box2"></i>
                                        Products
                                    </a>
                                </li>
                               
                                <?php
                                if(strpos(session('status'),'Sale') !== false){
                                    echo '<li>
                                    <a href="/dashboard-boxes.html">
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
                                    <a href="../saleorder">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Saleorder
                                    </a>
                                </li>
                                <?php
                                        if(session('status') != "Sales Rep"){
                                        echo '<li>
                                            <a href="../ERM">
                                                <i class="metismenu-icon pe-7s-note2"></i>
                                            ERM
                                            </a>
                                        </li>';
                                        }
                                ?>
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>    <div class="app-main__outer">
                
  
  
 
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
              
               
    <div id="id02" class="modal" id="detailpopup"> 
        <form class="modal-content-detail"> 
            <div id="detailpop">
            </div>
        </form> 
    </div>

 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                    <div class="mr-3">
                                        Products
                                    </div>  
                                    <div class="dropdown d-inline-block mt-2">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" id="btn" class="mb-2 mr-2 dropdown-toggle btn btn-outline-secondary">Vendors</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" id="vendor">                                            
                                               <!-- vender -->
                                        </div>
                                    </div>                               

                                    <div class="dropdown d-inline-block mt-2">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" id="scalebtn" class="mb-2 mr-2 dropdown-toggle btn btn-outline-secondary">Scale</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" id="scale">
                                            <!-- scale -->
                                        </div>
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
                                                <!-- table -->
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>                    
                    
                    <script src="./assets/scripts/htmlGen.js" type="text/javascript"></script>
                    <script src="./assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                    <script type="text/javascript">
                   
                        var vendorlist = '<button id="none" type="button" onclick="venderFilter(this)" tabindex="0" class="dropdown-item">None</button>';
                        var json = <?php echo $jsvendor; ?> ;
                        json.forEach(function(a) {
                            vendorlist += `<button id="${a.productVendor}" type="button" onclick="venderFilter(this)" tabindex="0" class="dropdown-item">${a.productVendor}</button>`                                                    
                        }); 
                        document.getElementById("vendor").innerHTML = vendorlist;
                        function venderFilter(e){
                            document.getElementById("btn").click();
                            i = 0;
                            var productVendor = e.getAttribute("id");
                            vendorlist = "";
                            json.forEach(function(a) {
                                if(productVendor == "none"){
                                    vendorlist += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);   
                                }
                                if(a.productVendor == productVendor){
                                    vendorlist += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);       
                                }
                            });
                            document.getElementById("tablelist").innerHTML = vendorlist;
                        }
                        var scalelist = '<button id="nonescale" type="button" onclick="scaleFilter(this)" tabindex="0" class="dropdown-item">None</button>';
                        var json = <?php echo $jsscale; ?> ;
                        json.forEach(function(a) {
                            scalelist += `<button id="${a.productScale}" type="button" onclick="scaleFilter(this)" tabindex="0" class="dropdown-item">${a.productScale}</button>`                                                    
                        }); 
                        document.getElementById("scale").innerHTML = scalelist;
                        function scaleFilter(e){
                            document.getElementById("scalebtn").click();
                            i = 0;
                            var productScale = e.getAttribute("id");
                            scalelist = "";
                            json.forEach(function(a) {
                                if(productScale == "nonescale"){
                                    scalelist += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);  
                                }
                                if(a.productScale == productScale){
                                    scalelist += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);      
                                }
                            });
                            document.getElementById("tablelist").innerHTML = scalelist;
                        }    
                        var json = 0;
                        function getProduct(){
                            var data = 0;
                            $.ajax({
                                url: 'getAllProducts',
                                type: 'get',
                                dataType: 'json',
                                success: function(response){
                                    data = response
                                },
                                async: false
                            });
                            return data;
                        }                    
                        
                        function Gentable(){
                            json = getProduct();
                            var tableproduct = "";
                            var i = 0;
                            json.forEach(function(a) {
                                tableproduct += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);
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
                                if (((a.productName.toString()).toUpperCase()).includes(filter)){
                                    tableproduct += tableGenem(++i,a.productName,a.productLine,a.quantityInStock,a.MSRP,a.productCode);
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
                        cartJSON = 0;
                        function getCart(){
                            var data = 0;
                            $.ajax({
                                url: 'getCart',
                                type: 'get',
                                success: function(response){
                                    console.log(response);
                                    data = response;
                                },
                                async: false
                            });
                            return data;
                        }
                        total = 0;
                        function getCartTotal(){
                            var data = 0;
                            $.ajax({
                                url: 'getCartTotal',
                                type: 'get',
                                success: function(response){
                                    data = response;
                                },
                                async: false
                            });
                            return data;
                        }
                        function genCart(){
                            cartJSON = getCart();
                            total = getCartTotal();
                            var idx = 0;
                            if(!jQuery.isEmptyObject(cartJSON)){
                                var tablecart = "";
                                var data = $.parseJSON(cartJSON);
                                jQuery.each(data, function(index, value){
                                    tablecart += tableCart(++idx,data[index][0],data[index][1],data[index][2],data[index][3],data[index][4],data[index][5]);
                                });
                                document.getElementById("cartp").innerHTML = tablecart;   
                                document.getElementById("cartTotal").innerHTML = "$"+total;                             
                            }else{
                                document.getElementById("cartp").innerHTML = "";
                                document.getElementById("cartTotal").innerHTML = "$0.00";
                            }
                            
                        }
                        genCart();
                        function addToCart(a, qty){
                            var p = a.getAttribute("id");               
                            $.ajax({
                                type: 'post',
                                url: '/getAddToCart/'+ p +'/'+ qty,
                                success: function (data) {
                                    genCart();
                                    console.log(data);
                                    // document.getElementById("cartTotal").innerHTML = "$"+data;
                                }
                            });
                        }   
                        function editQTY(a){
                            if(a.value <= 0){
                                addToCart(a, 1);
                            }else{
                                addToCart(a, a.value);
                            }
                        }
                        function cusAddr(a){
                            if(a.value != ""){
                                $.ajax({
                                    type: 'post',
                                    url: '/getAddr/'+a.value,
                                    dataType: 'json',
                                    success: function (data) {
                                        // console.log(data);
                                        if(!jQuery.isEmptyObject(data)){
                                            var addr = "";
                                            data.forEach(function(a) {
                                                addr += `<option id="${a.mapNumber}">${a.addressLine1} ${a.addressLine2}, ${a.city}, ${a.state}, ${a.postalCode}, ${a.country}</option>`;
                                            });                                            
                                            document.getElementById("shipaddr").innerHTML = addr;
                                            document.getElementById("shipaddr").disabled = false;
                                            document.getElementById("billaddr").innerHTML = addr;
                                            document.getElementById("billaddr").disabled = false;
                                        }else{
                                            document.getElementById("shipaddr").innerHTML = "";
                                            document.getElementById("shipaddr").disabled = true;
                                            document.getElementById("billaddr").innerHTML = "";
                                            document.getElementById("billaddr").disabled = true;
                                        }                                     
                                    }
                                });
                            }else{
                                document.getElementById("shipaddr").innerHTML = "";
                                document.getElementById("shipaddr").disabled = true;
                                document.getElementById("billaddr").innerHTML = "";
                                document.getElementById("billaddr").disabled = true;
                            }
                        }
                        var discountAmount = 0;
                        function upVoucher(a){
                            if(a.value == ""){
                                var value = "null";
                                discountAmount = 0;
                            }else{
                                var value = a.value;
                            }
                            $.ajax({
                                type: 'post',
                                url: '/getVoucher/'+value,
                                dataType: 'json',
                                success: function (data) {
                                    console.log(data);
                                    if(data == 0){
                                        genCart();
                                        discountAmount = 0;
                                    }else if(data == 1){
                                        alert('Out of code');
                                        discountAmount = 0;
                                    }else if (data == 2){
                                        alert('Code expired');
                                        discountAmount = 0;
                                    }else{
                                        discountAmount = data[0]["discountAmount"];
                                        var newTotal = parseFloat(total) - discountAmount;
                                        document.getElementById("cartTotal").innerHTML = "$"+newTotal.toFixed(2);
                                    }                                     
                                },
                                error: function(err){
                                    console.log(err);
                                }
                            });
                        }
                        function proceed(){
                            var cusProceed = {
                                "cusnum": document.getElementById("customernumber").value.toString(),
                                "reqDate": document.getElementById("reqdate").value.toString(),
                                "vcode": document.getElementById("voucher").value.toString(),
                                "vdis": discountAmount,
                                "shipaddrnum": $("select#shipaddr").children("option:selected").attr('id'),
                                "billaddrnum": $("select#billaddr").children("option:selected").attr('id')
                            }
                            discountAmount = 0;
                            console.log(cusProceed);
                            $.ajax({
                                type: 'put',
                                data: cusProceed,
                                url: '/proceed/',
                                success: function(data) {
                                    console.log(data);
                                    if(data == 1){
                                        alert('Cart Empty');
                                    }
                                    genCart();
                                    Gentable();
                                    $('#customernumber').val('');
                                    $('#reqdate').val('');
                                    $('#voucher').val('');
                                    document.getElementById("shipaddr").innerHTML = "";
                                    document.getElementById("shipaddr").disabled = true;
                                    document.getElementById("billaddr").innerHTML = "";
                                    document.getElementById("billaddr").disabled = true;
                                    document.getElementById("TooltipDemo").click();
                                },
                                error: function(err){
                                    console.log(err);
                                }
                            });
                        }
                        
                        function deleteFromCart(a){
                            var p = a.getAttribute("id");
                            $.ajax({
                                type: 'post',
                                url: '/deleteFromCart/'+p,
                                success: function (data) {
                                    genCart();
                                    console.log(data);
                                }
                            });
                        }
                        function deleteitem(a){
                            var p = a.getAttribute("name");
                            $.ajax({
                                type: 'delete',
                                url: '/products/'+p,
                                success: function (data) {         
                                    document.getElementById('id03').style.display='none';
                                    Gentable();
                                }
                            });
                        }
                        function detailpopup(products) {
                            document.getElementById('id02').style.display='block';
                            var productcode = products.getAttribute("id");
                            var text = "";
                            json.forEach(function(a) {
                                if(a.productCode == productcode){
                                    text = detailPopupGen(a.productCode,a.productName,a.productScale,a.productVendor,a.quantityInStock,a.MSRP,a.productLine,a.productDescription);
                                }
                            });
                            document.getElementById("detailpop").innerHTML = text;
                        }
                                            
                    </script>
                    
                                               
                                            
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>