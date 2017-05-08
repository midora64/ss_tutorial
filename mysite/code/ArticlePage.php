<?php
class ArticlePage extends Page {
	
	private static $db = array(
			'Date' => 'Date',
			'Teaser' => 'Text',
			'Author' => 'Varchar'
	);
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', DateField::create('Date', 'Date of article')
												->setConfig('showcalendar', true), 'Content');
		$fields->addFieldToTab('Root.Main', TextareaField::create('Teaser'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('Author', 'Author or article'), 'Content');
		return $fields;
	}
}

class ArticlePage_Controller extends Page_Controller {
	
}