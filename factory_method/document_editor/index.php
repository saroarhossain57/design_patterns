<?php

// Document interface
interface Document {
    public function create();
    public function save();
    public function display();
}

// Concrete document classes
class PDFDocument implements Document {
    public function create() {
        echo "Creating a PDF document.\n";
    }
    
    public function save() {
        echo "Saving the PDF document.\n";
    }
    
    public function display() {
        echo "Displaying the PDF document.\n";
    }
}

class WordDocument implements Document {
    public function create() {
        echo "Creating a Word document.\n";
    }
    
    public function save() {
        echo "Saving the Word document.\n";
    }
    
    public function display() {
        echo "Displaying the Word document.\n";
    }
}

class TextDocument implements Document {
    public function create() {
        echo "Creating a Text document.\n";
    }
    
    public function save() {
        echo "Saving the Text document.\n";
    }
    
    public function display() {
        echo "Displaying the Text document.\n";
    }
}

// Document Creator (Factory) interface
interface DocumentCreator {
    public function createDocument(): Document;
}

// Concrete Document Creator classes
class PDFDocumentCreator implements DocumentCreator {
    public function createDocument(): Document {
        return new PDFDocument();
    }
}

class WordDocumentCreator implements DocumentCreator {
    public function createDocument(): Document {
        return new WordDocument();
    }
}

class TextDocumentCreator implements DocumentCreator {
    public function createDocument(): Document {
        return new TextDocument();
    }
}

// Client code
function createAndProcessDocument(DocumentCreator $creator) {
    $document = $creator->createDocument();
    
    $document->create();
    $document->save();
    $document->display();
    
    echo "\n";
}

// Using the Factory Method Pattern
createAndProcessDocument(new PDFDocumentCreator());
createAndProcessDocument(new WordDocumentCreator());
createAndProcessDocument(new TextDocumentCreator());