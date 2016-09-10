<?php

/**
 * Copyright 2016 NetEnrich. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Netenrich\Apievents\Model;

use Netenrich\Apievents\Api\CustomerAddInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Encryption\EncryptorInterface as Encryptor;
use Magento\Framework\Encryption\Helper\Security;

/**
 * Defines the implementaiton class of the calculator service contract.
 */
class CustomerAdd implements CustomerAddInterface
{

     

     protected $customerFactory;
     protected $addressFactory;
     public function __construct(
\Magento\Framework\App\Action\Context $context,
\Magento\Customer\Model\CustomerFactory $customerFactory,
\Magento\Customer\Model\AddressFactory $addressFactory

)
{
    $this->customerFactory = $customerFactory;
    $this->addressFactory = $addressFactory;
    
}




    public function addCustomer($firstname=null,$middlename=null,$lastname=null,$email=null,$password=null,$phone=null,$postcode=null,$country=null,$city=null,$street=null) 
            {
                $customermodel= $this->customerFactory->create();
                $customermodel->setFirstname($firstname);
                $customermodel->setMiddlename($middlename);
                $customermodel->setLastname($lastname);
                $customermodel->setEmail($email);
                $customermodel->save();
                $customerentityid=$customermodel->getEntityId();
              
                $addressmodel= $this->addressFactory->create();
                $addressmodel->setTelephone($phone);
                $addressmodel->setPostcode($postcode);
                $addressmodel->setCity($city);
                $addressmodel->setCountryId($country);
                $addressmodel->setFirstname($firstname);
                $addressmodel->setLastname($lastname);
                $addressmodel->setStreet($street);
                $addressmodel->setParentId($customermodel->getEntityId());
                $addressmodel->save();

                $customermodel->setDefaultBilling($addressmodel->getEntityId());
                $customermodel->save();
                return  $customermodel->getEntityId();

            }

    
}