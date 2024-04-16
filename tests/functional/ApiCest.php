<?php

class ApiCest
{

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
            'search[authors][1]' => 1,
            'search[authors][2]' => 2,
            'search[authors][3]' => 3,
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeHttpHeader('X-Pagination-Total-Count', '3');
    }

}