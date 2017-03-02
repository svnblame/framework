<?php

use ModernPHP\Documents\HtmlDocument;
use ModernPHP\Documents\DocumentStore;
use ModernPHP\Documents\StreamDocument;
use ModernPHP\Documents\CommandOutputDocument;

$documentStore = new DocumentStore();

// Add stream document
$file = __DIR__ . '/stream.txt';
$streamDoc = new StreamDocument(fopen($file, 'rb'));
$documentStore->addDocument($streamDoc);

// Add terminal command document
$cmdDoc = new CommandOutputDocument('cat /etc/hosts');
$documentStore->addDocument($cmdDoc);

// Add HTML document
$htmlDoc = new HtmlDocument('https://startpage.com');
$documentStore->addDocument($htmlDoc);

print_r( $documentStore->getDocuments() );
