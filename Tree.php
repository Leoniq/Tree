<?php

use conf\DB;

class Tree {

    private $nodes;
    public $cats = array();
    
    public function __construct() {
        $this->connect = new DB();
        $this->nodes = $this->connect->query("SELECT * FROM root ORDER BY id");
    }
           
    /**
     * outputTree is recursion
     */
    public function outputTree($cats,$parent_id) {
        foreach($this->nodes as $cat) {
            $this->cats[$cat['id_parent']][] = $cat;
        }
        
        if(isset($this->cats[$parent_id])) {
            echo "<ul>";
            foreach($this->cats[$parent_id] as $cat) {
                echo "<li><i>".$cat['root_name']."</i>
                      <span title='add node' id=".$cat['id']." onclick=addNode(this)>+</span> 
                      <span title='delete node' id=".$cat['id']." onclick=delNode(this)>-</span>";
                    $this->outputTree($this->cats,$cat['id']);
                echo "</li>";
            }
            echo "</ul>";
        }
        else return null;
    }
}
?>