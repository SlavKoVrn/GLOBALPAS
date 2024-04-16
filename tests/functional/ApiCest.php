<?php

class ApiCest
{
    private $id = 0,
            $title = 'Название книги',
            $author_id = 1,
            $pages = 300,
            $language = 'русский',
            $genre = 'роман',
            $description = 'Описание книги';

    public function getBooksAndAuthors(\FunctionalTester $I)
    {
        $I->sendGET('/books');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeHttpHeader('X-Pagination-Current-Page', '1');
        $I->seeHttpHeader('X-Pagination-Per-Page', '20');
        $I->seeResponseContains('title');
        $I->seeResponseContains('author_id');
        $I->seeResponseContains('pages');
        $I->seeResponseContains('language');
        $I->seeResponseContains('genre');
        $I->dontSeeResponseContains('description');

        $I->sendGET('/books/2');
        $I->seeResponseContainsJson(['id' => 2]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();

        $I->sendGET('/books/200');
        $I->seeResponseCodeIs(404);

        $I->sendGET('/authors');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeHttpHeader('X-Pagination-Current-Page', '1');
        $I->seeHttpHeader('X-Pagination-Per-Page', '20');
        $I->seeResponseContains('name');
        $I->seeResponseContains('birth_year');
        $I->seeResponseContains('country');

        $I->sendGET('/authors/3');
        $I->seeResponseContainsJson(['id' => 3]);

        $I->sendGET('/authors/200');
        $I->seeResponseCodeIs(404);

    }

    public function searchBooksByAuthors(\FunctionalTester $I)
    {
        $I->sendGET('/books',[
            'search[authors][1]' => 21,
            'search[authors][2]' => 22,
            'search[authors][3]' => 23,
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeHttpHeader('X-Pagination-Total-Count', '3');
    }

    public function createNewBook(\FunctionalTester $I)
    {
        $I->sendPOST('/books',[
            'title' => $this->title,
            'author_id' => $this->author_id,
            'pages' => $this->pages,
            'language' => $this->language,
            'genre' => $this->genre,
            'description' => $this->description,
        ]);
        $I->seeResponseCodeIs(201);

        $responseContent = $I->grabResponse();
        $jsonResponse = json_decode($responseContent, true);
        $this->id = $jsonResponse['id'];
        $I->sendGET('/books',[
            'search[title]' => $this->title,
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => $jsonResponse['id']]);

    }

    public function updateBook(\FunctionalTester $I)
    {
        $I->sendPUT('/books/'.$this->id,[
            'title' => $this->title.' changed',
        ]);
        $I->seeResponseCodeIs(200);

        $responseContent = $I->grabResponse();
        $jsonResponse = json_decode($responseContent, true);

        $I->sendGET('/books',[
            'search[title]' => $jsonResponse['title'],
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['id' => $this->id]);

    }

    public function deleteBook(\FunctionalTester $I)
    {
        $I->sendDELETE('/books/'.$this->id);
        $I->seeResponseCodeIs(204);

    }
}