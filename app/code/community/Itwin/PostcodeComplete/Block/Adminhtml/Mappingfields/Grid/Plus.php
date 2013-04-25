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
class Itwin_PostcodeComplete_Block_Adminhtml_Mappingfields_Grid_Plus extends Mage_Adminhtml_Block_Widget_Grid
{
   
    public function __construct() 
    {
        parent::__construct();
        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('postcodecomplete_mappingfields_grid');
        $this->setDefaultDir('asc');
        $this->setDefaultLimit(50);
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(true);
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass() 
    {
        // This is the model we are using for the grid
        return 'postcodecomplete/mappingfields_grid_collection';
    }
  
    protected function _prepareCollection() 
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
   
    
    protected function _prepareColumns() 
    {
        $this->addColumn('active', array(
            'header'        => $this->__('Active'),
            'width'         => '100px',
            'index'         => 'active',
            'name'          => 'active',
            'align'         => 'center',
            'renderer'      => 'postcodecomplete/adminhtml_mappingfields_renderer_active'
        ));

        $this->addColumn('group', array(
            'header'        => $this->__('Group of attributes'),
            'width'         => '100px',
            'index'         => 'groups',
            'name'          => 'groups'
        ));

        $this->addColumn('field', array(
            'header'        => $this->__('Field'),
            'width'         => '200px',
            'index'         => 'field',
            'name'          => 'field'
        ));

        $this->addColumn('mapping', array(
            'header'        => $this->__('Mapping'),
            'width'         => '200px',
            'index'         => 'mapping',
            'name'          => 'mapping',
            'align'         => 'center',                                    
            'renderer'      => 'postcodecomplete/adminhtml_mappingfields_renderer_mapping'
        ));

        $this->addColumn('options', array(
            'header'        => $this->__('Options mapping'),
            'width'         => '200px',
            'index'         => 'options',
            'name'          => 'options',
            'align'         => 'center',
            'renderer'      => 'postcodecomplete/adminhtml_mappingfields_renderer_options'
        ));
        
        return parent::_prepareColumns(); 
    }

}