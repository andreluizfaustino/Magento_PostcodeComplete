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
 * to developer@itwin.com.brm so we can send you a copy immediately.
 *
 * @category   Itwin
 * @package    Itwin_PostcodeComplete
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

set_include_path(get_include_path().PS.Mage::getBaseDir('lib').DS.'Itwin/phpQuery');

require_once('phpQuery.php');


class Itwin_PostcodeComplete_Model_Service
{
    public function _getConfig() 
    {
        if (is_null($this->_config)) 
        {
            $this->_config = Mage::getModel('postcodecomplete/config');
        }
        return $this->_config;
    }
    
    public function simple_curl($url, $post=array(), $get=array()) 
    {
        $url = explode('?', $url, 2);
        if (count($url) === 2) {
            $temp_get = array();
            parse_str($url[1], $temp_get);
            $get = array_merge($get, $temp_get);
        }

        $ch = curl_init($url[0] . "?" . http_build_query($get));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
    }
     
    public function getAddress($value)
    {      
        $cep = $value;

        $url = $this->_getConfig()->getWebserviceUrl();
        
        $html = $this->simple_curl($url, array('cepEntrada' => $cep, 'tipoCep' => '', 'cepTemp' => '', 'metodo' => 'buscarCep'));
        
        phpQuery::newDocumentHTML($html, $charset = 'UTF-8');

        $dados = array(
                        'logradouro'=> trim(pq('.caixacampobranco .resposta:contains("Logradouro: ") + .respostadestaque:eq(0)')->html()),
                        'bairro'=> trim(pq('.caixacampobranco .resposta:contains("Bairro: ") + .respostadestaque:eq(0)')->html()),
                        'cidade/uf'=> trim(pq('.caixacampobranco .resposta:contains("Localidade / UF: ") + .respostadestaque:eq(0)')->html()),
                        'cep'=> trim(pq('.caixacampobranco .resposta:contains("CEP: ") + .respostadestaque:eq(0)')->html())
                      );

       
        $dados['cidade/uf'] = explode('/',$dados['cidade/uf']);
        $dados['cidade']    = trim($dados['cidade/uf'][0]);
        $dados['uf']        = trim($dados['cidade/uf'][1]);
        unset($dados['cidade/uf']);

        return json_encode($dados);        
    }

}