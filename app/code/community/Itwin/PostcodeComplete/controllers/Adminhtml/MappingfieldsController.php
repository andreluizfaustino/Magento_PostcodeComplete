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

class Itwin_PostcodeComplete_Adminhtml_MappingfieldsController extends Mage_Adminhtml_Controller_Action
{
    
    public function indexAction() 
    {   
        $this->_initAction();
        $this->renderLayout();
    }
    
    public function saveAction() 
    {
        if ($postData = $this->getRequest()->getPost()) 
        {           
            try {
                $collection = Mage::getModel('postcodecomplete/mappingfields')->updateFields($postData);
                
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The mapping of field was done with success.'));
                
                $this->_redirect('*/*/');
                
                return;
                
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('Occurred an erro when save the mapping. Please, try again.'));
            }

            $this->_redirectReferer();
        }
    }

    protected function _initAction() {
        $this->loadLayout()
                ->_setActiveMenu('itwin/postcodecomplete_mappingfields')
                ->_title($this->__('Itwin'))->_title($this->__('postcodecomplete'))
                ->_addBreadcrumb($this->__('Itwin'), $this->__('Itwin'))
                ->_addBreadcrumb($this->__('postcodecomplete'), $this->__('postcodecomplete'));
        return $this;
    }

    protected function _isAllowed() {
        return Mage::getSingleton('admin/session')->isAllowed('sales/postcodecomplete_mappingfields');
    }

}