<?php include(APPPATH.'/views/common/header.php'); ?>
<?php include(APPPATH.'/views/common/top_menu.php'); ?>
<style>
#report-profit-and-loss th[data-column-id='title'] {
    width: 200px;
}
</style>
<div class="block-header container-header">
    <ol class="breadcrumb breadcrums2 new-b-c">
        <li><a href="/app">Home</a></li>
        <li class="active">
            Percentage Tax Return (PT)
        </li>
    </ol>
    <ul class="tab-nav no-box-shadow">
        <li class="active">
            <a href="#monthly-profitAndLoss" data-toggle="tab">Monthly</a>
        </li>
    </ul>
</div>
<div class="card m-t-5">
    <div class="listview lv-bordered lv-lg">
        <div class="lv-header-alt clearfix m-b-5">
            <h2 class="lvh-label hidden-xs" id="report-profit-and-loss-count">0 Record(s)</h2>

            <div class="lvh-search">
                <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-profit-and-loss-search">
                <i class="lvh-search-close">×</i>
            </div>
            
            <ul class="lv-actions actions">
                <li class="user-admin">
                    <a 
                     data-toggle="tooltip" 
                     data-placement="top"
                     data-original-title="Generate Report"
                     class="rotate-image button-generate-report">
                        <i class="zmdi zmdi-plus"></i>
                    </a>
                </li>
                <li>
                    <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
                <li class="user-admin">
                    <a href="" id="report-profit-and-loss-delete" 
                     data-toggle="tooltip" 
                     data-placement="top"
                     data-original-title="Delete Report">
                        <i class="zmdi zmdi-delete"></i>
                    </a>
                </li>

                <li>
                    <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-profit-and-loss-refresh">
                        <i class="zmdi zmdi-refresh-sync"></i>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="false">
                        <i class="zmdi zmdi-more-vert"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right" id="report-profit-and-loss-page">
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

        <div class="table-responsive">
            <table id="report-profit-and-loss" class="table-condensed">
                <thead>
                    <tr>
                        <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
                        <th data-column-id="title" data-formatter="data">Title</th>
                        <th data-column-id="start">Month Range</th>
                        <th data-column-id="created_by" data-sortable="false">Created By</th>
                        <th data-column-id="status_info">Status</th>
                        <th data-column-id="date_created"  data-order="desc" data-formatter="date_created">Last Sync</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include(APPPATH.'/views/modal/modal-generate-report.php'); ?>
<?php include(APPPATH.'/views/common/footer.php'); ?>
