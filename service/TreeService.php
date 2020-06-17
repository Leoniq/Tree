<?php

namespace service;
use conf\DB;

class TreeService {

    public $connect;
    public $countRec;
    public $nodes;            
    public $cats = array();
    
    function __construct() {
        $this->connect = new DB();
    } 
    
    public function createRoot() {
        $this->countRec = $this->connect->query("SELECT COUNT(*) FROM root")->fetchColumn();
        if($this->countRec == false) {
            $this->connect->query("INSERT INTO root VALUE (NULL, 'ROOT', 0)");
        }
    }
    
    public function createNode($id_parent) {
        $this->connect->query("INSERT INTO root VALUES (NULL, 'root', $id_parent)");
    }
    
    /**
     * deleteNode is a recursion
     */
    public function deleteNode($cats,$parent_id) {

        $this->nodes = $this->connect->query("SELECT * FROM root");
        
        foreach($this->nodes as $del) {
            $this->cats[$del['id_parent']][] = $del;
        }
        
        if(isset($this->cats[$parent_id])) {
            foreach($this->cats[$parent_id] as $del) {
                $this->deleteNode($this->cats,$del['id']);
                $this->connect->query("DELETE FROM root WHERE id_parent='$del[id_parent]' OR id='$del[id_parent]'");                  
            }
        }
        else $this->connect->query("DELETE FROM root WHERE id='$parent_id'");;
    }
}
?>