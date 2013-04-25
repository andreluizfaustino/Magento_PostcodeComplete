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

class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields_Renderer_Mapping extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Select
{
    
    public function listOptionsMapping($row)
    {
        $typeProduct = $row->getGroup();
        
        $result = array();

        switch($typeProduct) {
            /*
            case 'customer':
                $attributes = Mage::getModel('customer/entity_attribute_collection')->load();
                break;
            */
            case 'billing':
            case 'shipping':                
                $attributes = Mage::getModel('customer/entity_address_attribute_collection')->load();
                break;
            
            default:
                $attributes = Mage::getResourceModel('eav/entity_attribute_collection')->load();
                break;
        }
        
        //$attributes = Mage::getResourceModel('eav/entity_attribute_collection')->load();
        //$attributes = Mage::getResourceModel('catalog/product_attribute_collection')->load(false);
        
        foreach ($attributes as $attribute)
        {            
            $result[] = $attribute['attribute_code'];
        }

        return $result;
    }    
    
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {    
        $blocksNames = $this->listOptionsMapping($row);
        
        $html = '<select style="width: 200px;" id="' . "mapping_{$row->getId()}" . '" name="' . "mapping_{$row->getId()}" . '" ' . $this->getColumn()->getValidateClass() . '>';
        
        $value = $row->getData('mapping');
        
        foreach ($blocksNames as $val => $label) {
            $selected = (($label == $value && (!is_null($value))) ? ' selected="selected"' : '' );
            $html .= '<option value="' . $this->escapeHtml($label) . '"' . $selected . '>';
            $html .= $this->escapeHtml($label) . '</option>';
        }
        
        $html.='</select>';
        
        return $html;
    }

}
