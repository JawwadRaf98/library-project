<?php 

    class CommonFunction {

        public function getURL(){
            $protocol = $_SERVER["REQUEST_SCHEME"];
            $host = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER["REQUEST_URI"] ;

            $url = $protocol."://". $host.$uri;
            return $url;
        }
    }

?>