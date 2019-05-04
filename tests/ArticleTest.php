<?php

use \PHPUnit\Framework\TestCase;

require 'src/App/Article.php';

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp()
    {
        $this->article = new App\Article();
    }

    /*

    public function testArticleTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmtpyWithNoTitle()
    {
        $this->assertEquals($this->article->getSlug(), ""); // questo conferma che null == stringa vuota ma non basta!!

        $this->assertSame($this->article->getSlug(), ""); // questo è più forte
    }

    public function testSlugHasSpaceReplacedByUnderscores()
    {
        $this->article->title = "An example article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugHasWhitespaceReplacedBySingleUnderscore()
    {
        $this->article->title = "An example \n article";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotStartOrEndWithAnUnderscore()
    {
        $this->article->title = " An example article ";

        $this->assertEquals($this->article->getSlug(), "An_example_article");
    }

    public function testSlugDoesNotHaveAnyNonWordsCharacters()
    {
        $this->article->title = "Read! This! Now!";

        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }

    */

    public function titleProvider()
    {
        return [
            ["An example article", "An_example_article"],
            ["An example \n article", "An_example_article"],
            [" An example article ", "An_example_article"],
            ["Read! This! Now!", "Read_This_Now"],
        ];
    }

    /**
     * @param $title
     * @param $slugs
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slugs)
    {
        $this->article->title = "Read! This! Now!";

        $this->assertEquals($this->article->getSlug(), "Read_This_Now");
    }
}
