<?php

namespace Netenrich\Apievents\Model\ResourceModel;

/**
 * Company Resource Model
 */
class Company extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Netenrich_Organisation_Type', 'org_id');
    }
}
