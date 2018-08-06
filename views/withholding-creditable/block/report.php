<div class="card">
    <div class="card">
	    <div role="tabpanel">
            <div class="tab-content special-tab-content">
                <div class="tab-pane active" id="report-detail-creditable-wt-report-form">
				    <div class="row card-body card-padding">
				    	<div class="report-pdf-loading" style="text-align: center; height: 200px;">
							<div class="preloader pl-xxl" style="vertical-align: middle; height: 100%;">
						        <svg class="pl-circular" viewBox="25 25 50 50">
						            <circle class="plc-path" cx="50" cy="50" r="20"></circle>
						        </svg>
						    </div>
                            
						</div>

					    <div class='myIframe hide'> 
                            <!-- dont load yet the PDF so dont put to src attribute -->
					        <iframe id="report-frame" data-src="<?php echo $pdfLink; ?>" allowfullscreen webkitallowfullscreen></iframe>
						</div>
					
				    </div>
                </div>
            </div>
	    </div>
	</div>
</div>
