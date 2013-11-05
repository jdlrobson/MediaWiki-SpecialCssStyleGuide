<?php

class SpecialCssStyleGuide extends SpecialPage {
	protected $modules = array();

	public function __construct() {
		global $wgResourceModules;
		parent::__construct( 'CssStyleGuide' );
		foreach( $wgResourceModules as $key => $module ) {
			if ( isset( $module['styles'] ) || isset( $module['skinStyles'] ) ) {
				$this->modules[] = $key;
			}
		}
	}
	public function execute( $pageName = '' ) {

		$this->setHeaders();
		$out = $this->getOutput();
		$out->setPageTitle( 'CSS Style Guide' );
		$out->addModuleStyles( 'special.cssStyleGuide.styles' );
		$pageName = $pageName ? $pageName . '.html' : 'index.html';

		$localPath = dirname( __FILE__ ) . '/../_styleguide/' . $pageName;
		if ( file_exists( $localPath ) ) {
			$contents = file_get_contents( $localPath );
			$out->addHtml( $contents );
		} else {
			$out->addHtml( 'fail' );
		}
	}
}
