/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Itwin
 * @package     Itwin_PostcodeComplete
 * @license     http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

Event.observe(window, 'load', function() {
     $('billing:postcode').observe('keyup', execWebserviceBilling);
     $('shipping:postcode').observe('keyup', execWebserviceShipping);
});

function execWebserviceBilling()
{
    if ($('billing:postcode').getValue().length == 8)
    {
        document.getElementById("billing:street1").focus();
        funcaowebservicecep(postcode_complete_baseurl, 'billing');
    }        
}
    
function execWebserviceShipping()    
{
    if ($('shipping:postcode').getValue().length == 8)
    {
        document.getElementById("shipping:street1").focus();
        funcaowebservicecep(postcode_complete_baseurl, 'shipping');
    }        
}

function getHTTPObject() {
    var xmlhttp;
    /*@cc_on
	  @if (@_jscript_version >= 5)
	    try {
	      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	      } catch (e) {
	      try {
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        } catch (E) {
	        xmlhttp = false;
	        }
	      }
	  @else
	  xmlhttp = false;
	  @end @*/
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        try {
            xmlhttp = new XMLHttpRequest();
        } catch (e) {
            xmlhttp = false;
        }
    }
    return xmlhttp;
}

function funcaowebservicecep(baseurl, typefield) 
{   
    var http = getHTTPObject();
    
    alert(typefield);
    
    if (typefield == 'billing') 
    {
        http.open("GET", baseurl + 'index.php/postcodecomplete/cep/number/zip/' + $("billing:postcode").getValue(), true);
    }
    
    if (typefield == 'shipping') 
    {    
        http.open("GET", baseurl + 'index.php/postcodecomplete/cep/number/zip/' + $("shipping:postcode").getValue(), true);
    }        
    
    http.onreadystatechange = handleHttpResponse;
    http.send(null);

    var arr; //array com os dados retornados
    function handleHttpResponse() 
    {
        if (http.readyState == 4) 
        {   
            var response = http.responseText;
            eval("var arr = "+response); //cria objeto com o resultado
                        
            switch(typefield)
            {
                case 'billing':
                        document.getElementById("billing:street1").value = arr.logradouro;
                        document.getElementById("billing:street2").value = arr.bairro;
                        document.getElementById("billing:city").value = arr.cidade;
                        document.getElementById("billing:region").value = arr.uf;
                        //document.getElementById("billing:street4").value = arr.complemento;
                        document.getElementById("billing:street1").focus();
                    break;
                case 'shipping':
                        document.getElementById("shipping:street1").value = arr.logradouro;
                        document.getElementById("shipping:street2").value = arr.bairro;
                        document.getElementById("shipping:city").value = arr.cidade;
                        document.getElementById("shipping:region").value = arr.uf;
                        //document.getElementById("shipping:street4").value = arr.complemento;
                        document.getElementById("shipping:street1").focus();                    
                    break;
            }
        }
    }
}