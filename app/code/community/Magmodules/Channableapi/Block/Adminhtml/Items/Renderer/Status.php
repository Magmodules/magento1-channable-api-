<?php
/**
 * Magmodules.eu - http://www.magmodules.eu
 *
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magmodules.eu so we can send you a copy immediately.
 *
 * @category      Magmodules
 * @package       Magmodules_Channableapi
 * @author        Magmodules <info@magmodules.eu>
 * @copyright     Copyright (c) 2018 (http://www.magmodules.eu)
 * @license       http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 *
 */

class Magmodules_Channableapi_Block_Adminhtml_Items_Renderer_Status
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    /**
     * @param Varien_Object $row
     *
     * @return string with html link to order view
     */
    public function render(Varien_Object $row)
    {
        $status = $row->getData('status');
        $callResult = $row->getData('call_result');
        $attempts = $row->getData('attempts');

        $html = $status;
        $message = '';

        if ($status == 'Not Found' && $attempts > 1) {
            $message .= __('Removed item from que after %1 attempts.', $attempts) . '<br/>';
        }

        if (!empty($callResult)) {
            $message .= '<i>API: "' . $callResult . '"</i><br/>';
            if ($attempts > 1) {
                $message .= __('Attempts: %s', $attempts);
            }
        }

        if (!empty($message)) {
            $html .= ' <a href="#" class="chanable-tooltip" >(?)<span>' . $message . '</span></a>';
        }

        return $html;
    }

}