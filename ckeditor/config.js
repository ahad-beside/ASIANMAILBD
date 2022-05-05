/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.font_names = 'Kalpurush;Arial;Times New Roman;Verdana;';
	
	config.fontSize_defaultLabel = '19px';
	config.fontSize_sizes = '15/15px;17/17px;19/19px;21/21px;22/22px;';

	config.font_defaultLabel = 'Kalpurush';
	
	config.contentsCss = '../resources/css/ckeditor.css';
        //config.contentsCss = 'contents.css';
	
	config.forcePasteAsPlainText = true;
	
	config.docType = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">';
	
	config.toolbar = 'MyToolbar';
 
    config.toolbar_MyToolbar =
    [
        ['Source','Cut','Copy','Paste','PasteText','PasteFromWord','Print'],
        ['Bold', 'Italic','Strike','-', 'NumberedList', 'BulletedList', '-', 'Link','Unlink'], ['Table','Image'], ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], ['Font','FontSize']
    ];
	
	config.enterMode = CKEDITOR.ENTER_BR;
        config.removeDialogTabs = 'link:Upload;image:Upload';
};
