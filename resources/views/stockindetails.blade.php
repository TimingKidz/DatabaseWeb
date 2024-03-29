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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Stock-In Detail</title>
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
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link href="../main.css" rel="stylesheet">
</head>

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
            <div class="app-header__content">
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
                                            <img width="42" class="rounded-circle" src="../assets/images/avatars/1.jpg" alt="">
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
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">

                            
                            


                            <li class="app-sidebar__heading">Menu</li>
                            <li>
                                <a href="../products">
                                <i class="metismenu-icon pe-7s-box2"></i>
                                    Products
                                </a>
                            </li>

                            <?php
                            if (strpos(session('status'), 'Sale') !== false) {
                                echo '<li>
                                    <a href="../stockin" class="mm-active">
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
                            <li>
                                <a href="../payment">
                                <i class="metismenu-icon pe-7s-cash"></i>
                                    Payment
                                </a>
                            </li>
                            <?php
                            if (session('status') != "Sales Rep") {
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
            </div>
            <div class="app-main__outer">




                <div id="id02" class="modal" id="detailpopup">
                    <form class="modal-content-detail">
                        <div id="detailpop">
                        </div>
                    </form>
                </div>
                <div id="id02_edit" class="modal" id="detailpopup_edit">
                    <div class="modal-content-detail">
                        <div id="detailpop_edit">
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
                            <button type="button" class="btn btn-primary" id="delbut" name="" value="" onclick="deleteitem(this)">YES</button>
                        
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
                            <div class="card-body"><h5 class="card-title">EDIT</h5>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group" id="dateup"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group" id="A3"></div>
                                    </div>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header mr-3">Stock-in Detail

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-2 card">
                                        <div class="card-body mb-3">
                                            <div class="row">
                                                <div class="col-md-auto">
                                                    <img class="d-block w-20" src="https://via.placeholder.com/200x150">
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="stockindetail"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-2 card">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">comment</h5>
                                            <div class="scroll-area-ad">
                                                <div class="scrollbar-container">
                                                    <ul class="list-group">
                                                        <li>
                                                            <div id="commentLabel"></div>
                                                        </li>
                                                        <li>
                                                            <div id="editbutton"></div>
                                                        </li>
                                                    </ul>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="main-card mb-2 card">
                                        <div class="card-body">
                                            <b class="card-title">Stock-in</b>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="main-card mb-3 card">

                                                        <div class="table-responsive">
                                                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Stock NO.</th>
                                                                        <th>Product Code</th>
                                                                        
                                                                        <th class="text-center">qty</th>
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
                                    </div>
                                </div>

                            </div>

                        </div>

                        <script src="../assets/scripts/htmlGen.js" type="text/javascript"></script>
                        <script src="../assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                        <script type="text/javascript">
                            var json = 0;
                            var code = 0;
                            
                            
                            code = <?php echo $id ?>;

                            function getstockHD() {
                                var data = 0;
                                $.ajax({
                                    type: "get",
                                    url: "/stockinreq/"+code,
                                    datatype: "json",
                                    success: function(response) {
                                        data = response;
                                        console.log(data);
                                    },
                                    async: false,
                                });

                                return JSON.parse(data);
                            }



                            function getcomments(code) {
                                var data = 0;
                                $.ajax({
                                    type: "get",
                                    url: "/stockincomment/"+code,
                                    success: function(response) {
                                        data = response;
                                        console.log(data);
                                    },
                                    async: false,
                                });

                                return JSON.parse(data);
                            }

                            function delalert(stockinNumber){
                                var p = stockinNumber.getAttribute("id");
                                var n = stockinNumber.getAttribute("name");
                                document.getElementById('id03').style.display='block';
                                document.getElementById('delbut').setAttribute("name",p);
                                document.getElementById('delbut').setAttribute("value",n);
                                                 
                            }
                            
                            var stock=0;
                            function update(a){
                            var stockkNumber = a.getAttribute("name");
                            var productCode = a.getAttribute("id");
                            document.getElementById('id04').style.display='block';
                            json=getstockHD();
                            json.forEach(function(a) {
                                if(a.stockNumber == stockkNumber && a.productCode == productCode){
                                    stock = a;
                                }
                            });        
                            var date = stock.stockDate.split("-");
                            document.getElementById("dateup").innerHTML = `<label for="exampleEmail11" class="">Date</label><input id="dates" placeholder="Customer Name" type="date" class="form-control" value="${date[0]}-${date[1]}-${date[2]}">`
                            document.getElementById("A3").innerHTML= `<label for="exampleEmail11" class="">Quantity</label><input id="A4" placeholder="Customer Name" type="number" class="form-control" value="${stock.quantityOrdered}">`
                        }
                            
                        function sendupdate(){
                            document.getElementById('id04').style.display='none'; 
                            var update =  { "date": document.getElementById("dates").value.toString(), 
                                             "quantityOrdered": document.getElementById("A4").value.toString(),
                                             "stockNumber": stock.stockNumber.toString(),
                                             "productCode":stock.productCode.toString()
                                             };
                            $.ajax({
                                type: "put",
                                url: "/updatestock",
                                data: update,
                                success: function(response){
                                    gentabledetail();
                                    console.log('Update Success');
                                },
                                error: function (error) {
                                    console.log(error);
                                 alert(error.responseText);
                                
                            }

                            });
                        }

                            function deleteitem(a){
                                var p = a.getAttribute("name");
                                var n = a.getAttribute("value");
                            $.ajax({
                                type: 'delete',
                                url: '/stockin/'+n+'/'+p, 
                                success: function (data) {         
                                    document.getElementById('id03').style.display='none';
                            
                                    gentabledetail();
                                }
                            });
                            }

                            function gentabledetail(){
                            var json = getstockHD();
                            var tableproduct = "";
                            var i = 0;
                            console.log(json);
                            json.forEach(function(a) {
                                tableproduct += tablestockdetail(a.stockinNumber,a.productCode,a.quantityOrdered);
                            });
                            document.getElementById("tablelist").innerHTML = tableproduct;
                            }
                            var g_comment = 0;
                            function Gencom() {
                                var data = getcomments(code);
                                console.log(data);
                                data.forEach(function(a) {
                                    console.log(a.stockNumber+" stockNumber");
                                    if (a.stockNumber == code) {
                                        console.log("comments", a.comments)
                                        document.getElementById('commentLabel').innerHTML = `<label for="exampleText" class=""></label><input name="comment" id="textcomment" placeholder="Comments......" type="textarea" class="form-control" value="${a.comments}">`;
                                        g_comment = a.comments;
                                    }
                                });
                            }
                            gentabledetail();
                            Gencom();
                            document.getElementById('editbutton').innerHTML = `<button onclick="editform(this)" type="button" id="editbutton"  class="mt-2 mb-2 mr-2 btn-transition btn btn-outline-warning">edit</button>`;;
                            
                            document.getElementById('stockindetail').innerHTML = `<b>Stock Number : </b>${code}<br>`;

                            function editcomment(id) {
                                document.getElementById('id02_edit').style.display = 'block';
                                var x = id.getAttribute("id");
                                var text = `<div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                edit comments
                            </div>
                            <span onclick="document.getElementById('id02_edit').style.display='none'" class="close" title="Close Modal">×</span>
                        </div>
                        <div class="card-body">
                            
                                
                                
                                <label for="exampleText" class=""></label><textarea name="text" id="commentsend" class="form-control"></textarea>
                                <button class="mt-2 btn btn-warning" onclick="editform(${x})">Edit</button>
                            
                        </div>
                    </div>`;

                                document.getElementById("detailpop_edit").innerHTML = text;
                            }
                            $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                            function editform() {
                                console.log(document.getElementById("textcomment"))
                                var comment = {
                                    "comments": document.getElementById("textcomment").value.toString(),
                                    "stockNumber": code.toString()
                                };
                                console.log("edit", comment);
                                $.ajax({
                                    type: "put",
                                    url: "/commentstock/" + code,
                                    data: comment,
                                    success: function(response) {
                                        //gencomment
                                        if (g_comment != comment.comments) {
                                                alert("Are you sure to edit ?");
                                                Gencom();
                                            }
                                    },
                                    error: function(error) {
                                        alert(error.responseText);
                                        console.log(error.responseText);
                                    }
                                });
                                
                            }
                        </script>



                        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                    </div>
                </div>
                <script type="text/javascript" src="../assets/scripts/main.js"></script>
</body>

</html>