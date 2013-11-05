<?php
/*
 * This file is part of the MediaWiki extension CSSStyleGuide.
 *
 * CSSStyleGuide is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * CSSStyleGuide is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with VectorBeta.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @file
 * @ingroup extensions
 */

$wgExtensionCredits['other'][] = array(
	'author' => array( 'Jon Robson' ),
	'descriptionmsg' => 'Adds Special:CssExplorer and Special:CssStyleGuide',
	'name' => 'CssStyleGuide',
	'path' => __FILE__,
	'url' => 'https://www.mediawiki.org/wiki/Extension:CssStyleGuide',
);

$cwd = dirname( __FILE__ );
$wgAutoloadClasses['SpecialCssStyleGuide'] = "$cwd/specials/SpecialCssStyleGuide.php";
$wgAutoloadClasses['SpecialCssExplorer'] = "$cwd/specials/SpecialCssExplorer.php";
$wgSpecialPages['CssStyleGuide'] = "SpecialCssStyleGuide";
$wgSpecialPages['CssExplorer'] = "SpecialCssExplorer";

$wgExtensionMessagesFiles['CssStyleGuide'] = __DIR__ . '/CssStyleGuide.i18n.php';
$wgResourceModules = array_merge( $wgResourceModules, array(
	'special.cssExplorer.scripts' => array(
		'localBasePath' => dirname( __DIR__ ) . '/CssStyleGuide',
		'remoteExtPath' => 'CssStyleGuide',
		'scripts' => array(
			'resources/lsg.js',
			'resources/init.js',
		),
	),
	'special.cssStyleGuide.styles' => array(
		'localBasePath' => dirname( __DIR__ ) . '/CssStyleGuide',
		'remoteExtPath' => 'CssStyleGuide',
		'styles' => array(
			'styles/styles.less',
		),
	),
) );