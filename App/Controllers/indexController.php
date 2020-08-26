<?php

namespace App\Controllers;

use App\blog;
use App\Core\helper as h; // Untuk mempersingkat nama class
use Illuminate\Database\Capsule\Manager as DB;
use vendor\OFI_PHP_Framework\Controller;
use vendor\OFI_PHP_Framework\Controller\Route;

class indexController extends Controller
{
    /**
     * Contoh kode
     * 
     * Untuk mengembalikan nilai menjadi json
     *  return $this->response() -> json($res, 200);
     * 
     * Untuk mengembalikan menjadi error 404 atau error 500
     *  return $this->response() -> error404();
     *  return $this->response() -> error500($yourMessageHere);
     * 
     * Untuk memberikan response pengalihan halaman, ke halaman lainnya
     *  $this->response() -> redirect('http://google.com');
     *  $this->response() -> redirect('/login');
     * 
     */

    public function CapsuleManager()
    {
        $blog = blog::where('id', 1)->first();
        $blog->title = 'Contoh Artikel Satu';
        $blog->update();

        print_r($blog);
    }

    public function requestExample()
    {
        // Untuk mendapatkan semua value yang ada di header
        $d['header_All'] = $this->request() -> header() -> all();

        // Untuk mendapatkan hanya satu value yang ada di header
        $d['header_nama'] = $this->request() -> header() -> first('nama');

        // Untuk mendapatkan value inputan baik secara POST method
        // maupun GET method
        $d['inputan'] = $this->request() -> input('nama');

        // Untuk mengatur data cookie
        echo $this->setCookie('Author', 'Teguh Rijanandi');

        // Untuk mendapatkan semua data cookie
        $d['cookie_all'] = $this->request() -> Cookie();
        $d['cookie_first:PHPSESSID'] = $this->request() -> Cookie('PHPSESSID');
        
        $this->response() -> print_r($d);
    }

    public function view()
    {
        $this->loadView('index', []);
    }

    /**
     * When you wants to get all your route data
     * you can use like this
     */

    public function routes()
    {
        // $route = Route::getAsObject();
        $route = Route::getAsArray();

        echo "<pre>";
        print_r($route);
        echo "<pre>";
    }

    public function uploadImage()
    {
        # Memanggil class helper dengan alias h dan 
        # memanggil method upload

        if($this->must_post()) {
            $upload = h::upload([
                'form' => 'gb', // Input form name here
                'folder' => 'gambar', // Folder name what do you wants to save your file
            ]);
    
            $upload['status']; // To get upload status
            $upload['filename']; // To get filename after upload proccess
            $upload['filesize']; // To get filesize after upload proccess
            $upload['storageLocation']; // To where file are saved
    
            $this->response() -> json($upload, 200);
        }
    }
}
