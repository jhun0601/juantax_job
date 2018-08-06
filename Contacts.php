<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Contacts extends MY_Controller{

    /* Constructor
    -------------------------------*/
    public function __construct() {

      parent::__construct();


      if($this->login->status() != 'app') {
          redirect(isLive() ? liveUrl($this->login->status()) : $this->login->status());
      }

    }

    /* Public Function
    -------------------------------*/
    public function index() {
      
        //prepare variables we need
        $data['css']        = $this->config->item('digong_css');
        $data['js']         = $this->config->item('digong_js');
        $data['js'][]       = '/assets/js/app/contacts.js';
        $data['org_name']    = $this->_orgInfo['LegalName'];
        $data['contacts']   = 'active';

        $data['user']     = loginData();
        // pre($data);exit;
        $this->load->view('contacts', $data);
    }

    public function contactActivity($id) {
        
        parent::post();

        $offset = (isset($_POST['current'])) ? $_POST['current'] : parent::OFFSET;
        $limit  = (isset($_POST['rowCount'])) ? $_POST['rowCount'] : parent::LIMIT;
        $search = (isset($_POST['searchPhrase']) && !empty($_POST['searchPhrase'])) ? $_POST['searchPhrase'] : '';

        //get member list
        $row = $this->contacts->getContactActivity($id, $_POST['sort'], $search, $offset, $limit);

        $row['current']  = (int)$offset;
        $row['rowCount'] = (int)$limit;

        //return json
        return $this->_returnRaw($row);
    }


    public function deleteContacts() {
        parent::post();
        foreach($_POST['items'] as $v) {
            //mark as archive
            $update = array(
                'status' => 0,
                'date_deleted' => strtotime('now'),
                'deleted_by' => loginId()
            );

            $this->contacts->deleteContact($update, $v);
        }
    return $this->_returnSuccess();
    }

    // listing of contacts
    public function getList(){
        parent::post();

        $offset = (isset($_POST['current'])) ? $_POST['current'] : parent::OFFSET;
        $limit  = (isset($_POST['rowCount'])) ? $_POST['rowCount'] : parent::LIMIT;
        $search = (isset($_POST['searchPhrase']) && !empty($_POST['searchPhrase'])) ? $_POST['searchPhrase'] : '';
        $row = $this->contacts->contactList($_POST['sort'], $search, $offset, $limit);
        $row['current']  = (int)$offset;
        $row['rowCount'] = (int)$limit;
        // pre($row);exit;
        return $this->_returnRaw($row);

    }
    /* 
    *
    */
    public function addContact() {
        parent::post();
        
        if($this->contacts->checkIfTinExist(loginOrg(), $_POST)) {
      
            return $this->_returnError('already_member', 'TIN is already Existing');
        }
        //To prevent XSS attack
        $_POST = array_map ('htmlspecialchars',$_POST);
        //Trim white space
        $_POST = array_map ('trim',$_POST);

        //Trim white space on the middle

        $_POST['first_name'] = preg_replace('/\s+/', ' ', $_POST['first_name']);
        $_POST['middle_name'] = preg_replace('/\s+/', ' ', $_POST['middle_name']);
        $_POST['last_name'] = preg_replace('/\s+/', ' ', $_POST['last_name']);
        $_POST['name'] = preg_replace('/\s+/', ' ', $_POST['name']);
        $_POST['address'] = preg_replace('/\s+/', ' ', $_POST['address']);
        $_POST['city'] = preg_replace('/\s+/', ' ', $_POST['city']);
        if($_POST['type']=='individual')
            $_POST['image']        = 'assets/img/grav.png';
        else
            $_POST['image']        = 'assets/img/nonindividual.png';
        $_POST['date_created']  = strtotime('now');
        $_POST['created_by']    = loginId();
        $_POST['status']        = 1;
        $_POST['org_id']        = loginOrg();

        $id = $this->contacts->addContact($_POST);

        $this->activity
            ->setTitle('Contact created')
            ->setAction('Created Contact')
            ->save(self::CONTACTS, $id);

      return $this->_returnSuccess();
    }



    public function updateContactSummary($id){
  
        //To prevent XSS attack
        $_POST = array_map ('htmlspecialchars',$_POST);
        //Trim white space
        $_POST = array_map ('trim',$_POST);

        //Trim white space on the middle

        $_POST['date_updated'] = strtotime('now');
        $this->contacts->updateContact($_POST, $id);


            $this->activity
                ->setTitle('Contact updated')
                ->setAction('Updated Contact')
                ->save(self::CONTACTS, $id);  

        return $this->_returnSuccess();
    }

    public function updateContact($id){
        $a = $this->contacts->checkIfTinExistUpdate(loginOrg(), $_POST, $id);
        if($a) {
            return $this->_returnError('already_member', 'TIN is already Existing');
        }
        //To prevent XSS attack
        $_POST = array_map ('htmlspecialchars',$_POST);
        //Trim white space
        $_POST = array_map ('trim',$_POST);

        //Trim white space on the middle
        $_POST['first_name'] = preg_replace('/\s+/', ' ', $_POST['first_name']);
        $_POST['middle_name'] = preg_replace('/\s+/', ' ', $_POST['middle_name']);
        $_POST['last_name'] = preg_replace('/\s+/', ' ', $_POST['last_name']);
        $_POST['name'] = preg_replace('/\s+/', ' ', $_POST['name']);
        
        $_POST['date_updated'] = strtotime('now');
        $this->contacts->updateContact($_POST, $id);

            $this->activity
                ->setTitle('Contact updated')
                ->setAction('Updated Contact')
                ->save(self::CONTACTS, $id);  

        //update
        $this->manual->updateContactRefVat($id);
        $this->manual->updateContactRefWt($id);

        return $this->_returnSuccess();
    }


    public function updateContactAddress($id){
  
        //To prevent XSS attack
        $_POST = array_map ('htmlspecialchars',$_POST);
        //Trim white space
        $_POST = array_map ('trim',$_POST);

        //Trim white space on the middle
        $_POST['address'] = preg_replace('/\s+/', ' ', $_POST['address']);

        $_POST['date_updated'] = strtotime('now');
        $this->contacts->updateContact($_POST, $id);


            $this->activity
                ->setTitle('Contact updated')
                ->setAction('Updated Contact')
                ->save(self::CONTACTS, $id);  

        return $this->_returnSuccess();
    }


    public function updateContactContact($id){
  
        //To prevent XSS attack
        $_POST = array_map ('htmlspecialchars',$_POST);
        //Trim white space
        $_POST = array_map ('trim',$_POST);

        //Trim white space on the middle
        $_POST['phone'] = preg_replace('/\s+/', ' ', $_POST['phone']);

        $_POST['date_updated'] = strtotime('now');
        $this->contacts->updateContact($_POST, $id);


            $this->activity
                ->setTitle('Contact updated')
                ->setAction('Updated Contact')
                ->save(self::CONTACTS, $id);  

        return $this->_returnSuccess();
    }

    //loading for about on editing
    public function info($id){
        $data['css']        = $this->config->item('digong_css');
        $data['js']         = $this->config->item('digong_js');
        $data['js'][]     = '/assets/js/app/contactDetail.js';
        $data['contacts']       = 'active';
        $data['user']     = loginData();
        $data['org_name']    = $this->_orgInfo['LegalName'];
        $data['info'] = $this->contacts->contactInfo($id);

        if(!isset($data['info']['image'])) {
            if($data['info']['type'] == 'individual')
                $data['info']['image'] = 'assets/img/grav.png';
            else
                $data['info']['image'] = 'assets/img/nonindividual.png';
        }

        $this->load->view('contactDetails', $data);
    }
  
    public function saveImport($importId) {
        $where = array('_id' => new MongoId($importId));
        $row = $this->cimongo
            ->get_where('temp_contactImport', $where)
            ->row_array();

            $data = array();

        foreach($row['data'] as $k => $v) {
        //To prevent XSS attack
        $first_name = htmlspecialchars($v['first_name']);
        $middle_name = htmlspecialchars($v['middle_name']);
        $last_name = htmlspecialchars($v['last_name']);
        $name = htmlspecialchars($v['name']);
        $address = htmlspecialchars($v['address']);
        $city = htmlspecialchars($v['city']);
        $area_code = htmlspecialchars($v['area_code']);

        //Trim white space on the beginning, middle and end of a string
        $first_name = trim($first_name);
        $first_name = preg_replace('/\s+/', ' ', $first_name);

        $middle_name = trim($middle_name);
        $middle_name = preg_replace('/\s+/', ' ', $middle_name);

        $last_name = trim($last_name);
        $last_name = preg_replace('/\s+/', ' ', $last_name);

        $name = trim($name);
        $name = preg_replace('/\s+/', ' ', $name);

        $address = trim($address);
        $address = preg_replace('/\s+/', ' ', $address);

        $city = trim($city);
        $city = preg_replace('/\s+/', ' ', $city);

        $area_code = trim($area_code);
        $area_code = preg_replace('/\s+/', ' ', $area_code);

            if($v['type'] == 'Individual'){
                $data[] = array(
                    //from import
                    'type'       => 'individual',
                    'name'       => '',
                    'first_name' => $first_name,
                    'middle_name'=> $middle_name,
                    'last_name'  => $last_name,
                    'address'    => $address,
                    'city'       => $city,
                    'country'    => $v['country'],
                    'postal'     => $v['postal'],
                    'area_code'  => $area_code,
                    'phone'      => $v['phone'],
                    'email'      => $v['email'],
                    'tin'        => $v['tin'],
                    //default info
                    'date_created' => strtotime('now'),
                    'created_by'   => loginId(),
                    'status'       => 1,
                    'org_id'       => loginOrg()
                );
            } else{
                $data[] = array(
                    'type'       => 'nonindividual',
                    'name'       => $name,
                    'first_name' => '',
                    'middle_name'=> '',
                    'last_name'  => '',
                    'address'    => $address,
                    'city'       => $city,
                    'country'    => $v['country'],
                    'postal'     => $v['postal'],
                    'area_code'  => $area_code,
                    'phone'      => $v['phone'],
                    'email'      => $v['email'],
                    'tin'        => $v['tin'],
                    //default
                    'date_created' => strtotime('now'),
                    'created_by'   => loginId(),
                    'status'       => 1,
                    'org_id'       => loginOrg()
                );
            }
        }

        $count = count($data);

        $this->cimongo->insert_batch(MY_Model::CONTACTS, $data);

        return $this->_returnSuccess();
    }

    //viewing of contact import
    public function import(){
        $data['css']        = $this->config->item('digong_css');
        $data['js']         = $this->config->item('digong_js');
        $data['js'][]     = '/assets/js/app/contactImport.js';
        $data['org_name']    = $this->_orgInfo['LegalName'];
        $data['contacts']       = 'active';
        $data['user']     = loginData();

        $this->load->view('contactImport', $data);

    }

    public function importProcess(){

        //convert csv to array
        $row  = array_map('str_getcsv', file($_FILES['file']['tmp_name']));
        $csv  = Array();

        $head = $row[0];
        $col  = count($row[0]);
        unset($row[0]);
        //change key as header per array
        foreach($row as $k => $value) {
            $row_colcount = count($value);
            if($row_colcount == $col) {
                $csv[] = array_combine($head, $value);
            }
        }
        return $this->parseContact($csv);
    }

    public function parseContact($csv){

        $errorCount = 0;
        $successCount = 0;
        $errorMessage = array();
        $row = 1;
        $errorRow ='';

            $countryChecker = array(
                'Afghanistan',
                'Albania',
                'Algeria',
                'Angola',
                'Argentina',
                'Armenia',
                'Australia',
                'Austria',
                'Azerbaijan',
                'Bahamas',
                'Bahrain',
                'Bangladesh',
                'Barbados',
                'Belarus',
                'Belgium',
                'Bermuda',
                'Bhutan',
                'Bolivia',
                'Botswana',
                'Brazil',
                'Brunei Darussalam',
                'Bulgaria',
                'Cambodia',
                'Cameroon',
                'Canada',
                'Cape Verde',
                'Cayman Islands',
                'Central African Republic',
                'Chad',
                'Chile',
                'China',
                'Christmas Island',
                'Colombia',
                'Congo',
                'Cook Islands',
                'Costa Rica',
                'Croatia',
                'Cuba',
                'Cyprus',
                'Czech Republic',
                'Denmark',
                'Dominica',
                'Dominican Republic',
                'East Timor',
                'Ecuador',
                'Egypt',
                'Eritrea',
                'Estonia',
                'Ethiopia',
                'Finland',
                'France',
                'Georgia',
                'Germany',
                'Greece',
                'Greenland',
                'Guam',
                'Guatemala',
                'Guinea',
                'Haiti',
                'Honduras',
                'Hong Kong',
                'Hungary',
                'Iceland',
                'India',
                'Indonesia',
                'Iran',
                'Iraq',
                'Ireland',
                'Israel',
                'Italy',
                'Jamaica',
                'Japan',
                'Jordan',
                'Kazakhstan',
                'Kenya',
                'Kuwait',
                'Kyrgyzstan',
                'Lao',
                'Latvia',
                'Lebanon',
                'Liberia',
                'Libya',
                'Lithuania',
                'Luxembourg',
                'Macau',
                'Macedonia',
                'Madagascar',
                'Malaysia',
                'Maldives',
                'Mali',
                'Malta',
                'Mauritius',
                'Mexico',
                'Micronesia',
                'Mongolia',
                'Morocco',
                'Mozambique',
                'Myanmar',
                'Nepal',
                'Netherlands',
                'New Zealand',
                'Nicaragua',
                'Nigeria',
                'North Korea',
                'Norway',
                'Oman',
                'Pakistan',
                'Palau',
                'Panama',
                'Papua New Guinea',
                'Paraguay',
                'Peru',
                'Philippines',
                'Poland',
                'Portugal',
                'Puerto Rico',
                'Qatar',
                'Romania',
                'Russia',
                'Rwanda',
                'Samoa',
                'Saudi Arabia',
                'Senegal',
                'Sierra Leone',
                'Singapore',
                'Slovakia',
                'Slovania',
                'Solomon Islands',
                'Somalia',
                'South Africa',
                'South Georgia',
                'South Korea',
                'Spain',
                'Sri Lanka',
                'Sudan',
                'Sweden',
                'Switzerland',
                'Syria',
                'Taiwan',
                'Tajikistan',
                'Tanzania',
                'Thailand',
                'Tunisia',
                'Turkey',
                'Turkmenistan',
                'Uganda',
                'Ukraine',
                'United Arab Emirates',
                'United Kingdom',
                'United States',
                'Uruguay',
                'Uzbekistan',
                'Venezuela',
                'Vietnam',
                'Western Sahara',
                'Yemen',
                'Yugoslavia',
                'Zambia',
                'Zimbabwe'
            );

        $tinChecker = array();

        foreach($csv as $k => $v) {
            $row++;
            $lineError      = false;
            $lineMessage    = array();

            $v['country'] = strtolower($v['country']);
            
            // $newPhone = (int) $v['Phone'];
            $allows = array('-', '(', ')','+',' ');
            $replace   = array('','', '', '', ''    );
            $newPhone = str_replace($allows, $replace, $v['Phone']);
            // $subsPhone = substr($newPhone, -7);
            // $newTIN = str_replace('-', '', $v['TIN']);
            $newTIN = str_replace('-', '', $v['TIN']);
            // $arrTIN = explode('-', $v['TIN']);
 
            if(empty($v['Organization Type'])) {
                $lineError = true;
                $lineMessage[] = '<b>Organizational Type</b> is a required field';
            } else{
              if($v['Organization Type'] == 'Individual'){
                if(empty($v['First Name'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>First Name</b> is a required field';
                } 

                if(empty($v['Last Name'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>Last Name</b> is a required field';
                    }
                } else if($v['Organization Type'] == 'Non-Individual'){
                if(empty($v['Organization Name'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>Organization Name</b> is a required field';
                    }
                }
                else{
                    $lineError = true;
                    $lineMessage[] = '<b>Organizational Type</b> must be Individual or Non-Individual';
                    }
                }            

                if(empty($v['Address'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>Address</b> is a required field';
                } 

                if(empty($v['City'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>City</b> is a required field';
                }

                if(empty($v['Country'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>Country</b> is a required field';
                }

                if(!empty($v['Country']) && !in_array(ucwords($v['Country']), $countryChecker)) {
                    $lineError = true;
                    $lineMessage[] = '<b>Country</b> is not existing';
                }

                if(empty($v['Postal'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>Postal</b> is a required field';
                }

                if(!empty($v['Phone']) && (!ctype_digit($newPhone) || strlen($newPhone) <= 7)) {
                    $lineError = true;
                    $lineMessage[] = '<b>Phone</b> is invalid';
                } else{
                    if($v['Country'] == 'Philippines'){
                        $areaCode = substr($newPhone, 0,(strlen($newPhone)-7));
                        if(strlen($areaCode) > 3){
                            $lineError = true;
                            $lineMessage[] = '<b>Phone</b> is invalid';
                        } else{
                            $phone = substr($newPhone, -7);
                        } 
                    } else{
                        $areaCode = '00';
                        $phone = str_replace($allows, $replace, $v['Phone']);
                    }
                }


                if(empty($v['TIN'])) {
                    $lineError = true;
                    $lineMessage[] = '<b>TIN</b> is a required field';
                }

                if(in_array($v['TIN'], $tinChecker)) {
                    $lineError = true;
                    $lineMessage[] = '<b>TIN</b> is already existing in this file';
                }


                if(in_array((substr($newTIN,0,3).'-'.substr($newTIN,3,3).'-'.substr($newTIN,6,3).'-'.substr($newTIN,9)),$tinChecker)) {
                    $lineError = true;
                    $lineMessage[] = '<b>TIN</b> is already exiting in this file'; 
                }

                if(!empty($v['TIN']) && (strlen($newTIN) !=12 && strlen($newTIN) !=13 || !ctype_digit($newTIN))) {
                    $lineError = true;
                    $lineMessage[] = '<b>TIN</b> is not valid' ;
                }

                if($this->contacts->checkTin(loginOrg(), substr($newTIN,0,3).'-'.substr($newTIN,3,3).'-'.substr($newTIN,6,3).'-'.substr($newTIN,9))) {
                    $lineError = true;
                    $lineMessage[] = '<b>TIN</b> is already existing';
                }

                if(!empty($v['Email']) && !filter_var($v['Email'], FILTER_VALIDATE_EMAIL)){
                    $lineError = true;
                    $lineMessage[] = '<b>Email</b> is invalid';
                }

                if($lineError) {
                    $errorCount++;
                    $errorRow .= $row.', ';
                    $errorMessage[] = array(
                        'line'      => ($k + 2),
                        'message'   => $lineMessage
                    );
                } else{
                    $successCount++;
                    $transaction[] = array(
                        'type'          => $v['Organization Type'],
                        'first_name'    => $v['First Name'],
                        'middle_name'   => $v['Middle Name'],
                        'last_name'     => $v['Last Name'],
                        'name'          => $v['Organization Name'],
                        'address'        => $v['Address'],
                        'city'        => $v['City'],
                        'country'        => ucwords($v['Country']),
                        'postal'        => $v['Postal'],
                        'area_code'     => $areaCode,
                        'phone'         => $phone,
                        'email'         => $v['Email'],
                        'tin'           => substr($newTIN,0,3).'-'.substr($newTIN,3,3).'-'.substr($newTIN,6,3).'-'.substr($newTIN,9)
                    );
                }

            $tinChecker[] = $v['TIN']; //check if the tin is existing in this file
            
        } //end of for each
        
        $this->cimongo->insert('temp_contactImport', array(
            'data' => $transaction
        ));
        
        $lastInsert = $this->cimongo->insert_id();
        $id = $lastInsert->{'$id'};
        
        $main = array(
            'id'            => $id,
            'success'       => $successCount,
            'error'         => $errorCount,
            'error_message' => $errorMessage,
            'total'         => count($csv)
        );
        
        unset($tinChecker);
        return $this->_returnData($main);
    }

    /**
       * Get the basic information for update
       * 
       * @param  id
       * @return json
       */
    public function getBasicInformation($id) {

        $select = array('type','first_name', 'middle_name', 'last_name', 'name', 'address', 'city', 'postal', 'country', 'area_code','phone', 'tin', 'email');

        $info = $this->contacts->contactInfo($id, $select);

        return $this->_returnData($info);

    }

    /**
    * Get the basic information for update
    * 
    * @param  id
    * @return json
    */
    public function getContactsAddress($id) {

        $select = array('address','city','postal','country');

        $info = $this->contacts->contactInfo($id, $select);

        return $this->_returnData($info);

    }

    /**
    * Get the basic information for update
    * 
    * @param  id
    * @return json
    */
    public function getContactsContact($id) {

        $select = array('phone', 'email');

        $info = $this->contacts->contactInfo($id, $select);

        return $this->_returnData($info);

    }

    /**
    * Get the basic information for update
    * 
    * @param  id
    * @return json
    */
    public function getContactsSummary($id) {

        $select = array('summary');

        $info = $this->contacts->contactInfo($id, $select);

        return $this->_returnData($info);

    }

    /**
    * Change user profile image
    * 
    * @param string
    * @return this
    */
    public function changePhoto($id) {
        
        //create path
        $targetPath = 'assets/uploads/contacts/'.$id.'/primary_img/';

        //if no directory yet
        if (!is_dir($targetPath)) {
            //we create
            mkdir($targetPath, 0777, true);
        }

        $targetPath = $targetPath.$_FILES[0]['name'];
        //now move the files
        $success = move_uploaded_file($_FILES[0]['tmp_name'], $targetPath);

        if($success) {
            //update contacts
            $update = array('image' => $targetPath, 'date_updated' => strtotime('now'));
            //update contacts for the new image path
            $this->contacts->updateContact($update, $id);

            $this->activity
            ->setTitle('Change Profile Photo')
            ->setAction('Updated Profile Picture')
            ->save(self::CONTACTS, $id);
        }

        $data = array(
                'path'      => $targetPath
            );

        return $this->_returnData($data);
    }


}