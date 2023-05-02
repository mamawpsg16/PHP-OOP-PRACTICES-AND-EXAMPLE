<?php

declare(strict_types = 1);

namespace App\Services;

use App\InterfacePractice\PaymentGatewayInterface;


class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayInterface $gatewayService,
        protected EmailService $emailService
    ) {
    }
    
    public function process(array $customer, float $amount): bool
    {
        // $salesTaxService = new  SalesTaxService();
        // $gatewayService = new  PaymentGatewayService();
        // $emailService = new  EmailService();
       
        
        // 1. calculate sales tax
        $tax = $this->salesTaxService->calculate($amount, $customer);

        // 2. process invoice
        if (! $this->gatewayService->charge($customer, $amount, $tax)) {
            return false;
        }

        echo '<br/>PROCESS THIS BTCH <br/>';

        // 3. send receipt
        $this->emailService->send($customer, 'receipt');

        return true;
    }
}