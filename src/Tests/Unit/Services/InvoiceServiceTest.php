<?php

declare(strict_types=1);
namespace Tests\Unit\Services;

use App\Services\EmailService;
use PHPUnit\Framework\TestCase;
use App\Services\InvoiceService;
use App\Services\SalesTaxService;
use App\Services\PaymentGatewayService;

class InvoiceServiceTest  extends TestCase{
    /** @test */
    public function it_processes_invoice():void{
        /**createMock will duplicate the given class then return NULL if there is no return typehint in original class */
        $sales_tax_service_mock = $this->createMock(SalesTaxService::class); 
        $email_service_mock = $this->createMock(EmailService::class); 
        $payment_gateway_service_mock = $this->createMock(PaymentGatewayService::class);
        /** STUB = DICTATES TO WHAT METHOD WILL RETURN */
        $payment_gateway_service_mock->method('charge')->willReturn(true);

        //given invoice service
        $invoice_service = new InvoiceService($sales_tax_service_mock, $payment_gateway_service_mock, $email_service_mock);
        $customer        = ['name'=>'Kevin'];
        $amount          = 100;
        //when the process method is called
        $result = $invoice_service->process($customer, $amount);

        // then assert invoice is proccessed successfully
        $this->assertTrue($result);
    }
    /** @test */
    public function it_sends_receipt_email_when_invoice_is_processed():void{
        $sales_tax_service_mock = $this->createMock(SalesTaxService::class); 
        $email_service_mock = $this->createMock(EmailService::class); 
        $payment_gateway_service_mock = $this->createMock(PaymentGatewayService::class);
        /** STUB = DICTATES TO WHAT METHOD WILL RETURN */
        $payment_gateway_service_mock->method('charge')->willReturn(true);
        $email_service_mock
        ->expects($this->once())
        ->method('send')
        ->with(['name'=>'Kevin Mensah'], 'receipt');

        //given invoice service
        $invoice_service = new InvoiceService($sales_tax_service_mock, $payment_gateway_service_mock, $email_service_mock);
        $customer        = ['name'=>'Kevin Mensah'];
        $amount          = 100;
        //when the process method is called
        $result = $invoice_service->process($customer, $amount);

        // then assert invoice is proccessed successfully
        $this->assertTrue($result);
    }
} 