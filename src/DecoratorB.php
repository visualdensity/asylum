<?php
/**
 * The decorator pattern - Version B
 *
 * In the Decorator pattern, a class will add functionality to another class, 
 * without changing the other classes’ structure.
 *
 * In this example, the Book class will have it’s title shown in different ways by 
 * the BookTitleDecorator and it’s child classes BookTitleExclaimDecorator and 
 * BookTitleStarDecorator.
 *
 * In my example I do this by having BookTitleDecorator make a copy of Book's title 
 * value, which is then changed for display. Depending on the implementation, it 
 * might be better to actually change the original object
 *
 * Note: This is another version of DecoratorA where it is more inline with the 
 * decorator UML class diagram outlined in Wikipedia:
 *
 * http://en.wikipedia.org/wiki/Decorator_pattern
 *
 */

interface IBook
{
    public function getAuthor();
    public function getTitle();
}

class Book implements IBook
{
    private $author;
    private $title;

    function __construct($title, $author)
    {
        $this->author = $author;
        $this->title  = $title;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }

}//Book

class BookTitleDecorator implements IBook
{
    protected $book;
    protected $title;
    protected $author;

    public function __construct(Book $book)
    {
        $this->book = $book;
        self::resetTitle();
        self::resetAuthor();
    }

    function resetTitle()
    {
        $this->title = $this->book->getTitle();
    }

    function resetAuthor()
    {
        $this->author = $this->book->getAuthor();
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }

}

class BookTitleExclaimDecorator extends BookTitleDecorator
{
    private $btd;

    public function __construct(BookTitleDecorator $btd)
    {
        $this->btd = $btd;
    }

    public function getAuthor()
    {
        return "!" . $this->btd->getAuthor() . "!";
    }

    public function getTitle()
    {
        return "!" . $this->btd->getTitle() . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator
{
    private $btd;

    public function __construct(BookTitleDecorator $btd)
    {
        $this->btd = $btd;
    }

    public function getAuthor()
    {
        return str_replace(" ", "*", $this->btd->getAuthor());
    }

    public function getTitle()
    {
        return str_replace(" ", "*", $this->btd->title );
    }
}

$patternBook = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

$decorator = new BookTitleDecorator($patternBook);
$starDecorator = new BookTitleStarDecorator($decorator);
$exclaimDecorator = new BookTitleExclaimDecorator($decorator);

echo $decorator->getAuthor();
echo "\n";
echo $decorator->getTitle();
echo "\n";
echo "\n";

echo $starDecorator->getAuthor();
echo "\n";
echo $starDecorator->getTitle();
echo "\n";
echo "\n";


echo $exclaimDecorator->getAuthor();
echo "\n";
echo $exclaimDecorator->getTitle();
echo "\n";
echo "\n";
