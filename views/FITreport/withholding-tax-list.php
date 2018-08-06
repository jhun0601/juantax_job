<?php include(APPPATH.'/views/common/header.php'); ?>
<?php include(APPPATH.'/views/common/top_menu.php'); ?>

<div class="block-header container-header">
    <ol class="breadcrumb breadcrums2 new-b-c">
        <li><a href="/app">Home</a></li>
        <li class="active">
            Withholding Tax (WT)
        </li>
    </ol>
    <ul class="tab-nav no-box-shadow"  id="tab-nab-wt">
        <li class="active">
        	<a href="#wt-monthly-tab" data-tab="monthly" data-toggle="tab">Monthly</a>
	    </li>
	    <li>
	        <a href="#wt-annual-tab" data-tab="annual" data-toggle="tab">Annual</a>
	    </li>
	    <!-- <li class="hide">
        	<a href="#wt-creditable-tab" data-tab="creditable" data-toggle="tab" title="Certificate of Creditable Tax Withholding">
        		2307 Form Quarterly</a>
	    </li> -->
	    <?php if($organization_type == 'manual') :?>
		    <li class="manual">
	        	<a href="#wt-2307-tab-manual" data-tab="creditable" data-toggle="tab" title="Certificate of Creditable Tax Withholding">
	        		2307 Form</a>
		    </li>
		<?php else : ?>
			<li class="xero">
	        	<a href="#wt-2307-tab" data-tab="creditable" data-toggle="tab" title="Certificate of Creditable Tax Withholding">
	        		2307 Form</a>
		    </li>
		<?php endif; ?>
    </ul>
</div>
<div class="card m-t-5">
	<div class="tab-content special-tab-content">
	    <div class="tab-pane active" id="wt-monthly-tab">
			<div class="listview lv-bordered lv-lg">
			    <div class="lv-header-alt clearfix">
			        <h2 class="lvh-label hidden-xs" id="report-withholding-tax-count">0 Record(s)</h2>

			        <div class="lvh-search">
			            <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-withholding-tax-search">
			            <i class="lvh-search-close">×</i>
			        </div>

			        <ul class="lv-actions actions">
			            <li class="user-admin">
			                <a
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Generate Report"
			                 class="rotate-image button-generate-report-wt-monthly">
			                    <i class="zmdi zmdi-plus"></i>
			                </a>
			            </li>
			            <li>
			                <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
			                    <i class="zmdi zmdi-search"></i>
			                </a>
			            </li>
			            <li class="user-admin">
			                <a id="report-withholding-tax-delete"
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Delete Report">
			                    <i class="zmdi zmdi-delete"></i>
			                </a>
			            </li>

			            <li>
			                <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-withholding-tax-refresh">
			                    <i class="zmdi zmdi-refresh-sync"></i>
			                </a>
			            </li>

			            <li class="dropdown">
			                <a href="" data-toggle="dropdown" aria-expanded="false">
			                    <i class="zmdi zmdi-more-vert"></i>
			                </a>

			                <ul class="dropdown-menu dropdown-menu-right" id="report-withholding-tax-page">
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
			        <table id="report-withholding-tax" class="table-condensed">
			            <thead>
			                <tr>
			                    <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
			                    <th data-column-id="title" data-formatter="data">Title</th>
			                    <th data-column-id="start">Month Range</th>
			                    <th data-column-id="created_by" data-sortable="false">Created By</th>
			                    <th data-column-id="status_info">Status</th>
			                    <th data-column-id="date_created" data-order="desc" data-formatter="date_created">Last Sync</th>
			                </tr>
			            </thead>
			            <tbody>

			            </tbody>
			        </table>
			    </div>
			</div>
	    </div>

	    <div class="tab-pane" id="wt-creditable-tab">
			<div class="listview lv-bordered lv-lg">
			    <div class="lv-header-alt clearfix">
			        <h2 class="lvh-label hidden-xs" id="report-withholding-creditable-count">0 Record(s)</h2>

			        <div class="lvh-search">
			            <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-withholding-creditable-search">
			            <i class="lvh-search-close">×</i>
			        </div>

			        <ul class="lv-actions actions">
			            <li class="user-admin">
			                <a
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Generate Report"
			                 class="rotate-image button-generate-report-wt-creditable">
			                    <i class="zmdi zmdi-plus"></i>
			                </a>
			            </li>
			            <li>
			                <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
			                    <i class="zmdi zmdi-search"></i>
			                </a>
			            </li>
			            <li class="user-admin">
			                <a id="report-withholding-creditable-delete"
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Delete Report">
			                    <i class="zmdi zmdi-delete"></i>
			                </a>
			            </li>

			            <li>
			                <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-withholding-creditable-refresh-">
			                    <i class="zmdi zmdi-refresh-sync"></i>
			                </a>
			            </li>

			            <li class="dropdown">
			                <a href="" data-toggle="dropdown" aria-expanded="false">
			                    <i class="zmdi zmdi-more-vert"></i>
			                </a>

			                <ul class="dropdown-menu dropdown-menu-right" id="report-withholding-creditable-page">
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
			        <table id="report-withholding-creditable" class="table-condensed">
			            <thead>
			                <tr>
			                    <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
			                    <th data-column-id="title" data-formatter="data">Title</th>
			                    <th data-column-id="start">Month Range</th>
			                    <th data-column-id="created_by" data-sortable="false">Created By</th>
			                    <th data-column-id="status_info">Status</th>
			                    <th data-column-id="date_created" data-order="desc" data-formatter="date_created">Last Sync</th>
			                </tr>
			            </thead>
			            <tbody>

			            </tbody>
			        </table>
			    </div>
			</div>
	    </div>

	    <div class="tab-pane" id="wt-annual-tab">
	        <div class="listview lv-bordered lv-lg">
			    <div class="lv-header-alt clearfix">
			        <h2 class="lvh-label hidden-xs" id="report-withholding-tax-annual-count">0 Record(s)</h2>

			        <div class="lvh-search">
			            <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-withholding-tax-annual-search">
			            <i class="lvh-search-close">×</i>
			        </div>

			        <ul class="lv-actions actions">
			            <li class="user-admin">
			                <a
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Generate Report"
			                 class="rotate-image button-generate-report-wt-annual">
			                    <i class="zmdi zmdi-plus"></i>
			                </a>
			            </li>
			            <li>
			                <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
			                    <i class="zmdi zmdi-search"></i>
			                </a>
			            </li>
			            <li class="user-admin">
			                <a href="" id="report-withholding-tax-annual-delete"
			                 data-toggle="tooltip"
			                 data-placement="top"
			                 data-original-title="Delete Report">
			                    <i class="zmdi zmdi-delete"></i>
			                </a>
			            </li>

			            <li>
			                <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-withholding-tax-annual-refresh">
			                    <i class="zmdi zmdi-refresh-sync"></i>
			                </a>
			            </li>

			            <li class="dropdown">
			                <a href="" data-toggle="dropdown" aria-expanded="false">
			                    <i class="zmdi zmdi-more-vert"></i>
			                </a>

			                <ul class="dropdown-menu dropdown-menu-right" id="report-withholding-tax-annual-page">
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
			        <table id="report-withholding-tax-annual" class="table-condensed">
			            <thead>
			                <tr>
			                    <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
			                    <th data-column-id="title" data-formatter="data">Title</th>
			                    <th data-column-id="year">Year</th>
			                    <th data-column-id="created_by" data-sortable="false">Created By</th>
			                    <th data-column-id="status_info">Status</th>
			                    <th data-column-id="date_created" data-order="desc" data-formatter="date_created">Last Sync</th>
			                </tr>
			            </thead>
			            <tbody>

			            </tbody>
			        </table>
			    </div>
			</div>

	    </div>
	    <!-- XERO -->
	    <div class="tab-pane" id="wt-2307-tab">
            <div class="tab-pane" id="settingsCodes">
                <?php include('withholding-creditable/creditables.php'); ?>
            </div>
	    </div>
	    <!-- MANUAL -->
	    <div class="tab-pane" id="wt-2307-tab-manual">
            <div class="tab-pane" id="settingsCodes">
                <?php include('withholding-creditable/creditables-manual.php'); ?>
            </div>
	    </div>
	</div>
</div>

<?php include(APPPATH.'/views/modal/modal-generate-creditable-wt.php'); ?>
<?php include(APPPATH.'/views/modal/modal-generate-report-fit.php'); ?>
<?php include(APPPATH.'/views/common/footer.php'); ?>
