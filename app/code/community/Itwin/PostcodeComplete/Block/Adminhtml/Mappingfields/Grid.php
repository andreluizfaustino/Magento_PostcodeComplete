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

class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields_Grid extends Mage_Adminhtml_Block_Widget_Form 
{

    public function __construct() 
    {
        parent::__construct();
        $this->setTemplate('itwin/postcodecomplete/adminhtml/mappingfields/grid/form/form.phtml');
        $this->setId('postcodecomplete_mappingfields_form');
        $this->setTitle($this->__('Mapping of fields'));
    }

    protected function _prepareForm() 
    {
        $this->setChild('grid_plus', $this->getLayout()->createBlock('postcodecomplete/adminhtml_mappingfields_grid_plus'));
        return $this;
    }

}