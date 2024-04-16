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

        $I->sendGET('/authors');

        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeHttpHeader('X-Pagination-Current-Page', '1');
        $I->seeHttpHeader('X-Pagination-Per-Page', '20');
        $I->seeResponseContains('name');
        $I->seeResponseContains('birth_year');
        $I->seeResponseContains('country');
    }

}