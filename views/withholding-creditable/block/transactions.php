
			<div class="listview lv-bordered lv-lg">
			    <div class="lv-header-alt clearfix">
			        <h2 class="lvh-label hidden-xs" id="report-withholding-2307-creditable-count">0 Record(s)</h2>

			        <div class="lvh-search">
			            <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-withholding-2307-creditable-search">
			            <i class="lvh-search-close">×</i>
			        </div>
			        
			        <ul class="lv-actions actions">
			            <li class="user-admin">
			                <a 
			                 data-toggle="tooltip" 
			                 data-placement="top"
			                 data-original-title="Generate Report"
			                 class="rotate-image button-generate-report-wt-creditable-2307">
			                    <i class="zmdi zmdi-plus"></i>
			                </a>
			            </li>
			            <li>
			                <a href="" class="lvh-search-trigger" data-toggle="tooltip" data-placement="top" data-original-title="Search Report">
			                    <i class="zmdi zmdi-search"></i>
			                </a>
			            </li>
			           <!--  <li class="user-admin">
			                <a id="report-withholding-creditable-delete"
			                 data-toggle="tooltip" 
			                 data-placement="top"
			                 data-original-title="Delete Report">
			                    <i class="zmdi zmdi-delete"></i>
			                </a>
			            </li> -->

			            <li>
			                <a data-toggle="tooltip" data-placement="top" data-original-title="Refresh Table" id="report-withholding-creditable-refresh">
			                    <i class="zmdi zmdi-refresh-sync"></i>
			                </a>
			            </li>

			            <li class="dropdown">
			                <a href="" data-toggle="dropdown" aria-expanded="false">
			                    <i class="zmdi zmdi-more-vert"></i>
			                </a>
			                
			                <ul class="dropdown-menu dropdown-menu-right" id="report-withholding-2307-creditable-page">
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

			    <!-- <div class="table-responsive">
			        <table class="table" id="report-withholding-2307-creditable">
			            <thead>
			                <tr>            
			                    <th data-column-id="Name" data-formatter="data">Name</th>
			                    <th data-column-id="AddressName">Address</th>
			                    <th data-column-id="PhoneNumber">Contact</th>
			                    <th data-column-id="TaxNumber">TIN</th>
			                </tr>
			            </thead>
			            <tbody>
			            </tbody>
			        </table>
			    </div>
 -->
				<div class="row card-body card-padding table-responsive">
				    <table class="table bootgrid-table" id="report-withholding-2307-creditable">
				        <thead>
				            <tr>
				                <th data-column-id="id" data-visible="false" data-identifier="true" data-visibleInSelection="false">ID </th>
				                <th data-column-id="Name" data-width="200px;" data-sortable="true">VENDOR</th>
				                <th data-column-id="Date" data-width="100px;" data-formatter="date"  data-sortable="true">PAYMENT DATE</th>
				                <!-- <th data-column-id="ItemCode" data-width="100px;">ATC</th>
				                <th data-column-id="Description" >DESCRIPTION</th> -->
				                <th data-column-id="Quantity" data-formatter="quantity" data-sortable="false" data-align="right" data-width="100px;">TAX BASE</th>
				                <th data-column-id="LineAmount" data-formatter="amount" data-sortable="false" data-align="right" data-width="120px;">AMOUNT WITHHELD</th>

				                <th data-column-id="status_generated_date" data-formatter="date_generated" data-width="140px;">DATE & TIME GENERATED</th>
				                <th data-column-id="status_info" data-align="center" data-sortable="false"  data-formatter="status_info" data-width="100px;">STATUS</th>
				                <!-- <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-width="150px;">ACTION</th> -->
				            </tr>
				        </thead>
				        <tbody>

				        </tbody>
				    </table>
				</div>

			</div>
