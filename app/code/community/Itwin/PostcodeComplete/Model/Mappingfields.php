<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to developer@itwin.com.br so we can send you a copy immediately.
 *
 * @category   Itwin
 * @package    Itwin_PostcodeComplete
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Itwin_PostcodeComplete_Model_Mappingfields extends Mage_Core_Model_Abstract
{
    public function _construct() 
    {
        parent::_construct();
        $this->_init('postcodecomplete/mappingfields');
    }

    public function updateFields($data)
    {       
        $collection = Mage::getResourceModel('postcodecomplete/mappingfields_grid_collection');

        for ($i=1; $i<=$collection->count(); $i++)
        {
            if (isset($data['mapping_'.$i])) 
            {
                $active = $data['active_'.$i];
            }

            if (isset($data['mapping_'.$i]))
            {
                $mapping = $data['mapping_'.$i];
            }

            if (isset($data['options_'.$i]))
            {
                $options = $data['options_'.$i];
            }
            
            $currentRecord = $this->load($i);

            $currentRecord->setData('active', $active);
            
            $currentRecord->setData('field_mapping', $mapping);
            
            $currentRecord->setData('options', $options);
            
            $currentRecord->save();
            
            unset($active);

            unset($mapping);
            
            unset($options);          

        }
        
    }

}