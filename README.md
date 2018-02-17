# magento2-nocustomerspam
Very simple Magento 2 extension that adds extra validations to customer account creation. FirstName and LastName fields cannot contain "http" and some domains are forbidden for email addresses.

This is a very simple Magento 2 plugin that adds some checks in beforeSave in Magento\Customer\Api\CustomerRepositoryInterface. We are finding lots of spam customer accounts created recently in Magento websites. Spammers create an account with some spam links in the customer FirstName or LastName, then Magento sends the "Welcome to..." email and the website is effectively acting as a spam relay.

As a quick and simple fix, this plugin adds some basic checks to FirstName, LastName and email domain so this is not possible anymore.
