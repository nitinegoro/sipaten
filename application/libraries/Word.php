<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fungsi Untuk membuat memanipulasi dokumen word
 *
 * @author https://www.facebook.com/muh.azzain
 * @see http://phpword.readthedocs.io
 * @return Document Office 
 **/

require_once(FCPATH."./vendor/autoload.php");

class Word extends \PhpOffice\PhpWord\PhpWord {

    public function __construct() 
    {        
        // loaded package via compoeser
        

/*        // get Extends Class
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        // created Object Codeigniter
        $ci =& get_instance();
        $ci->phpWord = $phpWord;*/
    }
}