<?php

namespace Netenrich\Apievents\Model;

/**
 * Apievents Model
 *
 * @method \Netenrich\Apievents\Model\Resource\Page _getResource()
 * @method \Netenrich\Apievents\Model\Resource\Page getResource()
 */
class Companypath extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Netenrich\Apievents\Model\ResourceModel\Companypath');
    }

}
