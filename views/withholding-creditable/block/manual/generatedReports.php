
			<div class="listview lv-bordered lv-lg">
			    <div class="lv-header-alt clearfix">
			        <h2 class="lvh-label hidden-xs" id="report-withholding-2307-creditable-report-count">0 Record(s)</h2>

			        <div class="lvh-search">
			            <input type="text" placeholder="Start typing..." class="lvhs-input" id="report-withholding-2307-creditable-report-search">
			            <i class="lvh-search-close">×</i>
			        </div>
			        
			        <ul class="lv-actions actions">
			            <li class="wt-creditable-download-button">
			                <a 
			                 data-toggle="tooltip" 
			                 data-placement="top"
			                 data-original-title="Download Report"
			                 class="button-download-report-wt-creditable-2307">
			                    <i class="zmdi zmdi-download zmdi-hc-fw"></i>
			                </a>
			            </li>
			            <li class="wt-creditable-loading-button hide">
			                <a 
			                 data-toggle="tooltip" 
			                 data-placement="top"
			                 data-original-title="Downloading Report..."
			                 class="">
			                    <i class="zmdi zmdi-download zmdi-hc-fw" style="color: #4caf50 !important;"></i>
			                </a>
			            </li>
			            <li class="">
			                <a 
			                 data-toggle="tooltip" 
			                 data-placement="top"
			                 data-original-title="Email Report"
			                 class="button-email-report-wt-creditable-2307">
			                    <i class="zmdi zmdi-mail-send zmdi-hc-fw"></i>
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
			                
			                <ul class="dropdown-menu dropdown-menu-right" id="report-withholding-2307-creditable-report-page">
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
			        <table class="table" id="report-withholding-2307-creditable-report">
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
				    <table class="table bootgrid-table" id="report-withholding-2307-creditable-report">
				        <thead>
				            <tr>
				                <th data-column-id="id" data-visible="false" data-width="70px;" data-identifier="true" data-visibleInSelection="false">ID </th>
				                <th data-column-id="Vendor" data-width="250px;" data-sortable="true">VENDOR</th>
				                <th data-column-id="tin" data-width="250px;" data-formatter="tin"  data-sortable="false">TIN</th>
				                <th data-column-id="created_date" data-formatter="date_generated" data-width="140px;">DATE & TIME GENERATED</th>
				                <th data-column-id="status_info" data-align="center" data-formatter="status_info" data-width="100px;">STATUS</th>
				                <!-- <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-width="150px;">ACTION</th> -->
				            </tr>
				        </thead>
				        <tbody>

				        </tbody>
				    </table>
				</div>

			</div>


			<div class="modal fade in" id="wt-creditable-email-send-bulk" tabindex="-1" role="dialog" aria-hidden="true" data-ids="<?php echo $vendorIds; ?>">
			    <div class="modal-dialog" style="width: 85% !important;">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title">Compose Email </h4>
			            </div>

			            <div class="modal-body">
			                <div class="row">
			                	<div class="col-lg-6">

					                <div class="row body-email-empty-bulk hide">
					                    <div class="col-sm-12">
					                    <div class="alert alert-danger" role="alert">Oh snap! Don't leave your email's body empty.</div>
					                    </div>
					                </div>

				                    <div class="col-sm-12">
				                        <div class="form-group">    
				                            <label>From <span class="required-text">*</span></label> <small></small>
				                            <select class="selectpicker bs-select-hidden" id="batch-creditable-email-from-bulk">
				                                <option value="0">Select Item</option>
				                            </select>
				                        </div>
				                    </div>

				                   <!--  <div class="col-sm-12">
				                        <div class="form-group">    
				                            <label>To <span class="required-text">*</span></label> <small></small>
				                            <input type="email" data-role="tagsinput" class="form-control email-tagsinput-creditable wt-creditable-email-to" value="">
				                        </div>
				                    </div> -->
				                    <div class="col-sm-12">
				                        <div class="form-group">    
				                            <label>Subject <span class="required-text">*</span></label> <small></small>
				                            <input type="text" class="form-control" id="batch-creditable-email-subject-bulk" placeholder="What would be the subject of this email?" value="Form 2307 Certificate of Creditable Withholding Tax" disabled>
				                        </div>
				                    </div>
				                    <div class="col-sm-12">
				                        <br>
				                        <br>
				                        <div class="form-group">    
				                            <label>Body <span class="required-text"></span></label> <small></small>
				                            <div class="email-body-summernote-bulk"></div>
				                        </div>
				                    </div>
			                	</div>

			                	<div class="col-lg-6">
			                		
					                <div class="row body-to-empty-bulk hide">
					                    <div class="col-sm-12">
					                    <div class="alert alert-danger" role="alert">Oh snap! Dont leave email field empty!</div>
					                    </div>
					                </div>

				                    <p><strong>Note: </strong> Please make sure to add atleast one email address of the vendor to which to send the 2307 report. </p>

				                    <div class="col-sm-12">
				                        <div class="form-group">    
				                            <label>To <span class="required-text">*</span></label> 
				                            <ul class="list-vendor-emails">
		                                    </ul>

				                        </div>
				                    </div>

			                	</div>

			                </div>
			            </div>
			            <div class="modal-footer">
			                <button class="btn bgm-gray waves-effect" data-dismiss="modal">Cancel</button>
			                <button class="btn btn-primary waves-effect" id="send-batch-creditable-now-bulk" >Send</button>
			                
			            </div>
			        </div>
			    </div>
			</div>
