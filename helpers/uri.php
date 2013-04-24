<?php
/**
 * @package     Windwalker.Framework
 * @subpackage  AKHelper
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */


// No direct access
defined('_JEXEC') or die;


class AKHelperUri {
    
    public static function pathAddHost ( $path ) {
        
        if( !$path ) return ;
        
        // build path
        $uri = new JURI( $path );
        if( $uri->getHost() ) return $path ;
        
        $uri->parse( JURI::root() );
        $root_path = $uri->getPath();
        
        if(strpos($path, $root_path) === 0) {
            $num = JString::strlen($root_path) ;
            $path = JString::substr($path, $num) ;
        }
        
        $uri->setPath( $uri->getPath().$path );
        $uri->setScheme( 'http' );
        $uri->setQuery(null);
        
        return $uri->toString();
    }
    
    
    
    /*
     * function pathAddSubfolder
     * @param $path
     */
    
    public static function pathAddSubfolder( $path )
    {
        $uri         = JFactory::getURI() ;
        $host         = $uri->getScheme().'://'.$uri->getHost();
        $current     = JURI::root();
        
        $subfolder     = str_replace( $host, '', $current );
        $subfolder     = trim($subfolder, '/') ;
        
        return $subfolder . '/' . trim($path, '/') ;
    }
    
    
    
    public static function base64( $action , $url ) {
        
        switch($action) {
            case 'encode' :
                $url = base64_encode( $url );
            break;
            
            case 'decode' :
                $url = str_replace( ' ' , '+' , $url );
                $url = base64_decode( $url );
            break;
        }
        return $url ;
    }
    
    
    /*
     * function download
     * @param $stream
     */
    
    public static function download($path, $absolute = false, $stream = false, $option = array())
    {
        if($stream) {
            if(!$absolute){
                $path = JPATH_ROOT . '/' . $path ;
            }
            
            if(!JFile::exists($path)) die() ;
            
            $file = pathinfo($path) ;
            
            $filesize = filesize($path) + JArrayHelper::getValue($option, 'size_offset', 0); 
            ini_set('memory_limit', JArrayHelper::getValue($option, 'memory_limit', '1540M') );
            
            // Set Header
            header('Content-Type: application/octet-stream');
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Cache-Control: pre-check=0, post-check=0, max-age=0');
            header('Content-Transfer-Encoding: binary');
            header('Content-Encoding: none');
            header('Content-type: application/force-download');
            header('Content-length: '.$filesize);
            header('Content-Disposition: attachment; filename="' . $file['basename'] . '"');
            
            $handle     = fopen($path, 'rb'); 
            $buffer     = '';
            $chunksize     = 1 * (1024 * 1024);
            
            // Start Download File
            while (!feof($handle)) { 
              $buffer = fread($handle, $chunksize); 
              echo $buffer; 
              ob_flush(); 
              flush(); 
            }
            
            fclose($handle); 
            
            jexit();
        }else{
            if(!$absolute){
                $path = JURI::root().$path;
            }
            
            $app = JFactory::getApplication() ;
            $app->redirect( $path );
        }
    }
    
    
    public static function current( $hasQuery = false ) {
        if( $hasQuery )
            return JFactory::getURI()->toString();
        else
            return JURI::current();
    }
    
    
    /*
     * function component
     * @param $client
     */
    
    public static function component($client = 'site', $option = null, $absoulte = false)
    {
        $root     = $absoulte ? JURI::base() : '' ;
        if(!$option){
            $option = JRequest::getVar('option') ;
        }
        
        if($client == 'site'){
            return $root.'components/'.$option ;
        }else{
            return $root.'components/'.$option ;
        }
    }
    
    
    /*
     * function windwalker
     * @param $client
     */
    
    public static function windwalker($absoulte = false)
    {
        $root     = $absoulte ? JURI::base() : '' ;
        $option = JRequest::getVar('option') ;
        
        return $root.'libraries/windwalker' ;
    }
    
    
    /*
     * function safe
     * @param $uri
     */
    
    public static function safe($uri)
    {
        $uri = (string) $uri ;
        $uri = str_replace(' ', '%20', $uri);
        
        return $uri ;
    }
}


