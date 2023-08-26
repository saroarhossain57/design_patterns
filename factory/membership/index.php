<?php

interface Membership {
    public function getMembership();
    public function getPrice();
    public function getFeatures();
}


class BasicMemberShip implements Membership {
    public function getMembership() {
        return "Basic Membership";
    }
    public function getPrice() {
        return 10;
    }
    public function getFeatures() {
        return "Basic Features";
    }


}


class PremiumMemberShip implements Membership {
    public function getMembership() {
        return "Premium Membership";
    }
    public function getPrice() {
        return 20;
    }
    public function getFeatures() {
        return "Premium Features";
    }

}


class StandardMemberShip implements Membership {
    public function getMembership() {
        return "Standard Membership";
    }
    public function getPrice() {
        return 30;
    }
    public function getFeatures() {
        return "Standard Features";
    }

}

// create membership object factory
class MembershipFactory {
    public static function createMembership($type) {
        switch ($type) {
            case "Basic":
                return new BasicMemberShip();
                break;
            case "Premium":
                return new PremiumMemberShip();
                break;
            case "Standard":
                return new StandardMemberShip();
                break;
        }
    }
}

$membership = MembershipFactory::createMembership("Premium");

echo $membership->getPrice();