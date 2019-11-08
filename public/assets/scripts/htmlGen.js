function tableGencus(i, col1, col2, col3, col4, code) {
    return `<tr>
    <td class="text-center text-muted"> ${i}</td>
    <td>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3">
                    <div class="widget-content-left">
                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg">
                        </div>
                    </div>
                    <div class="widget-content-left flex2">
                        <div class="widget-heading">${col1}</div>
                            <div class="widget-subheading opacity-7">${col2}</div>
                    </div>
                </div>
            </div>
        </td>
        <td class="text-center">${col3}</td>
        <td class="text-center">
            <div class="text-center">${col4}</div>
        </td>
        <td class="text-center">
            <button onclick="detailpopup(this)" type="button" id="${code}" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Detail</button>
    </td>
</tr>`
}

function tablecustomer(customerNumber, customerName, city, country, postalCode, contactFirstName, contactLastName, phone) {
    return ` 
    <tr>
            <td class="text-center text-muted"> ${customerNumber}</td>
            <td>
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        
                        <div class="widget-content-left flex2">
                            <div class="widget-heading">${customerName}</div>
                                <div class="widget-subheading opacity-7">${city}, ${country}, ${postalCode}</div>
                        </div>
                    </div>
            </td>
                <td class="text-center">${contactFirstName} ${contactLastName}</td>
                <td class="text-center">${phone}</td>                                                                
                <td class="text-center">
                <a href="customer/${customerNumber}"><button id="${customerNumber}" class="btn btn-primary btn-sm">Detail</button></a>
                <button class="btn btn-danger btn-sm"  id="${customerNumber}" onclick="delalert(this)">X</button>
                </td>
        </tr>`
}

function tableGenem(i, col1, col2, col3, col4, code) {
    return ` <tr>
    <td class="text-center text-muted"> ${i}</td>
    <td>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3">
                    <div class="widget-content-left ">
                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg">
                        </div>
                    </div>
                    <div class="widget-content-left flex2">
                        <div class="widget-heading">${col1}</div>
                            <div class="widget-subheading opacity-7">${col2}</div>
                    </div>
                </div>
            </div>
    </td>
        <td class="text-center">${col3}</td>
        <td class="text-center">
            <div class="text-center">${col4}</div>
        </td>

        <td class="text-center">
            <button class="btn btn-warning btn-sm" id="${code}" onclick="addToCart(this, 0)">+ <i class="pe-7s-shopbag"></i></button>
            <button onclick="detailpopup(this)" type="button" id="${code}" type="button" class="btn btn-primary btn-sm">Detail</button>
            <button class="btn btn-danger btn-sm"  id="${code}" onclick="delalert(this)">X</button>
        </td>
    </tr>`
}

function tableCart(i, col1, col2, col3, col4, col5, code) {
    return `<tr>
    <td class="text-center text-muted"> ${i}</td>
    <td>
        <div class="widget-content p-0">
            <div class="widget-content-wrapper">
                <div class="widget-content-left mr-3">
                    <div class="widget-content-left">
                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg">
                        </div>
                    </div>
                    <div class="widget-content-left flex2">
                        <div class="widget-heading">${col1}</div>
                        <div class="widget-subheading opacity-7">${col2}</div>
                    </div>
                </div>
            </div>
        </td>
        <td class="text-center">
            <div class="text-center">${col3}</div>
        </td>
        <td class="text-center">
            <div class="position-relative form-group"><input onchange="editQTY(this)" id="${code}" value="${col4}" placeholder="1" type="number" min="1" step="1" class="form-control"></div>
        </td>
        <td class="text-center">
            <div class="text-center">${col5}</div>
        </td>
        <td class="text-center">
            <button onclick="deleteFromCart(this)" class="btn btn-danger btn-sm"  id="${code}">X</button>
        </td>
</tr>`
}

function detailPopupGen(productCode, productName, productScale, productVendor, quantityInStock, MSRP, productLine, productDescription) {
    return `
    <div class="mb-3 card">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
            Product Detail
        </div>
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span> 
    </div>
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-md-auto">
                    <canvas id=canvas width="200" height="145.6" style="border:1px solid #000000;"></canvas>
                    </div>
                        <div class="col-md-auto">
                            <b>ProductCode:</b>
                                ${productCode}<br>
                            <b>ProductName:</b> 
                                ${productName}<br>
                            <b>ProductScale</b>
                                ${productScale}<br>
                            <b>ProductVendor:</b>
                                ${productVendor}<br>
                            <b>QTY:</b> 
                                ${quantityInStock}<br>
                            <b>Price:</b>
                                ${MSRP}<br>
                            <b>ProductLine:</b>
                                ${productLine}<br>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Descriptions</h5>
                            <p>
                                ${productDescription}
                            </P>              
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>`;
}
function tablestockin(stockNumber,stockDate,productCode,quantityOrdered,comments){
    return ` 
    <tr>
            <td class="text-center text-muted"> ${stockNumber}</td>
            <td> ${stockDate}</td>
                <td class="text-center">${productCode}</td>
                <td class="text-center">${quantityOrdered}</td>   
                <td class="text-center">${comments}</td>                                                             
                <td class="text-center">
                <a href="stockin/${stockNumber}"><button id="${stockNumber}" class="btn btn-primary btn-sm">Detail</button></a>
                <button class="btn btn-danger btn-sm"  id="${stockNumber}" onclick="delalert(this)">X</button>
                </td>
        </tr>`
}