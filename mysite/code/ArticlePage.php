<?php
class ArticlePage extends Page {
	
	private static $db = array(
			'Date' => 'Date',
			'Teaser' => 'Text',
			'Author' => 'Varchar'
	);
	
	private static $has_one = array(
			'Photo' => 'Image',
			'Brochure' => 'File'
	);
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', DateField::create('Date', 'Date of article')
												->setConfig('showcalendar', true), 'Content');
		$fields->addFieldToTab('Root.Main', TextareaField::create('Teaser'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('Author', 'Author or article'), 'Content');
		
		$fields->addFieldToTab('Root.Attachments', $photo = UploadField::create('Photo'));
		$fields->addFieldToTab('Root.Attachments', $brochure = UploadField::create(
				'Brochure',
				'Travel brochure, optional (PDF only)'
				));
		$photo->setFolderName('travel-photos');
		$photo->getValidator()->setAllowedExtensions(array(
				'jpg', 'jpeg', 'png', 'gif'
		));
		$brochure->setFolderName('travel-brochures');
		$brochure->getValidator()->setAllowedExtensions(array('pdf'));
		
		return $fields;
	}
}

class ArticlePage_Controller extends Page_Controller {
	
}