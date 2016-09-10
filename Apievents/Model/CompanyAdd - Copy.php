<?php

/**
 * Copyright 2016 NetEnrich. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Netenrich\Apievents\Model;

use Netenrich\Apievents\Api\CompanyAddInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\InputException;

/**
 * Defines the implementaiton class of the calculator service contract.
 */
class CompanyAdd implements CompanyAddInterface
{
    

    protected $companyFactory;
    protected $companypathFactory;
    public function __construct(
\Magento\Framework\App\Action\Context $context,
\Netenrich\Apievents\Model\CompanyFactory $companyFactory,
\Netenrich\Apievents\Model\CompanypathFactory $companypathFactory
)
{
    $this->companyFactory = $companyFactory;
    $this->companypathFactory=$companypathFactory;
    
}


    public function addCompany($companyname=null,$address1=null,$address2=null,$country=null,$state=null,$city=null,$zip=null,$website=null,$phone=null,$fax=null,$organisationtype=null,$parent_id=null,$activated=null,$email=null,$payment_method=null,$notes=null) {
  
       
        //-----  THIS CODE SNIPPET INSERT THE VALUES INTO DB TABLE ------
         
        $companynameexist = $this->companyFactory->create();
        $companynameexist->load($companyname,'name');
        $alreadyexist=$companynameexist->getName();
        $orgtypevalid=$this->validOrgType($organisationtype);
         if($alreadyexist==null && $companyname!=null && $email!=null && $organisationtype!=null && $parent_id!=NULL && $orgtypevalid==true){
        $company1 = $this->companyFactory->create();
         $company1->setName($companyname);
         $company1->setAddress($address1);
         $company1->setData('address2',$address2);
         $company1->setCountry($country);
         $company1->setState($state);
         $company1->setCity($city);
         $company1->setZip($zip);
         $company1->setWebsite($website);
         $company1->setPhone($phone);
         $company1->setFax($fax);
         $company1->setOrgTypeId($organisationtype);
         $company1->setParent_id($parent_id);
         $company1->setActivated($activated);
         $company1->setEmail($email);
         $company1->setPaymentMethod($payment_method);
         $company1->setNotes($notes);
         $company1->save();
         $company2 = $this->companyFactory->create();
         $company2->load($companyname,'name');
         $organisationId=$company2->getOrgId(); 
         $this->orgTypePath($organisationId,$organisationtype);
         return $organisationId;
    }
    else
    {
        if( $alreadyexist!=NULL){
        throw new InputException(__('company already exist'));}
        else{throw new InputException(__('mandatory values are not defined are '));}
    }
    }
    /**
     * update organisation_path data depending upon organisation type
     * @param string $organisationId
     * @param string $organisationtype
     */
    public function orgTypePath($organisationId,$organisationtype)
        {

            switch ($organisationtype) {
                case '4':
                    $companypath1 = $this->companypathFactory->create();
                    $companypath1->setOrgId($organisationId);
                    $companypath1->setPath($organisationtype);
                    $companypath1->setlevel("400");
                    $companypath1->save();
                    $companypath2 = $this->companypathFactory->create();
                    $companypath2->setOrgId($organisationId);
                    $companypath2->setPath("3");
                    $companypath2->setlevel("300");
                    $companypath2->save();
                    $companypath3 = $this->companypathFactory->create();
                    $companypath3->setOrgId($organisationId);
                    $companypath3->setPath("2");
                    $companypath3->setlevel("200");
                    $companypath3->save();
                    $companypath4 = $this->companypathFactory->create();
                    $companypath4->setOrgId($organisationId);
                    $companypath4->setPath("1");
                    $companypath4->setlevel("100");
                    $companypath4->save();
                    break;
                case '3':
                    $companypath1 = $this->companypathFactory->create();
                    $companypath1->setOrgId($organisationId);
                    $companypath1->setPath($organisationtype);
                    $companypath1->setlevel("300");
                    $companypath1->save();
                    $companypath2 = $this->companypathFactory->create();
                    $companypath2->setOrgId($organisationId);
                    $companypath2->setPath("2");
                    $companypath2->setlevel("200");
                    $companypath2->save();
                    $companypath3 = $this->companypathFactory->create();
                    $companypath3->setOrgId($organisationId);
                    $companypath3->setPath("1");
                    $companypath3->setlevel("100");
                    $companypath3->save();
                    break;
                case '2':
                    $companypath1 = $this->companypathFactory->create();
                    $companypath1->setOrgId($organisationId);
                    $companypath1->setPath($organisationtype);
                    $companypath1->setlevel("200");
                    $companypath1->save();
                    $companypath2 = $this->companypathFactory->create();
                    $companypath2->setOrgId($organisationId);
                    $companypath2->setPath("1");
                    $companypath2->setlevel("100");
                    $companypath2->save();
                    # code...
                    break;
                case '1':
                    $companypath1 = $this->companypathFactory->create();
                    $companypath1->setOrgId($organisationId);
                    $companypath1->setPath($organisationtype);
                    $companypath1->setlevel("100");
                    $companypath1->save();
                    # code...
                    break;
                default:

                    # code...
                    break;
            }
            
        }

        /**
     * update organisation_path data depending upon organisation type
     * @param string $organisationId
     */
    public function validOrgType($organisationtype)
        {
            if ($organisationtype<=4 && $organisationtype>=1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
}