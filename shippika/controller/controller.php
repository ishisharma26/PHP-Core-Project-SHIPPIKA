<?php 

// session_start();
require_once("model/model.php");

 class controller extends model
 {
        public $baseurl = "http://localhost/php_practice/shipping project MVC/shippika/assets/";
        public function __construct()
        {
            parent::__construct();
            
            // echo "<pre>";
            // print_r($_SERVER); for checking the path of pages

            if(isset($_SERVER['PATH_INFO']))
            {

                switch($_SERVER['PATH_INFO'])
                {
                    case "/home":
                    require_once("view/header.php");    
                    require_once("view/home.php");
                    require_once("view/footer.php");
                    break;
                    
                    case "/register":
                        if(isset($_REQUEST['reg']))
                    {
                        $data = $_REQUEST;
                        $this->register($data);

                        header("location:login");
                    }
                    require_once("view/register.php");
                    break;

                    case "/login":
                    if(isset($_REQUEST['log']))
                    {
                        $data = $_REQUEST;
                        $this->login($data);

                    }
                    
                    require_once("view/login.php");
                    break;

                    case "/about":
                    require_once("view/header.php");    
                    require_once("view/about.php");
                    require_once("view/footer.php");
                    break;

                    case "/services":
                    require_once("view/header.php");    
                    require_once("view/services.php");
                    require_once("view/footer.php");
                    break;

                    case "/contact":
                    if(isset($_REQUEST['query']))
                    {   
                        $data = $_REQUEST;
                        $this->insert("queries",$data);

                    }
                    require_once("view/header.php");    
                    require_once("view/contact.php");
                    require_once("view/footer.php");
                    break;

                    case "/admin/adminhome":
                    require_once("view/admin/adminheader.php");
                    require_once("view/admin/adminhome.php");

                        
                    $this->count();
                        
                    break;

                    case "/admin/adminuser":
                        
                    require_once("view/admin/adminheader.php");
                    $fetch = $this->select("users");

                    if(isset($_REQUEST['delete_btn']))
                    {
                        $this->delete("users","$_REQUEST[delete_btn]");
                    }
                    require_once("view/admin/adminuser.php");
                    break;
                        
                    
                    case "/admin/adminqueries":
                    
                    
                    $fetch = $this->select("queries");
                    require_once("view/admin/adminheader.php");
                    require_once("view/admin/adminqueries.php");
                    break;


                    case "/airbooking":
                    if(isset($_REQUEST['airbook']))
                    {
                        
                        $data = $_REQUEST;
                        $this->insert("airbook",$data);
                    }
                    require_once("view/airbooking.php");
                    break;
                    
                    
                    case "/oceanbooking":
                        if(isset($_REQUEST['seabook']))
                    {
                            
                        $data = $_REQUEST;
                        $this->insert("seabook",$data);
                    }
                    require_once("view/oceanbooking.php");
                    break;

                    case "/admin/shippingorder":
                    
                    if(isset($_REQUEST['airorder']))
                    {
                        header("location:airorder");
                    }

                    
                    if(isset($_REQUEST['seaorder']))
                    {
                        header("location:seaorder");
                    }
                    
                    require_once("view/admin/adminheader.php");
                    require_once("view/admin/shippingorder.php");
                    
                    break;
                    
                    case "/admin/airorder":
                    $fetch = $this->select("airbook");                                
                    require_once("view/admin/adminheader.php");
                    require_once("view/admin/airorder.php");
                    break;

                    
                    case "/admin/seaorder":
                    $fetch = $this->select("seabook");                                
                    require_once("view/admin/adminheader.php");
                    require_once("view/admin/seaorder.php");
                    break;


                }

            }

            else
            {
                header("location:home");
            }

         }


 } 

        $controller = new controller;

?>