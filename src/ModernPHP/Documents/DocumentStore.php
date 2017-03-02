<?php namespace ModernPHP\Documents;

class DocumentStore
{
	protected $data = [];

	public function addDocument( Documentable $document )
	{
		$key = $document->getId();
		$value = $document->getContent();
		$this->data[$key] = $value;
	}

	public function getDocuments()
	{
		if ( count($this->data) > 0 ) {
			$output = '';
			foreach ( $this->data as $key => $content ) {
				$output .= $content;
			}
			return $output;
		}
		return false;
	}
}
