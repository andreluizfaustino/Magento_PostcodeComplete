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

class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields extends Mage_Adminhtml_Block_Widget_Grid_Container 
{
    
    public function __construct() 
    {
        parent::__construct();
        $this->_objectId = 'mappingfields';
        $this->_controller = 'adminhtml_mappingfields';
        $this->_blockGroup = 'postcodecomplete';
        $this->_mode = 'postcodecomplete';
        $this->_headerText = Mage::helper('postcodecomplete')->__('Mapping of references');
        
        $this->_addButton('save', array(
                  'label'   => Mage::helper('adminhtml')->__('Save mapping'),
                  'onclick' => "saveAndContinueEdit()",
                  'class'   => 'save',
        ), -100);

        $this->removeButton('add');
    }   
    
}