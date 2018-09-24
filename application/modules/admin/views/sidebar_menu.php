<?php
 // defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($admin_templates))
{
	$data = array();
	$menu = array(
	  array(
	    'title' => 'Dashboard',
	    'icon' => 'fa-dashboard',
	    'link' => base_url('admin')
	  ),
	  array(
	  	'title' => 'Diklat',
	    'icon' => 'fa-user',
	    'link' => base_url('admin/diklat_list'),
	    'list' => array(
	      array(
	        'title' => 'Calon Peserta',
	        'icon' => 'fa-address-card-o',
	        'link' => base_url('admin/diklat_list')
	      ),
	      array(
	        'title' => 'Peserta',
	        'icon' => 'fa-address-book-o',
	        'link' => base_url('admin/diklat_peserta')
	      ),
	      array(
	        'title' => 'Sertifikat',
	        'icon' => 'fa-id-badge',
	        'link' => base_url('admin/diklat_cert')
	      ),
	      array(
	        'title' => 'Jenis Sertifikat',
	        'icon' => 'fa-id-badge',
	        'link' => base_url('admin/diklat_cert_cat')
	      ),
	      array(
	        'title' => 'Tambah Calon Peserta',
	        'icon' => 'fa-plus',
	        'link' => base_url('admin/diklat_edit')
	      ),
	      array(
	        'title' => 'Diklat Keterampilan',
	        'icon' => 'fa-bandcamp',
	        'link' => base_url('admin/diklat_keterampilan')
	      )
	    )
	  ),
	  array(
	    'title' => 'User',
	    'icon' => 'fa-user',
	    'link' => base_url('admin/user_list'),
	    'list' => array(
	      array(
	        'title' => 'User List',
	        'icon' => 'fa-user',
	        'link' => base_url('admin/user_list')
	      ),
	      array(
	        'title' => 'User Add',
	        'icon' => 'fa-user',
	        'link' => base_url('admin/user_edit')
	      ),
	    )
	  ),
	  array(
	    'title' => 'Content',
	    'icon' => 'fa-file-text',
	    'link' => base_url('admin/content_list'),
	    'list' => array(
	    	array(
	        'title' => 'Category',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/content_category')
	      ),
	      array(
	        'title' => 'Add Content',
	        'icon' => 'fa-pencil',
	        'link' => base_url('admin/content_edit')
	      ),
	      array(
	        'title' => 'Content List',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/content_list')
	      ),
	      array(
	        'title' => 'Comment',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/comment_list')
	      ),
	      array(
	        'title' => 'Content Config',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/content_config')
	      ),
	    )
	  ),
	  array(
	    'title' => 'Menu',
	    'icon' => 'fa-list',
	    'link' => base_url('admin/menu_list'),
	    'list' => array(
	    	array(
	        'title' => 'Add Menu',
	        'icon' => 'fa-pencil',
	        'link' => base_url('admin/menu_edit')
	      ),
	      array(
	        'title' => 'Menu List',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/menu_list')
	      ),
	      array(
	        'title' => 'Menu Position',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/menu_position')
	      ),
	    )
	  ),
	  array(
	    'title' => 'Configuration',
	    'icon' => 'fa-cog',
	    'link' => base_url('admin/config/'),
	    'list' => array(
	    	array(
	        'title' => 'Header',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_header/header')
	      ),
				array(
	        'title' => 'header_bottom',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_header_bottom/header_bottom')
	      ),
	      array(
	        'title' => 'logo',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_logo/logo')
	      ),
	      array(
	        'title' => 'site',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_site/site')
	      ),
	      array(
	      	'title' => 'Add Js',
	      	'icon' => 'fa-cog',
	      	'link' => base_url('admin/config_js_extra/js_extra')
	      ),
	      array(
	        'title' => 'templates',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_templates/templates')
	      ),
	      array(
	        'title' => 'template_config',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_template_config/template_config')
	      ),
	      array(
	        'title' => 'alert',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_alert/alert')
	      ),
	      array(
	        'title' => 'web type',
	        'icon' => 'fa-cog',
	        'link' => base_url('admin/config_web_type/web_type')
	      ),
	    )
	  ),
	);
	$web_type = $this->esg->get_config('web_type');
	if(!empty($web_type['type']))
	{
		$menu[] = array(
	    'title' => 'Product',
	    'icon' => 'fa-file-text',
	    'link' => base_url('admin/product_list'),
	    'list' => array(
	    	array(
	        'title' => 'Category',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/product_category')
	      ),
	      array(
	        'title' => 'Add Product',
	        'icon' => 'fa-pencil',
	        'link' => base_url('admin/product_edit')
	      ),
	      array(
	        'title' => 'Product List',
	        'icon' => 'fa-list',
	        'link' => base_url('admin/product_list')
	      ),
	    )
	  );
	}
	$data['menu'] = $menu;
	$this->load->view('admin/templates/'.$admin_templates.'/sidebar_menu', $data);
}