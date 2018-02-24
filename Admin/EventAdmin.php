<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Admin;

use Sulu\Bundle\AdminBundle\Admin\Admin;
use Sulu\Bundle\AdminBundle\Navigation\Navigation;
use Sulu\Bundle\AdminBundle\Navigation\NavigationItem;
use Sulu\Component\Security\Authorization\SecurityCheckerInterface;

class ExtensionAdmin extends Admin
{
    /**
     * FormAdmin constructor.
     *
     * @param SecurityCheckerInterface $securityChecker
     * @param string $title
     */
    public function __construct(
        SecurityCheckerInterface $securityChecker,
        $title
    ) {
        // set root navigation
        $rootNavigationItem = new NavigationItem($title);

        // set navigation
        $this->setNavigation(new Navigation($rootNavigationItem));
    }

    public function getCommands()
    {
        return [];
    }

    public function getJsBundleName()
    {
        return 'chekovextension';
    }
}
