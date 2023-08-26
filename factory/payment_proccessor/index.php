<?php

// Payment Gateway interface
interface PaymentGateway {
    public function processPayment($amount);
}

// Concrete payment gateway classes
class PayPalGateway implements PaymentGateway {
    public function processPayment($amount) {
        return "Processing payment of $amount using PayPal.";
    }
}

class StripeGateway implements PaymentGateway {
    public function processPayment($amount) {
        return "Processing payment of $amount using Stripe.";
    }
}

class CreditCardGateway implements PaymentGateway {
    public function processPayment($amount) {
        return "Processing payment of $amount using Credit Card gateway.";
    }
}

// Payment Gateway factory
class PaymentGatewayFactory {
    public static function createPaymentGateway($type) {
        switch ($type) {
            case 'paypal':
                return new PayPalGateway();
            case 'stripe':
                return new StripeGateway();
            case 'creditcard':
                return new CreditCardGateway();
            default:
                throw new InvalidArgumentException("Invalid payment gateway type");
        }
    }
}

// Client code
$gatewayType = 'stripe';
$amount = 100.00;
$paymentGateway = PaymentGatewayFactory::createPaymentGateway($gatewayType);

echo $paymentGateway->processPayment($amount) . "\n";