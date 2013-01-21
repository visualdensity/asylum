<?php
/**
 * The decorator pattern - version A
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
 * Note: In this version, the decorator does not implement an interface. Please 
 * refer to DecoratorB.php to see another version of this.
 *
 * http://sourcemaking.com/design_patterns/decorator/php
 */

class Book 
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

class BookTitleDecorator
{
    protected $book;
    protected $title;

    public function __construct(Book $book)
    {
        $this->book  = $book;
        $this->resetTitle();
    }

    function resetTitle()
    {
        $this->title = $this->book->getTitle();
    }

    function showTitle()
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

    function exclaimTitle() {
        $this->btd->title = "!" . $this->btd->title . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator
{
    private $btd;

    public function __construct(BookTitleDecorator $btd)
    {
        $this->btd = $btd;
    }

    public function starTitle()
    {
        $this->btd->title = str_replace(" ", "*", $this->btd->title );
    }
}

$patternBook = new Book('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');

$decorator = new BookTitleDecorator($patternBook);
$starDecorator = new BookTitleStarDecorator($decorator);
$exclaimDecorator = new BookTitleExclaimDecorator($decorator);

echo $decorator->showTitle();
echo "\n";

$exclaimDecorator->exclaimTitle();
$exclaimDecorator->exclaimTitle();
echo $decorator->showTitle();
echo "\n";

$starDecorator->starTitle();
echo $decorator->showTitle();
echo "\n";

$decorator->resetTitle();
echo $decorator->showTitle();
echo "\n";
