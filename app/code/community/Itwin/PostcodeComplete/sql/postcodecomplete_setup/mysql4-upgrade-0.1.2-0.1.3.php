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

$installer = $this;
 
$installer->startSetup();
 
$installer->run("

DROP TABLE IF EXISTS `{$this->getTable('itwin_postcodecomplete_mappingfields')}`;

CREATE TABLE `{$this->getTable('itwin_postcodecomplete_mappingfields')}` (
  `id` int(3) unsigned NOT NULL auto_increment,
  `active` int(1) unsigned NOT NULL DEFAULT '1',
  `groups` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `mapping` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
   
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'billing', 'cep', 'postcode');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`, `options`) values ('1', 'billing', 'logradouro', 'street', '1');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`, `options`) values ('1', 'billing', 'bairro', 'street', '2');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'billing', 'cidade', 'city');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'billing', 'uf', 'region');
    
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'shipping', 'cep', 'postcode');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`, `options`) values ('1', 'shipping', 'logradouro', 'street', '1');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`, `options`) values ('1', 'shipping', 'bairro', 'street', '2');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'shipping', 'cidade', 'city');
INSERT INTO {$this->getTable('itwin_postcodecomplete_mappingfields')} (`active`, `groups`, `field`, `mapping`) values ('1', 'shipping', 'uf', 'region');
    
");

$installer->endSetup();