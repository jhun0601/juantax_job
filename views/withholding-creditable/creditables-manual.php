<ul class="tab-nav" role="tablist">
    <li class="active">
        <a href="#creditableTransactionsManual" aria-controls="creditableTransactionsManual" role="tab" data-toggle="tab">
            Transactions
        </a>
    </li>
    <li>
        <a href="#creditableReportManual" aria-controls="creditableReportManual" role="tab" data-toggle="tab">
            Generated Reports
        </a>
    </li>
    <li>
        <a href="#creditableImportManual" aria-controls="creditableImportManual" role="tab" data-toggle="tab">
            Import Transaction
        </a>
    </li>
</ul>
  
<div class="tab-content" style="margin-top: -20px;">
    <div role="tabpanel" class="tab-pane active" id="creditableTransactionsManual">
        <?php include('block/manual/transactions.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="creditableReportManual">
        <?php include('block/manual/generatedReports.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="creditableImportManual">
        <?php include('block/manual/imports.php'); ?>
    </div>
</div>


<?php include(APPPATH.'/views/modal/edit-creditable-wt.php'); ?>
                 