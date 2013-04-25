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

Event.observe(window, 'load', function() 
{
    $$('select').each(function(element) 
    {
        if (formatNameSelect(element.name) == 'mapping')
        {
            /* check all inputs mapping after change */
            $(element.name).setAttribute('onchange', 'checkSelect('+ element.name +', options_'+ formatValueSelect(element.name) +');');
                
            if (element.value != 'street')
            {
                disableInput('options_' + formatValueSelect(element.name));
            }
        }
    });
});

function checkSelect(mapping, options)
{
    if (mapping.value == 'street')
    {
        $(options).removeAttribute('disabled');        

    } else {
        
        if (!$(options).hasAttribute('disabled')) 
        { 
            $(options).setAttribute('disabled', 'disabled');
            $(options).addClassName('validate-select');
        }
    }
}

function disableInput(name)
{
    $(name).setAttribute('disabled', 'disabled');
}

function formatValueSelect(value)
{
    return value.replace(/[A-Za-z_]/g, '');
}

function formatNameSelect(value)
{
    return value.replace(/[0-9_]/g, '');
}