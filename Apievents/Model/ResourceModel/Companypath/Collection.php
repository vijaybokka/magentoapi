<?php

/**
 * Company Resource Collection
 */
namespace Netenrich\Apievents\Model\ResourceModel\Companypath;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Netenrich\Apievents\Model\Companypath', 'Netenrich\Apievents\Model\ResourceModel\Companypath');
    }
}
