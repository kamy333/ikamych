<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class Library
{
    private $xmlPath;
    private $domDocument;

    public function Get_full_path()
    {
        return $_SERVER["DOCUMENT_ROOT"] . "/SetUp/library.xml";
    }

    public function __construct($xmlPath)
    {
        //loads the document

        $xmlPath = $this->Get_full_path();

        $doc = new DOMDocument();
        $doc->load($xmlPath);

        //is this a library xml file?
        if ($doc->doctype->name != "library" ||
            $doc->doctype->systemId != "library.dtd") {
            throw new Exception("Incorrect document type");
        }

        //is the document valid and well-formed?
        if ($doc->validate()) {
            $this->domDocument = $doc;
            $this->xmlPath = $xmlPath;
        } else {
            throw new Exception("Document did not validate");
        }
    }

    public function __destruct()
    {
        unset($this->domDocument);
    }

    public function getBookByISBN($isbn)
    {
        // get a book element from the isbn ID
        $book = $this->domDocument->getElementById($isbn);

        // if a book was not returned...
        if (!$book) {
            throw new Exception("No book found with ISBN " . $isbn);
        }

        $arrBook = array();
        $arrBook["isbn"] = $isbn;

        // get the data from the elements based on their tag names
        //
        // we know these DOMNodeLists will only return one
        // item since the DTD states this
        $arrBook["author"] = $book->getElementsByTagName("author")
            ->item(0)->nodeValue;
        $arrBook["title"] = $book->getElementsByTagName("title")
            ->item(0)->nodeValue;
        $arrBook["genre"] = $book->getElementsByTagName("genre")
            ->item(0)->nodeValue;

        $chapters = $book->getElementsByTagName("chapter");

        $arrChapters = array();

        // iterate over the chapter elements
        foreach ($chapters as $chapter) {
            $chapterId = $chapter->attributes
                ->getNamedItem("position")->nodeValue;
            $chapterTitle = $chapter
                ->getElementsByTagName("chaptitle")->item(0)
                ->nodeValue;
            $chapterText = $chapter
                ->getElementsByTagName("text")->item(0)
                ->nodeValue;

            $arrChapter["title"] = $chapterTitle;
            $arrChapter["text"] = $chapterText;

            $arrChapters[$chapterId] = $arrChapter;
        }

        $arrBook["chapters"] = $arrChapters;

        return $arrBook;
    }

    public function addBook($isbn, $title, $author, $genre, $chapters)
    {
        // create a new element represeting the new book
        $newbook = $this->domDocument->createElement("book");
        // append the newly created element
        $this->domDocument->documentElement
            ->appendChild($newbook);

        // setting the attribute can be done in one of two ways
        // Method One:
        // $newbook->setAttribute("isbn", $isbn);

        // Method Two:
        $idAttribute = new DOMAttr("isbn", $isbn);
        $newbook->setAttributeNode($idAttribute);

        $title = $this->domDocument
            ->createElement("title", $title);
        $newbook->appendChild($title);

        $author = $this->domDocument
            ->createElement("author", $author);
        $newbook->appendChild($author);

        $genre = $this->domDocument
            ->createElement("genre", $genre);
        $newbook->appendChild($genre);

        foreach ($chapters as $position => $chapter) {
            $newchapter = $this->domDocument
                ->createElement("chapter");
            $newbook->appendChild($newchapter);

            $newchapter->setAttribute("position", $position);

            $newchaptitle = $this->domDocument
                ->createElement("chaptitle", $chapter["title"]);
            $newchapter->appendChild($newchaptitle);

            $newtext = $this->domDocument->createElement("text");
            $newchapter->appendChild($newtext);

            // Rather than creating a new element, create a
            // DOMCdataSection which ensures our text is
            // wrapped in <![CDATA[ and ]]>
            $cdata = new DOMCdataSection($chapter["text"]);
            $newtext->appendChild($cdata);
        }

        // save the document
        $this->domDocument->save($this->xmlPath);
    }

    public function deleteBook($isbn)
    {
        // get the book element based on its ID
        $book = $this->domDocument->getElementById($isbn);

        // simply remove the child from the documents
        // documentElement
        $this->domDocument->documentElement->removeChild($book);

        // save back to disk
        $this->domDocument->save($this->xmlPath);
    }

    public function findBooksByGenre($genre)
    {
        // use XPath to find the book we"re looking for
        $query = '//library/book/genre[text() = "' . $genre . '"]/..';

        // create a new XPath object and associate it with the document we want to query against
        $xpath = new DOMXPath($this->domDocument);
        $result = $xpath->query($query);

        $arrBooks = array();

        // iterate of the results
        foreach ($result as $book) {
            // add the title of the book to an array
            $arrBooks[] = $book->getElementsByTagName("title")->item(0)->nodeValue;
        }

        return $arrBooks;
    }








    public function read_xml()
    {

        $full_path = static::Get_full_path();

//        $xmlDoc = new DOMDocument();
//        $xmlDoc->load($full_path);
//
//        $x = $xmlDoc->documentElement;
//        foreach ($x->childNodes AS $item) {
//            print $item->nodeName . " = " . $item->nodeValue . "<br><br>";
//            foreach ($item->nodename as $item1) {
//             print   $item1 . "<br>";
//            }
//        }


        $xml = simplexml_load_file($full_path) or die("Error: Cannot create object");
        print_r($xml);

        $output = '<hr />';

        foreach ($xml->children() as $books) {
            $output .= $books->title . "<br> ";
            $output .= $books->author . "<br> ";
            $output .= $books->genre . "<br> ";
//    echo $books->chapter . "<hr>";
        }

        return $output;


    }


    public function Tutorialspoint()
    {

        $html = ' 
      <head> 
         <title>Tutorialspoint</title>
      </head> 
   
      <body> 
         <h2>Course details</h2> 
      
         <table border = "0"> 
            <tbody> 
               <tr> 
                  <td>Android</td> 
                  <td>Gopal</td> 
                  <td>Sairam</td> 
               </tr> 
         
               <tr> 
                  <td>Hadoop</td> 
                  <td>Gopal</td> 
                  <td>Satish</td> 
               </tr> 
         
               <tr> 
                  <td>HTML</td> 
                  <td>Gopal</td> 
                  <td>Raju</td> 
               </tr> 
         
               <tr> 
                  <td>Web technologies</td> 
                  <td>Gopal</td> 
                  <td>Javed</td> 
               </tr> 
         
               <tr> 
                  <td>Graphic</td> 
                  <td>Gopal</td> 
                  <td>Satish</td> 
               </tr> 
         
               <tr> 
                  <td>Writer</td> 
                  <td>Kiran</td> 
                  <td>Amith</td> 
               </tr> 
         
               <tr> 
                  <td>Writer</td> 
                  <td>Kiran</td> 
                  <td>Vineeth</td> 
               </tr> 
            </tbody> 
         </table> 
      </body> 
   </html> 
   ';
        /*** a new dom object ***/
        $dom = new domDocument;

        /*** load the html into the object ***/
        $dom->loadHTML($html);

        /*** discard white space ***/
        $dom->preserveWhiteSpace = false;

        /*** the table by its tag name ***/
        $tables = $dom->getElementsByTagName('table');

        /*** get all rows from the table ***/
        $rows = $tables->item(0)->getElementsByTagName('tr');

        /*** loop over the table rows ***/
        foreach ($rows as $row) {
            /*** get each column by tag name ***/
            $cols = $row->getElementsByTagName('td');

            /*** echo the values ***/
            echo 'Designation: ' . $cols->item(0)->nodeValue . '<br />';
            echo 'Manager: ' . $cols->item(1)->nodeValue . '<br />';
            echo 'Team: ' . $cols->item(2)->nodeValue;
            echo '<hr />';
        }


    }


    public function read_xml2()
    {

        $full_path = static::Get_full_path();

        $xmlDoc = new DOMDocument();
        $xmlDoc->load($full_path);

        $output = '';

        $x = $xmlDoc->documentElement;
        foreach ($x->childNodes AS $item) {
//            print $item->nodeName . " = " . $item->nodeValue . "<br><br>";

            if($item->nodeName=="book"){
                $output .= $item->nodeName."<br>";
                $output.=$item->nodeValue. "<br><br>";

                foreach ($item->nodeValue as $item1) {
                    $output.=$item1."<br>";
                }
            }
        }
        return $output;

    }



}