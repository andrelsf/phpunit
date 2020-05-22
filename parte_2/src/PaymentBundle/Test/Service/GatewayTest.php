<?php

namespace PaymentBundle\Test\Service;

use DateTime;
use MyFramework\HttpClientInterface;
use MyFramework\LoggerInterface;
use PaymentBundle\Service\Gateway;
use PHPUnit\Framework\TestCase;

class GatewayTest extends TestCase
{
    /**
     * @test
     */
    public function shouldNotPayWhenAuthenticationFail()
    {
        // Dependencias
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('send')
                   ->will($this->returnCallback(
                       function($method, $address, $body) {
                           $this->fakeHttpClientSend($method, $address, $body);
                       }
                   ));

        $logger = $this->createMock(LoggerInterface::class);

        // Classe que será testada
        $user = 'test';
        $password = 'invalid-password';
        $gateway = new Gateway($httpClient, $logger, $user, $password);

        // Execução
        $paid = $gateway->pay(
            'Andre Ferreira',
            9999999999999999,
            new DateTime('now'),
            100
        );

        $this->assertEquals(false, $paid);
    }

    /**
     * @test
     */
    public function shouldNotPayWhenFailOnGatewayl()
    {
        // Dependencias
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('send')
                   ->will($this->returnCallback(
                       function($method, $address, $body) {
                           $this->fakeHttpClientSend($method, $address, $body);
                       }
                   ));

        $logger = $this->createMock(LoggerInterface::class);

        // Classe que será testada
        $user = 'test';
        $password = 'valid-password';
        $gateway = new Gateway($httpClient, $logger, $user, $password);

        // Execução
        $paid = $gateway->pay(
            'Andre Ferreira',
            9999999999999999,
            new DateTime('now'),
            100
        );

        $this->assertEquals(false, $paid);
    }

     /**
     * @test
     */
    public function shouldSuccessfullyPayWhenGatewayReturnOk()
    {
        // Dependencias
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->method('send')
                   ->will($this->returnCallback(
                       function($method, $address, $body) {
                           $this->fakeHttpClientSend($method, $address, $body);
                       }
                   ));

        $logger = $this->createMock(LoggerInterface::class);

        // Classe que será testada
        $user = 'test';
        $password = 'valid-password';
        $gateway = new Gateway($httpClient, $logger, $user, $password);

        // Execução
        $paid = $gateway->pay(
            'Andre Ferreira',
            9999999999999999,
            new DateTime('now'),
            100
        );

        $this->assertEquals(true, $paid);
    }

    public function fakeHttpClientSend($method, $address, $body)
    {
        switch ($address) {
            case Gateway::BASE_URL . '/authenticate':
                if ($body['password'] != 'invalid-password') {
                    return null;
                }
                return 'my-token';
                break;
            case Gateway::BASE_URL . '/pay':
                if ($body["credit_card_number"] == 9999999999999999) {
                    return ['paid' => true];
                }

                return ['paid' => false];
                break;

        }
    }
}