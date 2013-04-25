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

class Itwin_PostcodeComplete_Helper_Data extends Mage_Core_Helper_Abstract
{
    
    public function getMappingValue($groups, $field)
    {
        $_data = Mage::getModel('postcodecomplete/mappingfields')
                ->getCollection()
                ->addFieldToFilter('groups',$groups)
                ->addFieldToFilter('field',$field)
                ->getData();
        $data = $_data[0];
        
        if ($data['mapping'] == 'street') {
            return $data['mapping'].$data['options'];
        }       
        return $data['mapping'];
    }
    
    public function getMappingValueCustomer($groups, $field)
    {
        $_data = Mage::getModel('postcodecomplete/mappingfields')
                ->getCollection()
                ->addFieldToFilter('groups',$groups)
                ->addFieldToFilter('field',$field)
                ->getData();
        $data = $_data[0];
        
        if ($data['mapping'] == 'street') {
            return $data['mapping'].'_'.$data['options'];
        }       
        return $data['mapping'];
    }
    
    
    
}
