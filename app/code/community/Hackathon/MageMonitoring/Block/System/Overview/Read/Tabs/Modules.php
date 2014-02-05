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
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Hackathon
 * @package     Hackathon_MageMonitoring
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Hackathon_MageMonitoring_Block_System_Overview_Read_Tabs_Modules
    extends Mage_Adminhtml_Block_Abstract
{
    protected $_template = 'monitoring/modules.phtml';

    public function getModulesList()
    {
        $modules = array('core' => array(), 'community' => array(), 'local' => array());
        foreach ((array)Mage::getConfig()->getModuleConfig() as $key => $module) {
                switch ($module->codePool) {
                    case 'community':
                        $modules['community'][$key] = $module;
                        break;
                    case 'local':
                        $modules['local'][$key] = $module;
                        break;
                    default:
                        $modules['core'][$key] = $module;
                    break;
                }
            }
        return $modules;
    }
}