

<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="lv-header-alt clearfix m-b-5">
                <h2 class="lvh-label hidden-xs c-black">Transactions</h2>

                <ul class="lv-actions actions">
                    <li>
                        <!-- <a data-toggle="tooltip" data-placement="top" data-original-title="Send Email" id="creditable-send-email-compose">
                            <i class="zmdi zmdi-mail-send"></i>
                        </a> -->

                        <a id="wt-transaction-creditable-table-delete" 
                         data-toggle="tooltip" 
                         data-placement="top"
                         data-original-title="Delete Report">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="true">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-right" id="wt-transaction-quarter-table-page">
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

            <div class="row card-body card-padding">
                <div class="col-lg-12">
                    <table class="table bootgrid-table" id="wt-transaction-creditable-table">
                        <thead>
                            <tr>
                                <th data-column-id="id" data-width="100px;" data-visible="false" data-identifier="true" data-type="numeric">ID </th>
                                <th data-column-id="Payments.Payment.Date"  data-formatter="date"  data-sortable="true">DATE</th>
                                <th data-column-id="ItemCode" data-formatter="transaction" >ATC</th>
                                <th data-column-id="Description" data-visible="false">DESCRIPTION</th>
                                <th data-column-id="UnitAmount" data-visible="false"></th>
                                <th data-column-id="Quantity" data-formatter="quantity" data-align="right" data-width="150px;" >TAX BASE</th>
                                <th data-column-id="LineAmount" data-formatter="amount" data-align="right" data-visible="true">TAX WITHHELD</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="col-lg-12" style="padding: 0px 0;">
            <div class="card">
                <div class="lv-header-alt clearfix m-b-5">
                    <h2 class="lvh-label hidden-xs c-black">Vendor's Detail</h2>
                </div>

                <div class="card-body card-padding" id="pt-report-detail">

                    <div class="form-group">
                        <label class="control-label textlabel">Name</label>
                        
                        <div class="fg-line">
                            <input readonly="" type="text" class="form-control input-sm" value="<?php echo $vendor['Name']; ?>">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="ontrol-label textlabel">TIN</label>    
                        <div class="fg-line">
                            <?php if(!isset($vendor['TaxNumber']) && $vendor['TaxNumber'] == '') {?>


                            <?php } else { ?>
                                <input readonly="" type="text" data-row-id="<?php echo $vendor['ContactID']; ?>" class="form-control input-sm" id="report-period-detail" value="<?php echo $vendor['TaxNumber']; ?>">
                            <?php }  ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label textlabel">Email Address</label>
                        <div class="fg-line">
                            <input readonly="" type="text" class="form-control input-sm" value="<?php echo (isset($vendor['EmailAddress'])) ? $vendor['EmailAddress'] : ''; ?>">

                            <br>
                            <br>
                            <button data-row-reload="1" data-row-id="<?php echo $vendor['ContactID'] ?>" class="btn bgm-green waves-effect pull-right edit-tin-wt-line" style="margin: -10px 0 -20px 0;">Edit</button>
                        </div>
                    </div>

                </div>
            </div>            
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="lv-header-alt clearfix m-b-5">
                <h2 class="lvh-label hidden-xs c-black">PDF Report Information <br>
                <small>Additional information for 2307 Report</small></h2>
            </div>

            <div class="row card-body card-padding">
                <div class="col-lg-3 m-t-30">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Select Signature</label>
                            <select class="form-control" id="report-payee-signature">
                                <option value="0">No Signature Selected</option>
                                <?php foreach($signature_list as $v) : ?>
                                    <?php 
                                        if(isset($other['payor-signature']) && $v['_id']->{'$id'} == $other['payor-signature']) {
                                            $selected = 'selected="selected"';

                                        } else {
                                            $selected = '';
                                        }
                                    ?>
                                    
                                    <option value="<?=$v['_id']->{'$id'};?>" <?=$selected?> >
                                        <?=$v['first_name'].' '.$v['last_name'];?>
                                        
                                    </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 m-t-20" style="border: 1px solid #e0e0e0; min-height: 70px">
                        <?php if(hasValue($other['signature_preview'])) : ?>
                            <img src="<?=$other['signature_preview'];?>" id="report-payee-signature-preview" style="width: 200px;margin-top: 10px;"/>
                        <?php else: ?>
                            <img src="<?=$other['signature_preview'];?>" id="report-payee-signature-preview" class="hide" style="width: 200px;margin-top: 10px;"/>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="col-lg-12 m-t-30">
                        <div class="form-group">
                            <label>Payor/Payor's Authorized Representative/Accredited Tax Agent</label>
                            <input type="text" class="form-control" id="report-payor-tax-agent" value="<?php echo isset($other['payor-tax-agent']) ? $other['payor-tax-agent'] : $user_current ; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 m-t-30">
                        <div class="form-group">
                            <label>TIN of Signatory </label>  <small></small>
                            <input type="text" class="form-control" id="report-payor-tin" data-mask="000-000-000-000"  value="<?php echo isset($other['payor-tin']) ? $other['payor-tin'] : '' ; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 m-t-30">
                        <div class="form-group">
                            <label>Title/Position of Signatory</label>
                            <input type="text" class="form-control" id="report-payor-title" value="<?php echo isset($other['payor-title']) ? $other['payor-title'] : '' ; ?>">
                        </div>
                    </div>
                </div>
            

                <div class="col-lg-12">
                    <div class="form-group m-t-30">
                        <label>Conforme:</label>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Payee/Payee's Authorized Representative/Accredited Tax Agent</label>
                            <input type="text" class="form-control" id="report-payee-tax-agent" value="<?php echo isset($other['payor-tax-agent']) ? $other['payor-tax-agent'] : $vendor['Name'] ; ?>">
                        </div>
                    </div>                
                </div>

                <div class="col-lg-12">
                    <div class="form-group m-t-30 pull-right">
                        <button class="btn bgm-green waves-effect" id="creditable-wt-save-signatory">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

