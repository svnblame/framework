<?php namespace ModernPHP\Documents;

class StreamDocument implements Documentable
{
	protected $resource;
	protected $buffer;

	public function __construct($resource, $buffer = 4096)
	{
		$this->resource = $resource;
		$this->buffer = $buffer;
	}

	public function getId()
	{
		return 'resource-' . (int)$this->resource;
	}

	public function getContent()
	{
		$streamContent = '';
		rewind($this->resource);
		while ( false === feof($this->resource) ) {
			$streamContent .= fread( $this->resource, $this->buffer );
		}

		return $streamContent;
	}
}
