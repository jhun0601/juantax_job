<div class="card">
    <div class="lv-header-alt clearfix">
        <h2 class="lvh-label hidden-xs c-black">To import transaction from another system please follow the steps below</h2>
    </div>  
    <div class="card-body card-padding">
        <div class="alert alert-danger alert-dismissible hide" id="error-one">
            <span class="fa fa-warning fa-4x pull-left"></span>
            <div class="pull-left">
                <h4>Error on uploading file</h4>
                <p id="error-one-text"></p>
            </div>
            <div class="clearfix"></div>
        </div>


        <div class="alert alert-danger alert-dismissible hide" id="wt-creditable-csv-wrong-header">
            <span class="fa fa-warning fa-4x pull-left"></span>
            <div class="pull-left">
                <h4 class="c-white">Import cannot be continue.</h4>
                <small>The transaction template used was invalid. Please use the template that we provide.</small> <br>
                <small>See <strong>Step 1</strong> for instruction regarding transaction template file downloading.</small>
            </div>
            <div class="clearfix"></div>
        </div> 



        <div class="alert alert-info alert-dismissible hide" id="wt-creditable-csv-process">
            <div class="alert-error-confirm f-14 m-b-20 hide" id="no-transaction">
                <h3 class="c-white">Import cannot be continue, no valid transaction found in the imported CSV. <br>Please look on the error message below to fix this message</h3>
            </div>

            <div class="alert-error-custom f-14">
                
            </div>

            <div class="alert-error-confirm f-14 hide" id="found-transaction">
                If you want to continue with this importing please click <b>"Continue Import"</b> button, or if you want to import a new csv file, just click the <b>"Browse"</b> button and <b>"Import"</b> again.
                <div class="pull-right m-t-30">
                    <button class="btn btn-primary" id="wt-creditable-import-continue">Continue Import</button>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div> 

        <div class="step-holder m-t-10 m-l-20">
            <h3>Step 1. Download our transaction template file</h3>
            <p>Start by downloading the template.</p>
            <div class="col-lg-6">
                <p>
                    <a href="">
                        <i class="fa fa-file-excel-o fa-lg"></i><b> Download template file for Creditable Withholdings</b>
                    </a>
                    <br><span class="m-l-20">- Required fields : (TIN, ATC, Payment Date, Amount)</span>
                </p>
                
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="step-holder m-t-10 m-l-20">
            <h3>Step 2. Copy your transaction into the template</h3>
            <p>
                Export your transaction from your old system as a comma separated list. Using Excel or another spreadsheet editor, copy and paste your transaction from the exported file into the template. Make sure the transaction data you copy matches the column headings provided in the template.
            </p>

            <p class="c-red">IMPORTANT: Do not change the column headings and filename in the template file. These need to be unchanged for the import to work in the next step.</p>
            
            <div class="clearfix"></div>
        </div>

        <div class="step-holder m-t-10 m-l-20">
            <h3>Step 3. Import the updated template file</h3>
            <p>Choose a file to import</p>
            
            <span class="btn btn-primary btn-file btn-sm">
                Browse<input type="file" id="wt-creditable-import-src">
            </span>
                <small class="file-selected"> No file selected </small>
            
            <p class="m-t-10">The file you import must be a CSV (Comma Separated Values) file.</p>
            
            <div class="clearfix"></div>

        </div>
        <div class="modal-footer">           

            <a href="#crm" class="btn bgm-gray waves-effect">Cancel</a>

            <button class="btn btn-primary waves-effect" type="submit" id="wt-creditable-import-now">Import Transaction</button>
        
        </div>
       
    
    </div>

     
       
    
</div>

 