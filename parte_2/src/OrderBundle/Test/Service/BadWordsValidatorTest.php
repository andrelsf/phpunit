<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider badWordsDataProvider
     */
    public function hasBadWords($badWordList, $text, $foundBadWords)
    {
        $badWordsRepository = $this->createMock(BadWordsRepository::class);

        $badWordsRepository->method('findAllAsArray')
                           ->willReturn($badWordList);
        
        $badWordsValidator = new BadWordsValidator($badWordsRepository);

        $hasBadWords = $badWordsValidator->hasBadWords($text);

        $this->assertEquals($foundBadWords, $hasBadWords);
    }

    public function badWordsDataProvider()
    {
        return [
            'shouldFindWhenHasBadWords' => [
                'badWordList' => ['bobo', 'chule', 'besta'],
                'text' => 'Seu restaurante e muito bobo',
                'foundBadWords' => true
            ],
            'shouldNotFindWhenHasNoBadWords' => [
                'badWordList' => ['bobo', 'chule', 'besta'],
                'text' => 'Troca batata por salada',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenTextIsEmpty' => [
                'badWordList' => ['bobo', 'chule', 'besta'],
                'text' => '',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenBadWordsListIsEmpty' => [
                'badWordList' => [],
                'text' => 'Seu restaurante e muito bobo',
                'foundBadWords' => false
            ],
        ];
    }
}