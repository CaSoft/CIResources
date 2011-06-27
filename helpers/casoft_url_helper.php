<?php

/**
 * EN
 * Some URL helpers
 *
 * PT_BR
 * Alguns helpers para URLs
 *
 * @author Evaldo Junior <junior@casoft.info>
 * @version 0.1
 * @license GNU GPL v3
 *
 * Changelog
 *
 * Version 0.1
 *  - casoft_get_filepath_mtime
 */

/**
 * casoft_get_filepath_mtime
 *
 * EN
 * returns the time file was modified (UNIX) as a GET var 'v'
 *
 * Example:
 * get_filemtime('css/site.css')  // returns "http://siteurl/css/site.css?v=1309177769"
 *
 * PT_BR
 * Retorna a hora de modificação do arquivo em formato UNIX como uma variável GET
 *
 * Exemplo:
 * get_filemtime('css/site.css')  // retorna "http://siteurl/css/site.css?v=1309177769"
 *
 * @param mixed $file 
 * @access public
 * @return void
 */
function casoft_get_filepath_mtime($file) {
    if (file_exists('./'.$file)) {
        return base_url().$file.'?v='.filemtime('./'.$file);
    }
    else {
        return '';
    }
}

/* End of file casoft_url_helper.php */
/* Location: ./application/controllers/casoft_url_helper.php */
