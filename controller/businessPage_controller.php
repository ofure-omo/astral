<?php

class businessPageController {

    public function readAll() {
        // we store all the posts in a variable
        $businessPageId = businessPage::all();
        require_once('views/business/readAll.php');
    }

    public function read() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['business_id'])) {
            return call('pages', 'error');
        }
//
//        try {
//            $business_id = $_GET['business_id'];
//            // we use the given id to get the correct post
////            $businessPage = Blog::find($_GET['business_id']);
////            $likes = Blog::getlikes($_GET['blog_id']);
////            $comment_count = Blog::getCommentCount($_GET['blog_id']);
////            $tag = Blog::findTagForBlog($_GET['blog_id']);
////            $list = Blog::moreBlogs();
////            $fav_count = Blog::favCount($blog_id);
////            if($blog['layout'] === '1'){
////            require_once('views/blogpost/read.php'); 
////            
////            } 
//            else {             
//            require_once('views/blogpost/read2.php');
//            }
            
//        } catch (Exception $ex) {
            return call('pages', 'error');
        }
        
//    }

    public function create() {

        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['loggedin'])) {

            $tag = Blog::getTag();
            require_once('views/business/create.php');
        } else {
            Blog::add();
            //function for: insert into tags values (tag) where tag = :tag AND where blog_id = lastinserted blog_id
        }
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {


            if (!isset($_GET['business_id'])) 
            return call('pages', 'error');            

//            $tag = Blog::findTagForBlog($_GET['blog_id']); // we use the given id to get the correct product
//            $tags = Blog::getTag(($_GET['blog_id']));
//            $blog = Blog::find($_GET['blog_id']);

            require_once('views/business/update.php');
        } else {

            $businessPageId = $_GET['business_id'];
            Blog::update($businessPageId);
            Blog::deleteTags($businessPageId);
            
            //$blog = Blog::all();
            //require_once('views/blogpost/readAll.php');
        }
    }
    

    public function delete() {
        Blog::remove($_GET['business_id']);

        require_once('views/business/read.php');
        //$blog = Blog::all();
        //require_once('views/blogpost/readAll.php');
    }

    public function likes() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            Blog::addlikes($_GET['business_id']);
            
        }       
    }
    
    public function unlike() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            Blog::unlike($_GET['business_id']);
            
        }       
    }
}


