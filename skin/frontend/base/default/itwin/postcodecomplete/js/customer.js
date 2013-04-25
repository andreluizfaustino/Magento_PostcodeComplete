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
     $('zip').observe('keyup', execWebserviceCustomer);
});

function execWebserviceCustomer()
{
    if ($('zip').getValue().length == 8)
    {
        document.getElementById(postcodecomplete_customer_logradouro).focus();
        funcaowebservicecep(postcodecomplete_baseurl);
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

function funcaowebservicecep(baseurl) 
{   
    var http = getHTTPObject();
    
    http.open("GET", baseurl + 'index.php/postcodecomplete/cep/number/zip/' + $('zip').getValue(), true);
    http.onreadystatechange = handleHttpResponse;
    http.send(null);

    var arr; //array com os dados retornados
    function handleHttpResponse() 
    {
        if (http.readyState == 4) 
        {   
            var response = http.responseText;
            eval("var arr = "+response); //cria objeto com o resultado
            
            document.getElementById(postcodecomplete_customer_logradouro).value = arr.logradouro;
            document.getElementById(postcodecomplete_customer_bairro).value = arr.bairro;
            document.getElementById(postcodecomplete_customer_cidade).value = arr.cidade;
            document.getElementById(postcodecomplete_customer_uf).value = arr.uf;
            //document.getElementById("billing:street4").value = arr.complemento;
            document.getElementById(postcodecomplete_customer_logradouro).focus();

        }
    }
}