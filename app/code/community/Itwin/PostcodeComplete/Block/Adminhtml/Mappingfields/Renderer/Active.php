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

class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields_Renderer_Active extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Select
{

    public function listOptionsActive()
    {
        return array('0' => 'No', '1' => 'Yes');
    }
    
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {
        $blockNames = $this->listOptionsActive();
                
        $html = '<select style="width: 50px;" id="' . "active_{$row->getId()}" . '" name="' . "active_{$row->getId()}" . '" ' . $this->getColumn()->getValidateClass() . '>';
                
        $value = $row->getActive();
        
        foreach ($blockNames as $val => $label) {
            $selected = (($val == $value && (!is_null($value))) ? ' selected="selected"' : '' );
            $html .= '<option value="' . $val . '"' . $selected . '>';
            $html .= $this->escapeHtml($label) . '</option>';
        }
        
        $html.='</select>';
        
        return $html;
    }

}
