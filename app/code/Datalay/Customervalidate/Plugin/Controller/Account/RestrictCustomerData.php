<?php

namespace Datalay\Customervalidate\Plugin\Controller\Account;

//use Magento\Customer\Api\CustomerRepositoryInterface;

class RestrictCustomerData
{    
    /**
    * Before customer save.
    *
    * @param CustomerRepositoryInterface $customerRepository
    * @param CustomerInterface $customer
    * @param null $passwordHash
    * @return array
    *
    */

    public function beforeSave(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Api\Data\CustomerInterface $customer,
        $passwordHash = null
    ) {
        list($nick, $domain) = explode('@', $customer->getEmail(), 2);

        if (in_array($domain, ['163.com', 'mail.ru'], true)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __(
                    'Registration is disabled for you domain'
                )
            );       
        }

        if (strpos($customer->getFirstname(), 'http') !== false) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __(
                    'First Name not valid'
                )
            );       
        }

        if (strpos($customer->getLastname(), 'http') !== false) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __(
                    'Last Name not valid'
                )
            );       
        }

        return [$customer, $passwordHash];
    }
}
