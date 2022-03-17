<?php
/**
* @package DecagonRecipePlugin
*/
/*
Plugin Name: Decagon Recipe Plugin
Plugin URI: https://decagonhq.com/
Description:A simple plugin that can be used to create a new recipe, view all available recipes, to edit a recipe and to delete a single or multiple recipes
Version: 1.0.0
Author: Valentine Michael
Author URI: https://chionye.com/
License: GPLv2 or later
Text Domain: decagon-recipe-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

//protect file from unauthorized access
defined( 'ABSPATH' ) or die();

class DecagonRecipePlugin
{

	function __construct()
	{
		//initializing the creation of the CPT when the class is called
		add_action('init', [$this, 'customPostType']);
	}

	function activate()
	{
		//automatic flushing of the WordPress rewrite rules
		flush_rewrite_rules();	
	}

	function deactivate()
	{
		//automatic flushing of the WordPress rewrite rules
		flush_rewrite_rules();	
	}

	function customPostType()
	{
		//setting the various configurations for the CPT
		register_post_type('recipe', 
			[
				'public' => true, 
				'labels' => [
	                'name' => __('Recipes'),
	                'singular_name' => __('Recipe'),
	                'menu_name' => __('Recipes'),
	                'all_items' => __('All Recipes'),
			        'view_item' => __('View Recipe'),
			        'add_new_item' => __('Add New Recipe'),
			        'add_new' => __('Add New'),
			        'edit_item' => __('Edit Recipe'),
			        'update_item' => __('Update Recipe'),
			        'search_items' => __('Search Recipe'),
            	],
	            'rewrite' => array('slug' => 'recipe'),
			]
		);
	}
}

//calling the class
$retVal = class_exists('DecagonRecipePlugin') ? new DecagonRecipePlugin(): "" ;


//registering the activation hook
register_activation_hook(__FILE__, [$retVal, 'activate']);

//registering the deactivation hook
register_deactivation_hook(__FILE__, [$retVal, 'deactivate']);