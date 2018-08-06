<style>
.details-payment-title {
        text-transform: uppercase;
    font-size: 14px;
    padding-top: 10px;
}
.details-payment-head {
    background-color: #fff;
    vertical-align: middle;
    font-weight: 500;
    color: #333;
    border-width: 1px;
    text-transform: uppercase;
}
#report-detail-info-detail .pmbb-view {
    margin-left: 50px; margin-right: 50px;
}

.a-c-t {
    text-align: center;
}
.m-t-10 {
        margin-top: 10px;
}

#report-mark-filed {
    margin-left: 60px;
    margin-right: 60px;
}
#report-mark-filed h3 {color:white}
#pt-report-detail label {
    font-weight: 400;
}
#pt-report-detail .form-group {
    margin-bottom: 30px
}
</style>

<div class="row wt-table-creditable-report" id="<?php echo $id; ?>">
    <div class="col-lg-12 <?php echo $tinMissing; ?>" style="margin-top: -35px;">
        <div class="card">
            <div class="alert alert-danger m-t-30" id="wt-creditable-missing-tin">
                <i class="zmdi zmdi-alert-circle-o zmdi-hc-fw pull-left warning-icon-left"></i> <h4>2307 Report cannot be completed.</h4>
                <p>The vendor for this report doesn't have TIN. Please make sure to fill it up so you can complete the 2307. You can edit the vendor's information on the Vendor's Detail section by clicking the "EDIT" button. </p>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <?php include('items.php'); ?>
    </div>
</div>