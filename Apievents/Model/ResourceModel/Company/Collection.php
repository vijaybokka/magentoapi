<?php

/**
 * Company Resource Collection
 */
namespace Netenrich\Apievents\Model\ResourceModel\Company;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Netenrich\Apievents\Model\Company', 'Netenrich\Apievents\Model\ResourceModel\Company');
    }
}
