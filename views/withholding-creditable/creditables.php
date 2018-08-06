<ul class="tab-nav" role="tablist">
    <li class="active">
        <a href="#creditableTransactions" aria-controls="creditableTransactions" role="tab" data-toggle="tab">
            Transactions
        </a>
    </li>
    <li>
        <a href="#creditableReport" aria-controls="creditableReport" role="tab" data-toggle="tab">
            Generated Reports
        </a>
    </li>
</ul>
  
<div class="tab-content" style="margin-top: -20px;">
    <div role="tabpanel" class="tab-pane active" id="creditableTransactions">
        <?php include('block/transactions.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="creditableReport">
        <?php include('block/generatedReports.php'); ?>
    </div>
</div>


<?php include(APPPATH.'/views/modal/edit-creditable-wt.php'); ?>
                 