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


class AKHelperUi {    
    
    /*
     * function modal
     * @param $id
     */
    
    public static function modal($selector, $option = array())
    {
        $doc = JFactory::getDocument();
        
        if(JVERSION >= 3) {
            JHtml::_('bootstrap.modal', $selector);
        }else{
            JHtml::_('behavior.modal');
            
            $script =
<<<SCRIPT
            window.addEvent('domready', function(){
                SqueezeBox.assign($$('a#{$selector}_link'), {
                    parse: 'rel',
                    onOpen: function(e) {
                        e.getChildren().show();
                    }
                });
                
                $('{$selector}').hide();
                
            });
SCRIPT;

            $doc->addScriptDeclaration($script);
        }
    }
    
    
    /*
     * function modalLink
     * @param $title
     */
    
    public static function modalLink($title, $selector, $option = array())
    {
        $tag     = JArrayHelper::getValue($option, 'tag', 'a');
        $id     = isset($option['id']) ? " id=\"{$option['id']}\"" : "id=\"{$selector}_link\"";
        $class     = isset($option['class']) ? " class=\"{$option['class']}\"" : '';
        $onclick = isset($option['onclick']) ? " onclick=\"{$option['onclick']}\"" : '';
        $icon    = JArrayHelper::getValue($option, 'icon', '');
        
        if( JVERSION >= 3 ) {
            $button = "<{$tag} data-toggle=\"modal\" data-target=\"#$selector\"{$id}{$class}{$onclick}>
                    <i class=\"{$icon}\" title=\"$title\"></i>
                    $title</{$tag}>" ;
        }
        else
        {
            $rel    = JArrayHelper::getValue($option, 'rel');
            $rel    = $rel ? " rel=\"{$rel}\"" : '';
            $button = "<a href=\"#{$selector}\"{$id}{$class}{$onclick}{$rel}>{$title}</a>" ;
        }
        
        return $button;
    }
}


