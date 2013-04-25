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

class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields_Renderer_Options extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Select
{
    public function listOptionsByMapping()
    {
        return array ('' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4' );
    }
    
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {   
        
            $blocksNames = $this->listOptionsByMapping();    
                
            $html = '<select style="width: 50px;" id="' . "options_{$row->getId()}" . '" name="' . "options_{$row->getId()}" . '" ' . $this->getColumn()->getValidateClass() . '>';

            $value = $row->getData('options');

            foreach ($blocksNames as $val => $label) 
            {
                $selected = (($label == $value && (!is_null($value))) ? ' selected="selected"' : '' );
                $html .= '<option value="' . $this->escapeHtml($label) . '"' . $selected . '>';
                $html .= $this->escapeHtml($label) . '</option>';
            }

            $html.='</select>';

            return $html;
    }
}
