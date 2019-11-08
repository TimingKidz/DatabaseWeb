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

                            <li class="app-sidebar__heading">Dashboard</li>
                            <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard
                                    </a>
                                </li>


                                <li class="app-sidebar__heading">Menu</li>
                                <li>
                                    <a href="../products">
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
                                    <a href="../customer" class="mm-active">
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
                </div>
            </div>
            <div class="app-main__outer">





                <div id="id02_add" class="modal" id="detailpopup_add">
                    <div class="modal-content-detail">
                        <div id="detailpop_add">
                        </div>
                    </div>
                </div>
                <div id="id02_edit" class="modal" id="detailpopup_edit">
                    <div class="modal-content-detail">
                        <div id="detailpop_edit">
                        </div>
                    </div>
                </div>
                <div id="id02_delete" class="modal" id="detailpopup_delete">
                    <div class="modal-content-detail">
                        <div id="detailpop_delete">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- start -->
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header mr-3">Customer Detail

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
                                                    <div id="cusdetail"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-2 card">
                                        <div class="card-body mb-3">
                                            <h5 class="card-title">Address</h5>
                                            <div class="scroll-area-ad">
                                                <div class="scrollbar-container">
                                                    <ul class="list-group" id="addrdisp">
                                                        <!-- <li class="list-group-item" >
                                                        </li>
                                                        <li class="list-group-item">
                                                            <button onclick="detailpopup(this)" type="button" id="PopoverCustomT-1" class="mb-2 mr-2 btn-transition btn btn-outline-primary">add</button>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="main-card mb-2 card">
                                        <div class="card-body">
                                            <b class="card-title">Order</b>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>


                    <script src="../assets/scripts/htmlGen.js" type="text/javascript"></script>
                    <script src="../assets/scripts/jquery-3.4.1.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        var json = 0;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        function ajaxget() {
                            var data = 0;
                            $.ajax({
                                type: "post",
                                url: "/customer/" + <?php echo $id; ?>,
                                success: function(response) {
                                    data = response;
                                },
                                async: false

                            });
                            return JSON.parse(data);
                        }

                        function checkAddrDisplay(a) {
                            // address display
                            // document.getElementById('addrdisp').innerHTML = `${a.addressLine1}<br>${a.addressLine2}<br>${a.city},${a.state},${a.country},${a.postalCode}`;
                            if (a.addressLine2 == "" && (a.state == "" && a.postalCode != "")) { //001
                                return `${a.addressLine1}<br>${a.city},${a.country},${a.postalCode}`;
                            } else if (a.addressLine2 == "" && (a.state != "" && a.postalCode == "")) { //010
                                return `${a.addressLine1}<br>${a.city},${a.state},${a.country},${a.postalCode}`;
                            } else if (a.addressLine2 == "" && (a.state != "" && a.postalCode != "")) { //011
                                return `${a.addressLine1}<br>${a.city},${a.state},${a.country},${a.postalCode}`;
                            } else if (a.addressLine2 != "" && (a.state == "" && a.postalCode == "")) { //100
                                return `${a.addressLine1}<br>${a.addressLine2}<br>${a.city},${a.country}`;
                            } else if (a.addressLine2 != "" && (a.state == "" && a.postalCode != "")) { //101
                                return `${a.addressLine1}<br>${a.addressLine2}<br>${a.city},${a.country},${a.postalCode}`;
                            } else if (a.addressLine2 != "" && (a.state != "" && a.postalCode == "")) { //110
                                return `${a.addressLine1}<br>${a.addressLine2}<br>${a.city},${a.state},${a.country}`;
                            } else if (a.addressLine2 != "" && (a.state != "" && a.postalCode != "")) { //111
                                return `${a.addressLine1}<br>${a.addressLine2}<br>${a.city},${a.state},${a.country},${a.postalCode}`;
                            }
                        }

                        function Genaddr() {
                            json = ajaxget();
                            var temp = "";
                            var t = "";

                            console.log(json.length)
                            for (var i = 0; i < json.length; i++) {
                                console.log("show map", json[i].mapNumber);
                                console.log(json[i].addressLine1);
                                t += '<li class="list-group-item" >';
                                t += checkAddrDisplay(json[i]);
                                t += `<button onclick="detailpopup_edit(this)" type="button" id="${json[i].mapNumber}" name="mapedit" class="mb-2 mr-2 ml-5 btn-transition btn btn-outline-warning">edit</button><button onclick="detailpopup_delete(this)" type="button" id="${json[i].mapNumber}" name="mapedit" class="mb-2 mr-2 btn-transition btn btn-outline-danger">delete</button></li>`;
                            }



                            json.forEach(function(a) {
                                // detail name,tel,id
                                customerID = a.customerNumber;
                                document.getElementById('cusdetail').innerHTML = `<b>Customer ID : </b>${a.customerNumber}<br>
                                <b>CustomerName : </b>${a.customerName}<br>
                                <b>Tel : </b>${a.phone}<br>
                                <b>ContactName : </b>${a.contactFirstName}  ${a.contactLastName}`;
                            });

                            //add
                            temp += t + '<li class="list-group-item"><button onclick="detailpopup_add(this)" type="button" id="add_popup" class="mb-2 mr-2 btn-transition btn btn-outline-primary">add</button></li>'
                            // console.log(temp)
                            document.getElementById('addrdisp').innerHTML = temp;
                        }
                        //gendisplay Address
                        Genaddr();
                        //add
                        function detailpopup_add() {
                            document.getElementById('id02_add').style.display = 'block';

                            var text = `<div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                add address
                            </div>
                            <span onclick="document.getElementById('id02_add').style.display='none'" class="close" title="Close Modal">×</span>
                        </div>
                        <div class="card-body">
                            
                                
                                <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="Address" placeholder="1234 Main St" type="text" class="form-control"></div>
                                <div class="position-relative form-group"><label for="exampleAddress2" class="">Address 2</label><input name="address2" id="Address2" placeholder="Apartment, studio, or floor" type="text" class="form-control">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="City" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="State" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleCountry" class="">Country</label><input name="country" id="Country" type="text" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="examplePostalCode" class="">PostalCode</label><input name="PostalCode" id="PostalCode" type="text" class="form-control"></div>
                                    </div>
                                </div>
                                <button class="mt-2 btn btn-primary" onclick="submitform()">Submit</button>
                            
                        </div>
                    </div>`;

                            document.getElementById("detailpop_add").innerHTML = text;
                        }
                        //edit
                        function detailpopup_edit(tag) {
                            document.getElementById('id02_edit').style.display = 'block';
                            var x = tag.getAttribute("id");
                            var addrLine1 = 0;
                            var addrLine2 = 0;
                            var city = 0;
                            var state = 0;
                            var country = 0;
                            var postalCode = 0;
                            var customerNumber = 0;
                            // console.log("show x",x);
                            json = ajaxget();
                            for (var i = 0; i < json.length; i++) {
                                if (json[i].mapNumber === x) {
                                    addrLine1 = json[i].addressLine1;
                                    addrLine2 = json[i].addressLine2;
                                    city = json[i].city;
                                    state = json[i].state;
                                    country = json[i].country;
                                    postalCode = json[i].country;
                                    customerNumber = json[i].customerNumber;
                                    console.log("mapnumber", json[i].mapNumber);
                                }
                            }

                            var text = `<div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                edit address
                            </div>
                            <span onclick="document.getElementById('id02_edit').style.display='none'" class="close" title="Close Modal">×</span>
                        </div>
                        <div class="card-body">
                            
                                
                                <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="Address" placeholder="1234 Main St" type="text" class="form-control" value="${addrLine1}"></div>
                                <div class="position-relative form-group"><label for="exampleAddress2" class="">Address 2</label><input name="address2" id="Address2" placeholder="Apartment, studio, or floor" type="text" class="form-control" value="${addrLine2}">
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="City" placeholder="Enter city" type="text" class="form-control" value="${city}"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="State" placeholder="Enter state" type="text" class="form-control" value="${state}"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="exampleCountry" class="">Country</label><input name="country" id="Country" type="text" placeholder="Enter country" class="form-control" value="${country}"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group"><label for="examplePostalCode" class="">PostalCode</label><input name="PostalCode" id="PostalCode" type="text" placeholder="Enter ZipCode class="form-control" value="${postalCode}"></div>
                                    </div>
                                </div>
                                <button class="mt-2 btn btn-warning" onclick="editform(${x},${customerNumber})">Edit</button>
                            
                        </div>
                    </div>`;

                            document.getElementById("detailpop_edit").innerHTML = text;
                        }
                        //delete
                        function detailpopup_delete(d) {
                            document.getElementById('id02_delete').style.display = 'block';
                            var x = d.getAttribute("id");
                            json = ajaxget();
                            if (json.length === 1) {
                                var text = `<div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                 Delete address
                            </div>
                            <span onclick="document.getElementById('id02_delete').style.display='none'" class="close" title="Close Modal">×</span>
                        </div>
                        <div class="text-center"> 
                        <div>
                        <div class="mb-4 mt-4"><h5>Cant delete that is a primary address must have at least one</h5><br><p>plase add more address before delete</p></div>
                        <div class="mb-4">
                        <button type="button" onclick="document.getElementById('id02_delete').style.display='none'" class="btn btn-primary">OK</button>
                        </div>
                        </div>
                    </div>`;

                                document.getElementById("detailpop_delete").innerHTML = text;
                            } else {
                                var text = `<div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                 Delete address
                            </div>
                            <span onclick="document.getElementById('id02_delete').style.display='none'" class="close" title="Close Modal">×</span>
                        </div>
                        <div class="text-center"> 
                        <div>
                        <div class="mb-4 mt-4"><h5>Are you sure ?</h5></div>
                        <div class="mb-4">
                        <button type="button" class="btn btn-primary" id="delbut" name="" onclick="deleteform(${x})">YES</button>
                        
                        <button type="button" onclick="document.getElementById('id02_delete').style.display='none'" class="btn btn-danger">Cancel</button>
                        </div>
                        </div>
                    </div>`;

                                document.getElementById("detailpop_delete").innerHTML = text;
                            }

                        }

                        function submitform() {
                            var Address = {
                                "addressLine1": document.getElementById("Address").value.toString(),
                                "addressLine2": document.getElementById("Address2").value.toString(),
                                "city": document.getElementById("City").value.toString(),
                                "state": document.getElementById("State").value.toString(),
                                "country": document.getElementById("Country").value.toString(),
                                "postalCode": document.getElementById("PostalCode").value.toString(),
                                "customerNumber": customerID.toString()
                            };
                            console.log("add", Address);
                            $.ajax({
                                type: "post",
                                url: "/customerAddr",
                                data: Address,
                                success: function(response) {
                                    //gennaddr
                                    Genaddr();
                                },
                                error: function(error) {
                                    alert(error.responseText);
                                    console.log(error.responseText);
                                }
                            });
                            document.getElementById('id02_add').style.display = 'none';
                        }

                        function editform(mapNumber, customerID) {
                            console.log("in edit", customerID);
                            var Address = {
                                "addressLine1": document.getElementById("Address").value.toString(),
                                "addressLine2": document.getElementById("Address2").value.toString(),
                                "city": document.getElementById("City").value.toString(),
                                "state": document.getElementById("State").value.toString(),
                                "country": document.getElementById("Country").value.toString(),
                                "postalCode": document.getElementById("PostalCode").value.toString(),
                                "customerNumber": customerID.toString(),
                                "mapNumber": mapNumber.toString()
                            };
                            console.log("edit", Address);
                            $.ajax({
                                type: "put",
                                url: "/customerAddrupdate/",
                                data: Address,
                                success: function(response) {
                                    //gennaddr
                                    Genaddr();
                                },
                                error: function(error) {
                                    alert(error.responseText);
                                    console.log(error.responseText);
                                }
                            });
                            document.getElementById('id02_edit').style.display = 'none';
                        }

                        function deleteform(mapNumber) {
                            $.ajax({
                                type: "post",
                                url: "/customerAddrdelete/" + mapNumber,
                                success: function(response) {
                                    //gennaddr
                                    Genaddr();
                                },
                                error: function(error) {
                                    alert(error.responseText);
                                    console.log(error.responseText);
                                }
                            });
                            document.getElementById('id02_delete').style.display = 'none';
                        }
                    </script>



                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                </div>
            </div>
            <script type="text/javascript" src="../assets/scripts/main.js"></script>

</body>

</html>