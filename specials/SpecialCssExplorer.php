<?php

class SpecialCssExplorer extends SpecialPage {
	protected $modules = array();

	public function __construct() {
		global $wgResourceModules;
		parent::__construct( 'CssExplorer' );
		foreach( $wgResourceModules as $key => $module ) {
			if ( isset( $module['styles'] ) || isset( $module['skinStyles'] ) ) {
				$this->modules[] = $key;
			}
		}
	}

	public function execute( $moduleName = '' ) {
		global $wgResourceModules;

		$this->setHeaders();
		$out = $this->getOutput();
		$out->addModules( 'special.cssExplorer.scripts' );
		if ( $moduleName ) {
			$out->setPageTitle( 'CSS Explorer / ' . $moduleName );
			$out->addModuleStyles( $moduleName );
			$html = Html::element( 'a',
				array( 'href' => Title::newFromText( "Special:CssExplorer" )->getLocalUrl() ),
				'Go back' );
		} else {
			$out->setPageTitle( 'CSS Style Guide' );
			$html = Html::openElement( 'ul' );
			foreach ( $this->modules as $moduleName ) {
				$html .= Html::openElement( 'li' )
					. Html::element( 'a',
						array( 'href' => Title::newFromText( "Special:CssExplorer/$moduleName" )->getLocalUrl() ),
						$moduleName
					);
				if ( isset( $wgResourceModules[$moduleName] ) ) {
					$module = $wgResourceModules[$moduleName];
					if ( isset( $module['description'] ) ) {
						$html .= Html::element( 'span', array(), $module['description'] );
					}
				} 
				$html .= Html::closeElement( 'li' );
			}
			$html .= Html::closeElement( 'ul' );
		}
		$out->addHtml( $html );
	}
}
