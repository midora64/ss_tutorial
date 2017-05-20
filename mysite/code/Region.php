<?php
class Region extends DataObject {
	
	private static $db = array(
			'Title' => 'Varchar',
			'Description' => 'Text'
	);
	
	private static $has_one = array(
			'Photo' => 'Image',
			'RegionsPage' => 'RegionsPage'
	);
	
	private static $summary_fields = array(
			'Photo.CMSThumbnail' => '',
			'Title' => 'Title of region',
			'Description' => 'Short description'
	);
	
	public function GridThumbnail(){
		if($this->Photo()->exists()){
			return $this->Photo()->SetWidth(100);
		}
		return '(no image)';
	}
	
	public function getCMSFields(){
		$fields = FieldList::create(
			TextField::create('Title'),
			TextareaField::create('Description'),
			$uploader = UploadField::create('Photo')		
		);
		
		$uploader->getValidator()->setAllowedExtensions(array(
				'jpg', 'jpeg', 'png', 'gif'
		));
		$uploader->setFolderName('region-photos');
		
		return $fields;
	}
}