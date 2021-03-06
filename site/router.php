<?php
/**
 * @package      SocialCommunity
 * @subpackage   Components
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * SocialCommunity is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

defined('_JEXEC') or die;

/**
 * Method to build Route
 * @param array $query
 */
function SocialCommunityBuildRoute(&$query){
    
    $segments = array();
    
    // get a menu item based on Itemid or currently active
    $app  = JFactory::getApplication();
    $menu = $app->getMenu();
    
    // we need a menu item.  Either the one specified in the query, or the current active one if none specified
    if(empty($query['Itemid'])){
        $menuItem = $menu->getActive();
    }else{
        $menuItem = $menu->getItem($query['Itemid']);
    }

    $mView	    = (empty($menuItem->query['view']))   ? null : $menuItem->query['view'];
	$mId	    = (empty($menuItem->query['id']))     ? null : $menuItem->query['id'];

	// If is set view and Itemid missing, we have to put the view to the segments
	if (isset($query['view'])) {
		$view = $query['view'];
		
		if (empty($query['Itemid'])) {
			$segments[] = $query['view'];
		}
		
	    // We need to keep the view for forms since they never have their own menu item
		if ($view != 'form') {
			unset($query['view']);
		}
	};
    
    // are we dealing with a entity that is attached to a menu item?
	if (isset($view) AND ($mView == $view) AND (isset($query['id'])) AND ($mId == intval($query['id']))) {
		unset($query['view']);
		unset($query['id']);
		return $segments;
	}
	
    // Views
	if(isset($view)) {
	    
    	switch($view) {
    	    
    	    case "profile":
    	        
    	        if(isset($query['id'])) {
    	            $segments[] = $query['id'];
				    unset($query['id']);
    	        }
    	        
    	        break;
    	        
    	}
        
	}
	
    // Layout
    if(isset($query['layout'])){
        
        // Does the menu layout match with the query layout 
        if(!empty($query['Itemid']) AND isset($menuItem->query['layout'])){
            if($query['layout'] != $menuItem->query['layout']){
                $segments[] = $query['layout'];
            }
        } else {
            $segments[] = $query['layout'];
        }
        
        unset($query['layout']);
    }
    
    return $segments;
}

/**
 * Method to parse Route
 * @param array $segments
 */
function SocialCommunityParseRoute($segments){
    
    $query      = array();
    
    //Get the active menu item.
    $app        = JFactory::getApplication();
    $menu       = $app->getMenu();
    $menuItem   = $menu->getActive();
    
    $count      = count($segments);
    
    // Standard routing for entity.  If we don't pick up an Itemid then we get the view from the segments.
	// The first segment is the view and the last segment is the id of the entity
    if(!isset($menuItem)) {
        $query['view']   = $segments[0];
        $query['id']     = $segments[$count - 1];
        return $query;
    } 
    
    if($count == 1) {
        
        $view = $menuItem->query["view"];
        
        switch($view) {
		        
		    case "profile":
		        
				$query['view']  = $view;
				$query['id']    = (int)$segments[0];
    
		        break;
		}
        
    }
    
    return $query;
}