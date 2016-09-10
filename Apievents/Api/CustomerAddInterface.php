<?php

/**
 * Copyright 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Netenrich\Apievents\Api;


/**
 * Defines the service contract for some simple maths functions. The purpose is
 * to demonstrate the definition of a simple web service, not that these
 * functions are really useful in practice. The function prototypes were therefore
 * selected to demonstrate different parameter and return values, not as a good
 * calculator design.
 */
interface CustomerAddInterface
{
    /**
     *@param string $firstname.
     *@param string $middlename.
     *@param string $lastname.
     *@param string $email.
     *@param string $password.
     *@param string $phone.
     *@param string $postcode.
     *@param string $country.
     *@param string $city.
     *@param string $street.
     *@return string customer unique number.
     */
    public function addCustomer($firstname=null,$middlename=null,$lastname=null,$email=null,$password=null,$phone=null,$postcode=null,$country=null,$city=null,$street=null);
}