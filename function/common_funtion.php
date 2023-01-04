<?php 
    include_once('admin/includes/config.php');
    class CommonFunction {

        private $project_name ;

        function __construct($pname) {
            $this->project_name = $pname;
          }

        public function getURL(){
            $protocol = $_SERVER["REQUEST_SCHEME"];
            $host = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER["REQUEST_URI"] ;

            $url = $protocol."://". $host.$uri;
            return $url;
        }

        public function webUrl(){
            $protocol = $_SERVER["REQUEST_SCHEME"];
            $host = $_SERVER['HTTP_HOST'];
             $uri = $_SERVER["REQUEST_URI"] ;

            $url = $protocol."://". $host .'/'.$this->project_name ;
            
            return $url;
        }


        public function setTitle($title){
            $_SESSION["title"] = $title;
        }

        public function printR($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }

        public function tc($data){
            return ucwords($data);
        }
        
        public function lc($data){
            return strtolower($data);
        }

        public function uc($data){
            return strtoupper($data);
        }



        public function getTitle(){
            $temp = explode('/library-project/',$_SERVER["REQUEST_URI"])[1] ;
            $temp = explode('.php', $temp)[0];
            return ucwords($temp);

        }


    }

?>