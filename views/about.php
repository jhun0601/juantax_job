
<div class="pmb-block block-basic" id="summary-information" >
    <div class="pmbb-header">
        <h2><i class="zmdi zmdi-info zmdi-hc-lg" style="color: #555;"></i> Summary</h2>
        <ul class="actions">
            <li class="dropdown">
                <a href="" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a data-pmb-action="edit" href="" id="detail-contact-summary-edit">Edit Summary</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pmbb-body p-l-30">
        <div class="pmbb-view">
                <dd id="summary-contact"> <?=show($info['summary'], 'NO INFO SET'); ?></dd>
        </div>
        <div class="pmbb-edit">
                 <textarea class="form-control" placeholder = "Summary..." id="summary-contact-input" rows = "3"></textarea>
            <div class="m-t-30">
                <button class="btn bgm-blue waves-effect" id="detail-contact-summary-save">Save</button>
                <button class="btn bgm-gray waves-effect" data-pmb-action="reset">Cancel</button>
            </div>
        </div>
    </div>


</div>
<div class="pmb-block block-basic" id="basic-information" >
    <div class="pmbb-header">
        <h2><i class="zmdi zmdi-account zmdi-hc-lg" style="color: #555;"></i> Basic Information</h2>
        <ul class="actions">
            <li class="dropdown">
                <a href="" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a data-pmb-action="edit" href="" id="detail-contact-basic-edit">Edit Basic Information</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pmbb-body p-l-30">
        <div class="pmbb-view">

            <dl class="dl-horizontal">
                <dt>Organization Type</dt>
                <dd id="detail-contact-basic-type-1"><?php if($info['type']=='individual') echo 'Individual'; if($info['type']=='nonindividual') echo 'Non-Individual'; ?></dd>
            </dl>

            <div id="orgtype_individual-disp" <?php if($info['type']=="nonindividual") echo 'style="display:none"'; ?> >
                <dl class="dl-horizontal">
                    <dt>First Name</dt>
                    <dd id="detail-contact-basic-first_name-1"><?=show($info['first_name']);?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Middle Name</dt>
                    <dd id="detail-contact-basic-middle_name-1"><?=show($info['middle_name']);?></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Name</dt>
                    <dd id="detail-contact-basic-last_name-1"><?=show($info['last_name']);?></dd>
                </dl>
            </div>

            <div id="orgtype_corporation-disp" <?php if($info['type']=="individual") echo 'style="display:none"'; ?>>
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd id="detail-contact-basic-corp_name-1"><?=show($info['name']);?></dd>
                </dl>
            </div>

            <dl class="dl-horizontal">
                <dt>TIN</dt>
                <dd id="detail-contact-basic-tin-1" data-mask="000-000-000-0000"><?=show($info['tin']);?></dd>
            </dl>
           
        </div>

        <div class="pmbb-edit">

            <dl class="dl-horizontal">
                <dt class="p-t-10">Organization Type <font color="red">*</font></dt>
                <dd>

                        <select class="form-control" class="selectpicker" id="detail-contact-basic-type-2" onchange="changeOrgType(this.value)">
                            <option value="individual" <?php if(show($info['type'])=="individual") echo 'selected="selected"'; ?>>Individual</option>
                            <option value="nonindividual" <?php if(show($info['type'])=="nonindividual") echo 'selected="selected"'; ?>>Non-Individual</option>
                        </select>
                </dd>
            </dl>
            <div id="orgtype_individual-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">First Name  <font color="red">*</font></dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="detail-contact-basic-first_name-2" value="<?=show($info['first_name']);?>">
                        </div>
                    </dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt class="p-t-10">Middle Name</dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="detail-contact-basic-middle_name-2" value="<?=show($info['middle_name']);?>">
                        </div>
                    </dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt class="p-t-10">Last Name  <font color="red">*</font></dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="detail-contact-basic-last_name-2" value="<?=show($info['last_name']);?>">
                        </div>
                    </dd>
                </dl>
            </div>
            <div id="orgtype_corporation-edit">
                <dl class="dl-horizontal">
                    <dt class="p-t-10">Name  <font color="red">*</font></dt>
                    <dd>
                        <div class="fg-line">
                            <input type="text" class="form-control" id="detail-contact-basic-corp_name-2" value="<?=show($info['name']);?>">
                        </div>
                    </dd>
                </dl>
            </div>

            <dl class="dl-horizontal">
                <dt class="p-t-10">TIN  <font color="red">*</font></dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-basic-tin-2" data-mask="000-000-000-0000" maxlength="16" value="<?=show($info['tin']);?>">
                    </div>
                    <small class="help-block"></small>
                </dd>
            </dl>

            <div class="m-t-30">

                <button class="btn bgm-blue waves-effect" id="detail-contact-basic-save">Save</button>
                <button class="btn bgm-gray waves-effect" data-pmb-action="reset">Cancel</button>
            </div>
        </div>
    </div>


</div>

<div class="pmb-block block-basic" id="address-information" >
    <div class="pmbb-header">
        <h2><i class="zmdi zmdi-pin zmdi-hc-lg" style="color: #555;"></i> Address Information</h2>
        <ul class="actions">
            <li class="dropdown">
                <a href="" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a data-pmb-action="edit" href="" id="detail-contact-address-edit">Edit Address</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pmbb-body p-l-30">
        <div class="pmbb-view">

            <dl class="dl-horizontal">
                <dt>Address</dt>
                <dd id="detail-contact-address"><?=show($info['address']);?></dd>
            </dl>
             <dl class="dl-horizontal">
                <dt>City</dt>
                <dd id="detail-contact-city"><?=show($info['city']);?></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Postal</dt>
                <dd id="detail-contact-postal"><?=show($info['postal']);?></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Country</dt>
                <dd id="detail-contact-country"><?=show($info['country']);?></dd>
            </dl>

        
        </div>

        <div class="pmbb-edit">

            <dl class="dl-horizontal">
                <dt class="p-t-10">Address  <font color="red">*</font></dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-address-input" value="<?=show($info['address']);?>">
                    </div>
                </dd>
            </dl>
             <dl class="dl-horizontal">
                <dt class="p-t-10">City  <font color="red">*</font></dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-city-input" value="<?=show($info['city']);?>">
                    </div>
                </dd>
            </dl>

            <dl class="dl-horizontal">
                <dt class="p-t-10">Postal  <font color="red">*</font></dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-postal-input" data-mask="0000" maxlength="4" value="<?=show($info['postal']);?>">
                    </div>
                </dd>
            </dl>

            <dl class="dl-horizontal">
                <dt class="p-t-10">Country <font color="red">*</font></dt>
                <dd>
                  <select id="detail-contact-basic-country-2" class="selectpicker" data-live-search="true">
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia (Hrvatska)</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Lao">Lao</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines" selected>Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Samoa">Samoa</option> 
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Georgia">South Georgia</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Viet Nam</option>
                                    <option value="Western Sahara">Western Sahara</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Yugoslavia">Yugoslavia</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option> 
                                </select>
                </dd>
            </dl>


            <div class="m-t-30">

                <button class="btn bgm-blue waves-effect" id="detail-contact-address-save">Save</button>
                <button class="btn bgm-gray waves-effect" data-pmb-action="reset">Cancel</button>
            </div>
        </div>
    </div>


</div>


<div class="pmb-block block-basic" id="contact-information" >
    <div class="pmbb-header">
        <h2><i class="zmdi zmdi-phone zmdi-hc-lg" style="color: #555;"></i> Contact Information</h2>
        <ul class="actions">
            <li class="dropdown">
                <a href="" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a data-pmb-action="edit" href="" id="detail-contact-contact-edit">Edit Contact</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="pmbb-body p-l-30">
        <div class="pmbb-view">

            <dl class="dl-horizontal">
                <dt>Phone</dt>
                <dd id="detail-contact-phone"><?=show($info['phone']);?></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Email</dt>
                <dd id="detail-contact-email"><?=show($info['email']);?></dd>
            </dl>
        
        </div>

        <div class="pmbb-edit">

            <dl class="dl-horizontal">
                <dt class="p-t-10">Phone  <font color="red">*</font></dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-phone-input" data-mask="00000000000" value="<?=show($info['phone']);?>">
                    </div>
                    <small class="help-block"></small>
                </dd>
            <dl class="dl-horizontal">
                <dt class="p-t-10">Email</dt>
                <dd>
                    <div class="fg-line">
                        <input type="text" class="form-control" id="detail-contact-email-input" value="<?=show($info['email']);?>">
                    </div>
                    <small class="help-block"></small>
                </dd>
            </dl>
            </dl>


            <div class="m-t-30">

                <button class="btn bgm-blue waves-effect" id="detail-contact-contact-save">Save</button>
                <button class="btn bgm-gray waves-effect" data-pmb-action="reset">Cancel</button>
            </div>
        </div>
    </div>


</div>

