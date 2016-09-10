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
interface CompanyAddInterface
{
    /**
     * Return the sum of the two numbers.
     *
     * @api
     *@param string $companyname.
     *@param string $address1.
     *@param string $address2.
     *@param string $country.
     *@param string $state.
     *@param string $city.
     *@param string $zip.
     *@param string $website.
     *@param string $phone.
     *@param string $fax.
     *@param string $organisationtype.
     *@param string $parent_id.
	 *@param string $activated.
	 *@param string $email.
	 *@param string $payment_method.
	 *@param string $notes.
     *@throws \Magento\Framework\Exception\InputException If bad input is provided
     *@return string The sum of the numbers. 
     */
    public function addCompany($companyname=null,$address1=null,$address2=null,$country=null,$state=null,$city=null,$zip=null,$website=null,$phone=null,$fax=null,$organisationtype=null,$parent_id=null,$activated=null,$email=null,$payment_method=null,$notes=null);
}