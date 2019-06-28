<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminTemplate
{
    private $data;
    private $js_file;
    private $css_file;
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');

        // default CSS and JS that they must be load in any pages

        $this->addCSS( asset_url_admin('css/bootstrap.min.css') );
		$this->addCSS( asset_url_admin('font-awesome/4.5.0/css/font-awesome.min.css') );
		$this->addCSS( asset_url_admin('css/fonts.googleapis.com.css') );
		$this->addCSS( asset_url_admin('css/ace.min.css') );
		$this->addCSS( asset_url_admin('css/ace-skins.min.css') );
		$this->addCSS( asset_url_admin('css/ace-rtl.min.css') );
		$this->addCSS( asset_url_admin('css/css/ace-skins.min.css') );
        $this->addJShd( asset_url_admin('js/ace-extra.min.js') );
		

		$this->addJSft( asset_url_admin('js/bootstrap.min.js') );
		$this->addJSft( asset_url_admin('js/ace-elements.min.js') );
		$this->addJSft( asset_url_admin('js/ace.min.js') );
    }

    public function show( $folder, $page, $data=null, $menu=false )
    {
        if ( ! file_exists('application/views/'.$folder.'/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $this->data['page_var'] = $data;
            $this->load_JS_and_css();
            $this->init_menu();

            if ($menu)
                $this->data['content'] = $this->CI->load->view('admin/left-menu.php', $this->data, true);
            else
                $this->data['content'] = '';


            $this->data['content'] .= $this->CI->load->view($folder.'/'.$page.'.php', $this->data, true);
            $this->CI->load->view('admin/template.php', $this->data);
        }
    }

    public function addJShd( $name )
    {
        $js = new stdClass();
        $js->file = $name;
        $this->js_file[] = $js;
    }
	
	 public function addJSft( $name )
    {
        $js = new stdClass();
        $js->file = $name;
        $this->js_file_ft[] = $js;
    }

    public function addCSS( $name )
    {
        $css = new stdClass();
        $css->file = $name;
        $this->css_file[] = $css;
    }
	

    private function load_JS_and_css()
    {
        $this->data['html_head'] = '';

        if ( $this->css_file )
        {
            foreach( $this->css_file as $css )
            {
                $this->data['html_head'] .= "<link rel='stylesheet' type='text/css' href=".$css->file.">". "\n";
            }
        }

        if ( $this->js_file )
        {
            foreach( $this->js_file as $js )
            {
                $this->data['html_head'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
            }
        }
		
		if ( $this->js_file_ft )
        {
            foreach( $this->js_file_ft as $js )
            {
                $this->data['html_footer'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
            }
        }
    }

    private function init_menu()
    {        
      // your code to init menus
      // it's a sample code you can init some other part of your page
    }
}