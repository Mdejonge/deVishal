/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,copyformatting,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,undo,wsc,lineutils,widgetselection,widget,filetools,notification,notificationaggregator,uploadwidget,uploadimage';
	config.skin = 'bootstrapck';
	//config.uploadUrl = 'http://localhost:8080/deVishal/uploads/test/upload.php';
	//config.filebrowserUploadUrl = 'http://localhost:8080/deVishal/uploads/test/upload.php';
	// %REMOVE_END%

	CKEDITOR.editorConfig = function( config ) {
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools'] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];
	};

	
	 config.filebrowserBrowseUrl = 'http://localhost/deVishal/kcfinder/browse.php?opener=ckeditor&type=files';
	 config.filebrowserImageBrowseUrl = 'http://localhost/deVishal/kcfinder/browse.php?opener=ckeditor&type=images';
	 config.filebrowserFlashBrowseUrl = 'http://localhost/deVishal/kcfinder/browse.php?opener=ckeditor&type=flash';
	 config.filebrowserUploadUrl = 'http://localhost/deVishal/kcfinder/upload.php?opener=ckeditor&type=files';
	 config.filebrowserImageUploadUrl = 'http://localhost/deVishal/kcfinder/upload.php?opener=ckeditor&type=images';
	 config.filebrowserFlashUploadUrl = 'http://localhost/deVishal/kcfinder/upload.php?opener=ckeditor&type=flash';

	/*
	config.filebrowserBrowseUrl = 'http://194.171.20.107/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = 'http://194.171.20.107/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = 'http://194.171.20.107/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = 'http://194.171.20.107/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = 'http://194.171.20.107/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = 'http://194.171.20.107/kcfinder/upload.php?opener=ckeditor&type=flash';
*/
	// Image -> Om foto te uploaden. Eruit halen wanneer verder gaans
	config.removeButtons = 'NewPage,Templates,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,BidiLtr,BidiRtl,Language,Flash,PageBreak,Iframe';
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
