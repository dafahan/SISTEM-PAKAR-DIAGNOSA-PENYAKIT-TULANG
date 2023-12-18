<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use App\Models\ArticleModel;

class ArticleController extends Controller
{
public function article($page=null,$id=null){
   
   $articleModel = new ArticleModel();
  
   $article = $articleModel->fetchData();
   $data = [
       'title' => 'Article',
   ];
   if($page=='manage'){
       $data['page'] = 'manage';
       $data['article'] = $article['hasPart'];
   
       return view('admin/page/dataarticle.php',$data);
   }
   if($page=="delete"){
       $articleModel->deleteItem($id);
       return redirect()->to(base_url('article/manage'));
   }
   if($page=='detail'){
        $data['id'] = $id;
       $data['article'] = $article['hasPart'][$id-1];
       //C:\laragon\www\SISTEM-PAKAR-DIAGNOSA-PENYAKIT-TULANG\app\Views\admin\page\detailarticle
       return view('admin/page/detailarticle',$data);
       
   }
   if($page=='details'){
    $data['id'] = $id;
   $data['article'] = $article['hasPart'][$id-1];
   //C:\laragon\www\SISTEM-PAKAR-DIAGNOSA-PENYAKIT-TULANG\app\Views\admin\page\detailarticle
   return view('article/detail',$data);
   
}
   
   if($page=="add"){
       $data['page'] = 'manage';
       return view('admin/add_article',$data);   
   }
   if($page=="edit"){
       $data['page'] = 'manage';
       $data['article'] = $article['hasPart'][$id-1];
       $data['id'] = $id;
       //dd($data);
       return view('admin/add_article',$data);   
   }
   $perPage = 10;
   $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
   $article = $articleModel->fetchData();
   $start = ($currentPage - 1) * $perPage;
   $subset = array_slice($article['hasPart'], $start, $perPage);
   $totalArticles = count($article['hasPart']);
   $maxPages = ceil($totalArticles / $perPage);
   $pager = \Config\Services::pager(null, null, false);
   $pager->setPath('article'); 
   $data = [
       'title' => 'article',
       'article' => $subset,
       'pager' => $pager,
       'currentPage' => $currentPage,
       'maxPages' => $maxPages,
   ];
   
   return view('article/listarticle', $data);
}

       public function prosess($proses=null,$id=null){

          $articleModel = new ArticleModel();

           if($proses == "add"){
               $data = [
                   'headline' => $this->request->getVar('headline'),
                   'text'=> $this->request->getVar('text'),
                   'description'=> $this->request->getVar('description'),
               ];
              
               $articleModel->createItem($data);
               
               return redirect()->to(base_url('article/manage'));
           }
           if($proses == "edit"){
               $data = [
                   'headline' => $this->request->getVar('headline'),
                   'text'=> $this->request->getVar('text'),
                   'description'=> $this->request->getVar('description'),
               ];
               //dd($data);
               $articleModel->updateItem($id,$data);
               return redirect()->to(base_url('article/manage'));
           }

       }
}