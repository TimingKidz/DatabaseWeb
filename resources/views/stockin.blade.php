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
    
    <title>Stock-In</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
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
                                
                                
                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                    <a href="../dashboard">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">Menu</li>
                                <li>
                                    <a href="../products">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Products
                                    </a>
                                </li>
                                <?php
                                if(strpos(session('status'),'Sale') !== false){
                                    echo '<li>
                                    <a href="../stockin" class="mm-active">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Stock In
                                    </a>
                                </li>';
                                }
                                ?>
                                
                                
                                <li>
                                    <a href="../customer">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Customers
                                    </a>
                                </li>
                                <li>
                                    <a href="../saleorder">
                                        <i class="metismenu-icon pe-7s-display2"></i>
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
    <div id="id04" class="modal"> 
        <div class="modal-content animate"> 
            <div class="main-card card">
                <div class="card-body "><h4></h4>
                <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">×</span> 
                    <div class="">
                        <div class="main-card">
                            <div class="card-body"><h5 class="card-title">ProductLine</h5>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductLine</label><input name="ProductLine" id="C1" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">HTMLDesctiption</label><input name="HTMLDescription" id="C2" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Image</label><input name="Image" id="C3" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">Description</label><textarea row="5" name="TextDescription" id="C4" placeholder="..." type="text" class="form-control"></textarea></div>
                                    </div>        
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="re()" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div id="id05" class="modal"> 
        <div class="modal-content-more animate"> 
            <div class="main-card card">
                <div class="card-body "><h4></h4>
                <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">×</span> 
                    <div class="">
                        <div class="main-card">
                            <div class="card-body"><h5 class="card-title">Product</h5>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductCode</label><input name="ProductCode" id="D1" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductName</label><input name="ProductName" id="D2" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductVendor</label><input name="ProductVendor" id="D3" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductScale</label><input name="ProductScale" id="D4" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">QuantityInStock</label><input name="QuantityInStock" id="D5" placeholder="..." type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">BuyPrice</label><input name="BuyPrice" id="D6" placeholder="..." type="text" class="form-control"></div>
                                    </div>  
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">MSRP</label><input name="MSRP" id="D7" placeholder="..." type="text" class="form-control"></div>
                                    </div>          
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group"><label for="exampleEmail11" class="">ProductDescription</label><textarea row="5" name="ProductDescription" id="D8" placeholder="..." type="text" class="form-control"></textarea></div>
                                    </div>        
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="re2()" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
              
 
        <div class="col-md-12">
            <div class="main-card mb-2 card">
                <div class="main-card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-4 mt-3">
                               <div class="position-relative form-group"><div class="ui-widget"><label for="tags"></label><input name="ProductLine" id="tags" placeholder="ProductLine" type="text" class="form-control"></div></div>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <div class="position-relative form-group"><div class="ui-widget"><label for="dd"></label><input name="ProductCode" id="dd" placeholder="ProductCode" type="text" class="form-control"></div></div>
                            </div>
                            <div class="col-sm-2">
                                <div class="position-relative form-group"><label for="exampleEmail11" class=""></label><input name="Quantity" id="B3" placeholder="Qty" type="number" class="form-control"></div>
                            </div>
                            <div class="col-sm-2">
                                <div class="position-relative form-group"><label for="exampleEmail11" class=""></label><input name="Price" id="B4" placeholder="Price" type="number" class="form-control"></div>
                            </div>
                            <div class="col-sm-1 mt-3">
                                <button class= "col-sm mt-2 btn btn-warning"onclick="submitst()">Add</button>
                            </div>
                            <div class="col-sm-6"><h5 class="card-title">Stock-in</h5></div>
                           
                        </div>                        
                        <div class="row scroll-area-xs">   
                            <div class="scrollbar-container ps--active-y"> 
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-wrapper table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>ProductCode</th>
                                                    <th class="text-center">Quantity</th>
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
                    
                    
                        <div class="form-row">
                            <div class="mt-1 col-sm-3">
                                <div class="position-relative form-group"><label for="exampleEmail11" class=""></label><input name="Date" id="B5" type="date" class="form-control"></div>
                            </div>
                            <div class="mt-3 col-sm-7">
                                <div class="position-relative form-group"><label for="examplePassword11" class=""></label><input name="comment" id="A4" placeholder="Comment" type="text"class="form-control"></div>
                            </div>
                            <div class="mt-4 col-sm-2">
                            
                                    <button class="col-sm mt-1  btn btn-primary"onclick="addstockin()">Submit</button>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
                        
                      
                           
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                    <div class="mr-2">
                                        Stock-In
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
                                                <th>Date</th>
                                                <th class="text-center">Comment</th>
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
                    
                    <script src="../assets/scripts/htmlGen.js" type="text/javascript"></script>
                    <script src="../assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                    <script src="../assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script type="text/javascript">
                       
                       var d = new Date();
                    document.getElementById('B5').value = `${d.getFullYear()}-${d.getMonth()}-${d.getDate()}`;
                   $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        function getproductline(){
                            var data = 0;
                            $.ajax({
                                type: "post",
                                url: "/getproductline",
                                success: function(response){
                                    data = response;
                                },
                                async: false,
                            });
                            return JSON.parse(data);
                        }


                    var line = 0;
                    var linearr = [];
                    var proarr = [];
                    var productline = 0;
                    var jsonn = [];
                    var pro = 0;
                    
                    function getproduct(pline){
                        var data = 0;
                        $.ajax({
                            type: "post",
                            url: "/getProducts",
                            data: {"Line":pline.toString()},
                            success: function(response){
                                data = response;                                
                            },
                                async: false,
                            });
                            return JSON.parse(data);
                        }

                    function pullline(){
                        line = getproductline();
                        linearr.splice(0, linearr.length);
                        line.forEach(function(a) {
                               linearr.push(a.productLine);
                        });
                    }

                    function pullpro(){
                        pro = getproduct(productline);
                        proarr.splice(0, proarr.length);
                        pro.forEach(function(a) {
                               proarr.push(a.productCode);
                        });
                    }

                    pullline();
                 
                     $( function() {
                        $( "#tags" ).autocomplete({
                        source: linearr
                        });
                    } );
                    $( function() {
                        $( "#dd" ).autocomplete({
                        source: proarr
                        });
                    } );
                    document.querySelector('#tags').addEventListener('blur',linecheck);
                    
                    function re(){
                        document.getElementById('id04').style.display='none';
                        var addproductline =  { 
                                             "Line": document.getElementById("C1").value.toString(),
                                             "text":document.getElementById("C4").value.toString(),
                                             "html": document.getElementById("C2").value.toString(),
                                             "image":document.getElementById("C3").value.toString(),
                        };
                        document.getElementById("C4").value = "";
                        document.getElementById("C2").value = "";
                        document.getElementById("C3").value = "";
                            console.log(addproductline);
                            $.ajax({
                                type: "post",
                                url: "/addproductline",
                                data: addproductline,
                                success: function(response){
                                    alert(response);
                                },
                                error: function (error) {
                                alert(error.responseText);
                            }

                            });

                        pullline();
                        linecheck();
                    }

                    function re2(){
                        document.getElementById('id05').style.display='none';
                        var addproduct =  { 
                                             "code": document.getElementById("D1").value.toString(),
                                             "name":document.getElementById("D2").value.toString(),
                                             "line":productline.toString(),
                                             "vender":document.getElementById("D3").value.toString(),
                                             "scale":document.getElementById("D4").value.toString(),
                                             "msrp":document.getElementById("D7").value.toString(),
                                             "qty": document.getElementById("D5").value.toString(),
                                             "buy":document.getElementById("D6").value.toString(),
                                             "des":document.getElementById("D8").value.toString(),
                        };
                        document.getElementById("D1").value = "";
                        document.getElementById("D2").value = "";
                        document.getElementById("D3").value = "";
                        document.getElementById("D4").value = "";
                        document.getElementById("D5").value = "";
                        document.getElementById("D6").value = "";
                        document.getElementById("D7").value = "";
                        document.getElementById("D8").value = "";
                            console.log(addproduct);
                            $.ajax({
                                type: "post",
                                url: "/addproduct",
                                data: addproduct,
                                success: function(response){
                                    alert(response);
                                },
                                error: function (error) {
                                alert(error.responseText);
                            }

                            });
                        pullpro();
                    }
                    function linecheck(e){
                        productline = document.getElementById("tags").value.toString();
                        console.log(productline);
                            if(!linearr.includes(productline)){
                                document.getElementById("C1").value = productline;
                                document.getElementById('id04').style.display='block';
                            }else{
                                 pullpro();
                                 console.log(pro);
                            }
                        }
                        document.querySelector('#dd').addEventListener('blur',notii);
                        function notii(e){
                            var productc = document.getElementById("dd").value.toString();

                            if(!proarr.includes(productc)){
                                document.getElementById('id05').style.display='block';
                                document.getElementById("D1").value = productc;
                                
                            }
                        }

                        function Genlist(){
                            var text = "";
                            var j = 0;
                            jsonn.forEach(function(a) {
                                text += tablest(a.name, a.line, a.qty , a.code)
                                console.log(a.name);
                            });
                            document.getElementById("cartp").innerHTML = text;
                        }

                    
                    function submitst(){
                        var temp = "" ;
                        var pcode = document.getElementById("dd").value.toString();
                        console.log(pcode);
                        var check = 0;
                       
                        if(pcode != ""){
                            pro.forEach(function(a) {
                                if(a.productCode == pcode){
                                    temp = a.productName;
                                }
                            });
                            var aaa = {"code": document.getElementById("dd").value.toString(),
                                       "name": temp.toString(),
                                       "line": document.getElementById("tags").value.toString(),
                                       "p":document.getElementById("B4").value.toString(),
                                       "qty":document.getElementById("B3").value.toString()};
                            document.getElementById("B3").value="";
                            document.getElementById("B4").value="";
                            document.getElementById("dd").value ="";
                            document.getElementById("tags").value ="";
                            jsonn.forEach(function(a) {
                                if(a.code == pcode){
                                    a.qty = parseInt(aaa.qty)+parseInt(a.qty);
                                    check = 1;
                                }
                            });
                            if(check == 0){
                               jsonn.push(aaa); 
                            }
                            
                            console.log(JSON.stringify(jsonn));
                            Genlist();
                        }
                        
                    }

                    function dellist(pcode){
                        var temp = pcode.getAttribute("id");
                        console.log(temp);
                        var j = 0;
                        jsonn.forEach(function(a) {
                            if(a.code == temp){
                                    jsonn.splice(j, 1);
                                    console.log(jsonn);
                                }
                                j++;
                        });
                        
                        Genlist();
                            
                    }
                        var json = 0;
                        
                        function getstockin(){
                            var data = 0;
                            $.ajax({
                                type: "get",
                                url: "/getstock",
                                success: function(response){
                                    data = response;
                                },
                                async: false,
                            });
                            return JSON.parse(data);
                        }
                        function Gentable(){
                            json = getstockin();
                            var tableStockin = "";
                            json.forEach(function(a) {
                                tableStockin += tablestockin(a.stockNumber,a.stockDate,a.comments);
                            });
                            document.getElementById("tablelist").innerHTML = tableStockin;
                        }
                        Gentable();

                        
                        document.querySelector('#searchinput').addEventListener('input',noti);
                        function noti(e){
                            var input = document.getElementById("searchinput");
                            var filter = input.value.toUpperCase();
                            var i = 0 ;
                            var tableStockin = "";
                            json.forEach(function(a) {
                                if (((a.stockNumber.toString()).toUpperCase()).includes(filter)){
                                    tableStockin += tablestockin(a.stockNumber,a.stockDate,a.comments);
                                }
                            });
                            document.getElementById("tablelist").innerHTML = tableStockin;
                        }
                        function delalert(stockNumber){
                            console.log(stockNumber);
                            var p = stockNumber.getAttribute("id");
                            document.getElementById('id03').style.display='block';
                            document.getElementById('delbut').setAttribute("name",p);
                                                 
                        }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        function addstockin(){
                           if(jsonn.legth > 0){
                            var stockin =  { "date":document.getElementById("B5").value.toString(),
                                             "comments":document.getElementById("A4").value.toString(),
                                             "dataarr":jsonn};
                            console.log(stockin);
                                            
                            $.ajax({
                                type: "post",
                                url: "/addstock",
                                data: stockin,
                                success: function(response){
                                    alert(response);
                            
                                    Gentable();
                                },
                                error: function (error) {
                                alert(error.responseText);
                                console.log(error.responseText);
                            }

                            });
                           }else{
                               alert("no product !!");
                           }
                           
                        }

                        function deleteitem(a){
                            var p = a.getAttribute("name");
                            console.log(json);
                            $.ajax({
                                type: 'delete',
                                url: '/stockin/'+p,
                                success: function (data) {         
                                    document.getElementById('id03').style.display='none';
                                    const index = json.findIndex(x => x.productCode == p);
                                    if (index !== undefined) json.splice(index, 1);
                                    console.log(json);
                                    Gentable();
                                }
                            });
                        }
                                            
                    </script>
                    
                                               
                                            
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="../assets/scripts/main.js"></script></body>
</html>
