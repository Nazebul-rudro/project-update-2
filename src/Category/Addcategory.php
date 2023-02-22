

<?php
use rudhro\Category;
use rudhro\Helper;

class Addcategory{



    public function __construct()
    {
        
    }

    public function store($insertdata){
        // database connection 
        $db = new Helper;
        $db->dbconnection();
        print_r($insertdata);

    }



}


?>