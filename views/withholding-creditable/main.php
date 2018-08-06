<?php include(APPPATH.'/views/common/header.php'); ?>
<?php include(APPPATH.'/views/common/top_menu.php'); ?>

<div class="block-header container-header">
    <ol class="breadcrumb breadcrums2 new-b-c pull-left">
        <li><a href="/app">Home</a></li>
        <li><a href="/bir/wt#wt-2307-tab">Form 2307</a></li>
        <li class="active" id="main-list-breadcrums">Vendor's Transactions</li>
    </ol>
    <div class="pull-right m-r-15 <?php echo $tinMissingHide; ?>" >
         <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">                
                <i class="zmdi zmdi-settings zmdi-hc-fw"></i> Options 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a class="pull-right" id="creditable-download-report" report-id="<?=$id;?>">
                       <i class="zmdi zmdi-download zmdi-hc-fw"></i> Download Report
                    </a>
                </li>
                <li>
                    <a class="pull-right" id="creditable-print-report"  report-id="<?=$id;?>">
                       <i class="zmdi zmdi-print zmdi-hc-fw"></i> Print Report
                    </a>
                </li>
                <li>
                    <a class="pull-right" id="creditable-send-email-compose"  report-id="<?=$id;?>">
                       <i class="zmdi zmdi-mail-send zmdi-hc-fw"></i> Send Email
                    </a>
                </li>
            </ul>
        </div>

    </div>    
    
    <div class="clearfix"></div>
    <ul class="tab-nav no-box-shadow" id="2307-tab-lists" role="tablist">
        <li class="active">
            <a href="#report-detail-transactions-wt" data-toggle="tab">
                Transactions
            </a>
        </li>
    
        <li class="<?php echo $tinMissingHide; ?>">
            <a href="#report-detail-report-creditable" data-toggle="tab" 
            sync-id="<?php echo $id; ?>">
                Report
            </a>
        </li>

        <li>
            <a href="#report-detail-activity-creditable" data-toggle="tab" 
            sync-id="<?php echo $id; ?>">
                Notes & Activities
            </a>
        </li>
    </ul>
</div>
              
<div class="tab-content special-tab-content">
    <div role="tabpanel" class="tab-pane active" id="report-detail-transactions-wt">
        <?php include('block/detail.php'); ?>
    </div>

    <div role="tabpanel" class="tab-pane " id="report-detail-report-creditable">
        <?php include(APPPATH.'/views/BIRreport/common/report.php'); ?>
    </div>

    <div role="tabpanel" class="tab-pane " id="report-detail-activity-creditable">
        <?php include(APPPATH.'/views/BIRreport/common/activity.php'); ?>
    </div>
</div>


<div class="modal fade in" id="modal-print-2307-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 680px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Print 2307 Report</h4>
            </div>

            <div class="modal-body">
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
                                    <iframe id="report-frame-wt" data-src="<?php echo $pdfLink; ?>" allowfullscreen webkitallowfullscreen></iframe>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn bgm-gray waves-effect modal-print-2307-report-hide" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade in" id="wt-creditable-email-send" tabindex="-1" role="dialog" aria-hidden="true" data-ids="<?php echo $vendorIds; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Compose Email </h4>
            </div>

            <div class="modal-body">

                <div class="row body-email-empty hide">
                    <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert">Oh snap! Don't leave your email's body empty.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">    
                            <label>From <span class="required-text">*</span></label> <small></small>
                            <select class="selectpicker bs-select-hidden" id="batch-creditable-email-from">
                                <option value="0">Select Item</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">    
                            <label>To <span class="required-text">*</span></label> <small></small>
                            <input type="email" data-role="tagsinput" class="form-control email-tagsinput-creditable wt-creditable-email-to" value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">    
                            <label>Subject <span class="required-text">*</span></label> <small></small>
                            <input type="text" class="form-control" id="batch-creditable-email-subject" placeholder="What would be the subject of this email?" value="Form 2307 Certificate of Creditable Withholding Tax" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <br>
                        <br>
                        <div class="form-group">    
                            <label>Body <span class="required-text"></span></label> <small></small>
                            <!-- <textarea rows="10" class="form-control" id="batch-creditable-email-body"></textarea> -->

                            <div class="email-body-summernote"></div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn bgm-gray waves-effect" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary waves-effect" id="send-batch-creditable-now" >Send</button>
                
            </div>
        </div>
    </div>
</div>


<?php include(APPPATH.'/views/modal/edit-creditable-wt.php'); ?>
<?php include(APPPATH.'/views/modal/send-batch-creditable.php'); ?>	
<?php include(APPPATH.'/views/modal/send-creditable.php'); ?>     
<?php include(APPPATH.'/views/modal/creditable-preview.php'); ?>
<?php include(APPPATH.'/views/BIRreport/common/add-note.php'); ?>
<?php include(APPPATH.'/views/common/footer.php'); ?>