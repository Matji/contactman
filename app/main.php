<?php

class contact
{
    private $conn = '';
    
    function __construct()
    {
          include 'db.php';
          $this->conn = new MySQLi($host, $user , $pass, $db); 
          if ($this->conn->connect_error) {
               die('Connect Error, '. $this->conn->connect_errno . ': ' . $this->conn->connect_error);
           } 
    }
     
    public function getAllContacts()
    { 
       return $this->findAll('tbl_contacts', '');
    } 
    
    public function viewContact($id)
    {
        return $this->findAll('tbl_contacts', array('id', '=', $id));
    }
    
    public function findContact($name)
    {
        return $this->findAll('tbl_contacts', array('name', 'like', $name));
    }
        
    public function addContact($name, $email, $phone)
    {
        $conn = $this->conn;
        $sql = "insert into tbl_contacts(name, email, phone) values(?, ?, ?)";
        $smt = $conn->prepare($sql);
        $smt->bind_param('sss', $name, $email, $phone);
        $smt->execute(); 
        if($conn->affected_rows > 0)
        {
            return 1;
        }      
        else
        {
            return 0;
        }
    }

    
    public function deleteContact($id)
    {
        $conn = $this->conn;
        $sql  = "delete from tbl_contacts where id = ?";
        $smt = $conn->prepare($sql);
        $smt->bind_param('i', $id);
        $smt->execute(); 
        
        if($conn->affected_rows > 0)
        {
            return 1;
        }      
        else
        {
            return 0;
        }          
    }
    
    public function updateContact($id, $name, $phone, $email)
    {
        $conn = $this->conn;
        $sql = "update tbl_contacts set name = ?, email = ?, phone = ? where id = ?";
        $smt = $conn->prepare($sql);
        $smt->bind_param('sssi', $name, $email, $phone, $id);
        $smt->execute(); 
        if($conn->affected_rows > 0)
        {
            return 1;
        }      
        else
        {
            return 0;
        }   
    }
    
    //this is just a re-usable function to handle all selects
    private function findAll($table, $arrExtra)
    {
          $conn = $this->conn;
          $resultData = array();
          $sql = "select * from ".$table;
          if($arrExtra!=null)
          {
             $sql.= " where ".$arrExtra[0]." ".$arrExtra[1]." ?"; 
          }        
          $smt = $conn->prepare($sql);
          if($arrExtra!=null)
          {
            $likeString = $arrExtra[2];
            if($arrExtra[1] == 'like')
            {
                $likeString = '%' . $arrExtra[2] . '%';
            }               
            $smt->bind_param('s', $likeString);  
          }          
          $smt->execute();
          $res = $smt->get_result();
          $count = 0;
          while($row = $res->fetch_array())
          {  
              $count++;
              array_push($resultData, array('id'=>$row['id'], 'name'=>$row['name'], 'email'=>$row['email'], 'phone'=>$row['phone']));
          }
          $result = array();
          if($count>0)
          {
              $result['success'] = 1;
              $result['data'] = $resultData;
          }
          return $result;       
    }
    
}

    $obj = new contact();
    $jsonResults = array();
    switch($_REQUEST['request'])
    {
        case 'getContacts' :  $jsonResults = $obj->getAllContacts();
            break;
        case 'viewContact' : $jsonResults = $obj->viewContact($_REQUEST['id']);
            break;
        case 'addContact' : $jsonResults = $obj->addContact($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['phone']);
            break;
        case 'findContact' :  $jsonResults = $obj->findContact($_REQUEST['name']);
            break;
        case 'deleteContact' :$jsonResults = $jsonResults = $obj->deleteContact($_REQUEST['id']);
            break;
        case 'updateContact' : $jsonResults = $obj->updateContact($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['phone']);
            break;
    }
    echo json_encode($jsonResults);
