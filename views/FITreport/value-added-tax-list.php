<?php include(APPPATH.'/views/common/header.php'); ?>
<?php include(APPPATH.'/views/common/top_menu.php'); ?>

<div class="block-header container-header">
    <ol class="breadcrumb breadcrums2 new-b-c">
        <li><a href="/app">Home</a></li>
        <li class="active">
            Value Added Tax (VAT)
        </li>
    </ol>
    <ul class="tab-nav" role="tablist" id="tab-nab-vat">
        <li class="active">
            <a href="#vat-monthly-tab" data-tab="monthly" data-toggle="tab">VAT</a>
        </li>
        <li>
            <a href="#vat-capital-tab" data-toggle="tab">Capital Goods</a>
        </li>
        <!-- <li>
            <a href="#vat-quarterly-tab" data-tab="quarterly" data-toggle="tab">Quarterly</a>
        </li> -->
    </ul>
</div>
<div class="card m-t-5">
    <div class="tab-content special-tab-content">

        <div class="tab-pane" id="vat-capital-tab">
            <div class="listview lv-bordered lv-lg">
                <div class="lv-header-alt clearfix">
                    <h2 class="lvh-label hidden-xs" id="report-capital-goods-count">0 Record(s)</h2>
                    <!-- SERACH BAR -->
                    <div class="lvh-search">
                        <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-capital-goods-search">
                        <i class="lvh-search-close">×</i>
                    </div>
                    
                    <ul class="lv-actions actions">
                        <li class="user-admin">
                            <a href="" id="report-capital-goods-dispose" 
                             data-toggle="tooltip" 
                             data-placement="top"
                             data-original-title="Dispose Item">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-capital-goods-refresh">
                                <i class="zmdi zmdi-refresh-sync"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-right" id="report-capital-goods-page">
                                <li class="active">
                                    <a href="" page="10">10 per page</a>
                                </li>
                                <li>
                                    <a href="" page="25">25 per page</a>
                                </li>
                                <li>
                                    <a href="" page="50">50 per page</a>
                                </li>
                                <li>
                                    <a href="" page="100">100 per page</a>
                                </li>
                                <li>
                                    <a href="" page="-1">All</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="table-responsive monthly-table">
                    <table id="report-capital-goods" class="table-condensed">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-formatter="check" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
                                <th data-column-id="description" data-formatter="data">Item</th>
                                <th data-column-id="date" data-formatter="date" >Date</th>
                                <th data-column-id="amount" data-align="right">Amount</th>
                                <!-- <th data-column-id="estimated_life" data-align="right">Estimated Life</th>
                                <th data-column-id="remaining_life" data-align="right">Remaining Life</th> -->
                                <th data-column-id="remaining_input_tax" data-align="right">Remaining Input Tax</th>
                                <th data-column-id="disposal_date" data-formatter="disposal_date" data-align="right">Disposal Date</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane active" id="vat-monthly-tab">
            <div class="listview lv-bordered lv-lg">
                <div class="lv-header-alt clearfix">
                    <h2 class="lvh-label hidden-xs" id="report-value-added-tax-count">0 Record(s)</h2>
                    <!-- SERACH BAR -->
                    <div class="lvh-search">
                        <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-value-added-tax-search">
                        <i class="lvh-search-close">×</i>
                    </div>
                    
                    <ul class="lv-actions actions">
                        <li class="user-admin">
                            <a id=""
                             data-toggle="tooltip" 
                             data-placement="top"
                             data-original-title="Generate Report"
                             class="rotate-image button-generate-report-vat-monthly">
                                <i class="zmdi zmdi-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                        <li class="user-admin">
                            <a href="" id="report-value-added-tax-delete" 
                             data-toggle="tooltip" 
                             data-placement="top"
                             data-original-title="Delete Report">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-value-added-tax-refresh">
                                <i class="zmdi zmdi-refresh-sync"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-right" id="report-value-added-tax-page">
                                <li class="active">
                                    <a href="" page="10">10 per page</a>
                                </li>
                                <li>
                                    <a href="" page="25">25 per page</a>
                                </li>
                                <li>
                                    <a href="" page="50">50 per page</a>
                                </li>
                                <li>
                                    <a href="" page="100">100 per page</a>
                                </li>
                                <li>
                                    <a href="" page="-1">All</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="table-responsive monthly-table">
                    <table id="report-value-added-tax" class="table-condensed">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-formatter="check" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
                                <th data-column-id="title" data-formatter="data" >Title</th>
                                <th data-column-id="start" >Period</th>
                                <th data-column-id="created_by">Created By</th>
                                <th data-column-id="status_info">Status</th>
                                <th data-column-id="date_created" data-formatter="date_created" data-order="desc">Last Sync</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane " id="vat-quarterly-tab">
            <div class="listview lv-bordered lv-lg">
                <div class="lv-header-alt clearfix">
                    <h2 class="lvh-label hidden-xs" id="report-value-added-tax-quarterly-count">
                        0 Record(s)
                    </h2>

                    <div class="lvh-search">
                        <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-value-added-tax-quarterly-search">
                        <i class="lvh-search-close">×</i>
                    </div>
                    
                    <ul class="lv-actions actions">
                        <li class="user-admin">
                            <a id=""
                             data-toggle="tooltip" 
                             data-placement="top"
                             data-original-title="Generate Report"
                             class="rotate-image button-generate-report-vat-quarterly">
                                <i class="zmdi zmdi-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
                                <i class="zmdi zmdi-search"></i>
                            </a>
                        </li>
                        <li class="user-admin">
                            <a href="" id="report-value-added-tax-quarterly-delete"
                             data-toggle="tooltip" 
                             data-placement="top"
                             data-original-title="Delete Report">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </li>

                        <li>
                            <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-value-added-tax-quarterly-refresh">
                                <i class="zmdi zmdi-refresh-sync"></i>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                <i class="zmdi zmdi-more-vert"></i>
                            </a>
                            
                            <ul class="dropdown-menu dropdown-menu-right" id="report-value-added-tax-quarterly-page">
                                <li class="active">
                                    <a href="" page="10">10 per page</a>
                                </li>
                                <li>
                                    <a href="" page="25">25 per page</a>
                                </li>
                                <li>
                                    <a href="" page="50">50 per page</a>
                                </li>
                                <li>
                                    <a href="" page="100">100 per page</a>
                                </li>
                                <li>
                                    <a href="" page="-1">All</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive monthly-table">
                    <table id="report-value-added-tax-quarterly" class="table-condensed ">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
                                <th data-column-id="title" data-formatter="data" >Title</th>
                                <th data-column-id="start">Month Range</th>
                                <th data-column-id="created_by" data-sortable="false">Created By</th>
                                <th data-column-id="status_info">Status</th>
                                <th data-column-id="date_created" data-formatter="date_created" data-order="desc">Last Sync</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH.'/views/modal/vat-disposal-modal.php'); ?>
<?php include(APPPATH.'/views/modal/modal-generate-report.php'); ?>
<?php include(APPPATH.'/views/common/footer.php'); ?>

            
        
