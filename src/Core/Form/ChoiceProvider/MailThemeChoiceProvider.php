<?php
/**
 * 2007-2019 PrestaShop SA and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Form\ChoiceProvider;

use PrestaShop\PrestaShop\Core\Form\FormChoiceProviderInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCatalogInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeCollectionInterface;
use PrestaShop\PrestaShop\Core\MailTemplate\ThemeInterface;

/**
 * Class MailThemeChoiceProvider is responsible to provide a list of available mail themes.
 */
class MailThemeChoiceProvider implements FormChoiceProviderInterface
{
    /** @var array */
    private $choices;

    /** @var ThemeCatalogInterface */
    private $themeCatalog;

    /**
     * @param ThemeCatalogInterface $themeCatalog
     */
    public function __construct(ThemeCatalogInterface $themeCatalog)
    {
        $this->themeCatalog = $themeCatalog;
    }

    /**
     * {@inheritdoc}
     */
    public function getChoices()
    {
        if (null === $this->choices) {
            $this->choices = [];

            /** @var ThemeCollectionInterface $collection */
            $collection = $this->themeCatalog->listThemes();

            /** @var ThemeInterface $theme */
            foreach ($collection as $theme) {
                $this->choices[$theme->getName()] = $theme->getName();
            }
        }

        return $this->choices;
    }
}
