<style>
#bir-report-activity-wt img {    
    border-radius: 50%;
    width: 50px;
    height: 50px;
}

</style>
<div class="card">
	<div class="lv-header-alt clearfix m-b-5">
	    <h2 class="lvh-label hidden-xs" id="bir-report-activity-wt-count">0 Record(s)</h2>

	    <div class="lvh-search">
	        <input type="text" placeholder="Start typing..." class="lvhs-input" id="bir-report-activity-wt-search">
	        <i class="lvh-search-close">×</i>
	    </div>
	    
	    <ul class="lv-actions actions">
	    	<li>
                <a class="rotate-image add-note-show" data-toggle="tooltip" data-placement="left" data-original-title="Add Note" >
                    <i class="zmdi zmdi-plus"></i>
                </a>
            </li>
	        <li>
	            <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search">
	                <i class="zmdi zmdi-search"></i>
	            </a>
	        </li>
	        
	        <li>
	            <a href="" data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="bir-report-activity-wt-refresh">
	                <i class="zmdi zmdi-refresh-sync"></i>
	            </a>
	        </li>

	        <li class="dropdown">
	            <a href="" data-toggle="dropdown" aria-expanded="false">
	                <i class="zmdi zmdi-more-vert"></i>
	            </a>
	            
	            <ul class="dropdown-menu dropdown-menu-right" id="bir-report-activity-wt-page">
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
	            </ul>
	        </li>
	    </ul>
	</div>
	<div class="table-responsive">
	    <table class="table" id="bir-report-activity-wt" type="<?php echo $type; ?>" for-what="<?php echo $for_what; ?>" >
	        <thead>
	            <tr>
	                <th data-column-id="list" class="" data-formatter="list"></th>
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
	</div>

</div>



