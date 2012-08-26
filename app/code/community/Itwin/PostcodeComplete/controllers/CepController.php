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

class Itwin_PostcodeComplete_CepController extends Mage_Core_Controller_Front_Action
{
    
    public function _getConfig() 
    {
        if (is_null($this->_config)) 
        {
            $this->_config = Mage::getModel('postcodecomplete/config');
        }
        return $this->_config;
    }
    
    public function getService()
    {
        return Mage::getModel('postcodecomplete/service');
    }
    
    public function numberAction()
    {   
        if ($this->_getConfig()->isActivePostcodeComplete()) 
        {
            $params = $this->getRequest()->getParams();
            echo $this->getService()->getAddress($params['zip']);
        }
    }
    
}