function tableGencus(i,col1,col2,col3,col4,code){
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


function tableGenem(i,col1,col2,col3,col4,code){
    return ` <tr>
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
            <button onclick="detailpopup(this)" type="button" id="${code}" type="button" class="btn btn-primary btn-sm">Detail</button>
            <button class="btn btn-danger btn-sm"  id="${code}" onclick="delalert(this)">X</button>
        </td>
    </tr>`
}

function detailPopupGen(Description){
    return `
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
                                ${Description}
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
function test(dd){
    return "test"+dd;
}