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
 * to suporte.developer@buscape-inc.com so we can send you a copy immediately.
 *
 * @category   Itwin
 * @package    Itwin_PostcodeComplete
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Itwin_PostcodeComplete_Model_Config extends Varien_Object
{
    const XML_PATH                  = 'itwin/postcodecomplete/';
        
    protected $_config = array();
    
    public function getConfigData($key, $storeId = null)
    {
        if (!isset($this->_config[$key][$storeId])) {
            $value = Mage::getStoreConfig(self::XML_PATH . $key, $storeId);
            $this->_config[$key][$storeId] = $value;
        }
        return $this->_config[$key][$storeId];
    }
    
    public function isActivePostcodeComplete($store = null)
    {
        if (!$this->hasData('itwin_postcodecomplete_active')) {
            $this->setData('itwin_postcodecomplete_active', $this->getConfigData('active', $store));
        }
        return $this->getData('itwin_postcodecomplete_active');
    }
    
    public function getWebserviceUrl($store = null)
    {
        if (!$this->hasData('itwin_postcodecomplete_urlwebservice')) {
            $this->setData('itwin_postcodecomplete_urlwebservice', $this->getConfigData('urlwebservice', $store));
        }
        return $this->getData('itwin_postcodecomplete_urlwebservice');
    }

}