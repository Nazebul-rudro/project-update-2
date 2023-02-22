<?php

namespace rudhro\Category;

use rudhro\Helper;

class Category
{


    public function __construct()
    {

        session_start();
    }

    

    public function index()
    {
        // db connection
        $db = new Helper;
        $db->dbconnection();

        // sql connection
        $sql = "SELECT * FROM categorylists";
        $stmt = $db->prearesql($sql);
        // $stm = $conn->prepare($sql);
        $result= $stmt->execute();
        if($result){
            $data = $stmt->fetchAll();
            return $data;
        }
    }


    public function update($updatedata)
    {

        // $bookname = $updatedata["bookname"];
        // $authorname = $updatedata["authorname"];
        // $discription = $updatedata["discription"];
        // $price = $updatedata["price"];
        // $id = $updatedata['id'];

        // $data =[
        //     'bookname' => $bookname,
        //     'authorname' => $authorname,
        //     'discription' => $discription,
        //     'price' => $price
        // ];

        // $db = new Helper;
        // $db->dbconnection();

        // $sql = "UPDATE booklists SET bookname=:bookname, authorname=:authorname, discription=:discription, price=:price WHERE id=$id";

        // $stmt= $db->prearesql($sql);
        // $stmt->execute($data);

    }


    public function store($insertdata)
    {

        print_r($insertdata);
        @$c_name = $insertdata['c_name'];
        @$c_details = $insertdata['c_details'];

        $adddata = [
            'c_name' => $c_name,
            'c_details' => $c_details,
        ];



        if (!empty($c_name && $c_details)) {
            $_SESSION['category_add_massage'] = "Category Add Successfully";
            // db conncection
            $db = new Helper;
            $db->dbconnection();

            // sql connection
            $sql = "INSERT INTO categorylists(c_name, c_details) VALUES(:c_name, :c_details)";

            // prepare connection
            $stmt = $db->prearesql($sql);
            // $stm = $conn->prepare($sql);
            $stmt->execute($adddata);
            header('Location: indexcetegory.php');
        }
    }
    public function show()
    {
    }
    public function delete()
    {
    }
}
