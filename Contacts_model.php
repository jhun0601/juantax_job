<?php //-->

class Contacts_model extends MY_Model {

    /* Constants
    -------------------------------*/
    /* Public Properties
    -------------------------------*/

    /* Protected Properties
    -------------------------------*/

    /* Private Properties
    -------------------------------*/

    /* Public Properties
    -------------------------------*/

    /* Constructor
    -------------------------------*/
    public function __construct() {

        parent::__construct();


    }

    
    public function addContact($data) {

        $this->cimongo->insert(self::CONTACTS, $data);
        $object = $this->cimongo->insert_id();
      
        $id = $object->{'$id'};
        return $id;
    }

    public function contactInfo($id,$select=array()){


        $data = $this->cimongo
            ->select($select)
            ->get_where(self::CONTACTS, array(
                '_id' => new MongoId($id)))
            ->row_array();
    
        return $data;
    }

    //
    // /**
    //  * Update signature column
    //  *
    //  * @param array
    //  * @param string
    //  * @return this
    //  */
    public function updateContact($update, $id) {
        $where = array('_id' => new MongoId($id));
        return $this->cimongo
            ->where($where)
            ->update(self::CONTACTS, $update);

    }
 

    /**
     * Get contact listing
     *
     * @param string
     * @param string
     * @param string|int
     * @param string|int
     * @return array
     */
     public function contactList($order, $search, $offset, $limit) {

        $where = array(
            'status' => array('$nin' => array(0, '0')),
            'org_id' => loginOrg(),
        );
        //search query
        if(!empty($search)) {
            $query = urldecode($search);
            $where['$or'][]['name'] = array('$regex' => new MongoRegex('/.*'.$query.'.*/i'));
            $where['$or'][]['first_name'] = array('$regex' => new MongoRegex('/.*'.$query.'.*/i'));
            $where['$or'][]['last_name'] = array('$regex' => new MongoRegex('/.*'.$query.'.*/i'));
            $where['$or'][]['type'] = array('$regex' => new MongoRegex('/.*'.$query.'.*/i'));
            $where['$or'][]['tin'] = array('$regex' => new MongoRegex('/.*'.$query.'.*/i'));
        }

        $list = $this->cimongo
            ->get_where(self::CONTACTS, $where, $limit, ((int)$offset - 1) * 10)
            ->result_array();

        $row['rows'] = array();

        foreach($list as $k => $v) {

            $createdBy = $this->user->detail($v['created_by'], array('name'));

            if($v['address']=='') {
                $address = '---';
            } else {
                $address = $v['address'].' '.$v['city'].' '.$v['country'].', '.$v['postal'];
            }

            if($v['date_updated'] == '') {
                $date = '';
            } else {                
                $date = date($v['date_updated']); 
            }

            if($v['type'] == 'individual') {
                $image = ($v['image'] == '') ? '/assets/img/grav.png' : $v['image'];
                $name = $v['last_name'].', '.$v['first_name'];
            } else {
                $image = ($v['image'] == '') ? '/assets/img/nonindividual.png' : $v['image'];
                $name = $v['name'];
            }


            $row['rows'][$k] = array(
                'id'            => $v['_id']->{'$id'},
                'img'           => '<img class="img-responsive" style="width: 50px;" src="'.$image.'" alt="">',
                'type'          => $v['type'],
                'name'          => $name,
                'address'       => $address,
                'phone'         => $v['phone'],
                'tin'           => $v['tin'],
                'email'         => $v['email'],
                'created_by'    => $createdBy['name'],
                'date_updated'  => $date
            );
            
        }
        $row['total'] = $this->cimongo
            ->where($where)
            ->count_all_results(self::CONTACTS);

        return $row;
    }


    public function getContactActivity($id, $order, $search, $offset, $limit) { 

        $where = array('table_id' => $id);        
   
        $offsetCount = ($limit * ($offset - 1)); 
        $list = $this->cimongo
            ->order_by($order)
            ->select(array('date_created', 'action', 'created_by'))
            ->get_where(self::ACTIVITY_HISTORY, $where, $limit, ((int)$offset - 1) * 10)
            ->result_array();
        foreach($list as $k => $v) {

            $name = $v['created_by']['first_name'].' '.$v['created_by']['last_name'];
            
            $list[$k]['id'] = $v['_id']->{'$id'};
            $list[$k]['action'] = ucfirst($v['action']);
            $list[$k]['name'] = $name;

        }


        $row['rows'] = $list;
        
        $row['total'] = $this->cimongo
            ->where($where)
            ->count_all_results(self::ACTIVITY_HISTORY);

        return $row;      
    }


    public function deleteContact($update, $id) {
        $where = array('_id' => new MongoId($id));
        $this->cimongo
            ->where($where)
            ->update(self::CONTACTS, $update);

        return $this;
    }

    public function checkIfTinExist($orgId,$data) {
        $where = array(
            'org_id' => $orgId,
            'tin'   => $data['tin'],
        );

        $row = $this->cimongo
            ->get_where(self::CONTACTS, $where)
            ->row_array();

        return empty($row) ? false : true;
    }

     public function checkIfTinExistUpdate($orgId,$data,$id) {
        $where = array(
            'org_id' => $orgId,
            'tin'   => $data['tin']
        );

        $row = $this->cimongo
            ->get_where(self::CONTACTS, $where)
            ->row_array();

        //If id and tin from the parameter are the same with the result on the db call, it should save 

        if($row['_id'] == $id && $row['tin'] == $data['tin']) {
            $result = false;
        }
        else if($row['_id'] != $id && $row['tin'] == $data['tin']) {
            $result = true;
        }
        else {
            $result = false;
        }


        return $result;
    }


    // checking tin for importing csv
    public function checkTin($orgId,$tin) {

          $where = array(
            'org_id' => $orgId,
            'tin'   => $tin,
        );

        $row = $this->cimongo
            ->get_where(self::CONTACTS, $where)
            ->row_array();

        return empty($row) ? false : true;

    }

    public function checkClassification($data, $importation) {

        $error = false;

        if(!empty($importation)) {
            foreach ($data as $key => $value) {
                $contact = $this->report->getContactInfo($key);
                if(!isset($contact['type'])  && !in_array($contact['ContactID'], $importation)) {
                    $error = true;
                }
            }
        } else {
            foreach ($data as $key => $value) {
                $contact = $this->report->getContactInfo($key);
                if(!isset($contact['type'])) {
                    $error = true;
                }
            }
        }

        return $error;


        $row = $this->cimongo
            ->get_where(self::CONTACTS, $where)
            ->row_array();

        return empty($row) ? false : true;
    }

    /**
     * DB call to get user login
     *
     * @param string
     * @param string
     * @return array
     */
    public function detail($id, $select = array()) {
        $where = array(
            '_id' => new MongoId($id),
            'status' => 1
        );
        if(!empty($select)) {
            return $this->cimongo
                ->select($select)
                ->get_where(self::CONTACTS, $where)
                ->row_array();
        } 
        return $this->cimongo
            ->get_where(self::CONTACTS, $where)
            ->row_array();
    }
}






