<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Data;

interface SerializerInterface
{
    /**
     * @param object $entity
     * @param array $data
     *
     * @return object
     */
    public function deserialize($entity, $data);

    /**
     * @param object $entity
     *
     * @return array
     */
    public function serialize($entity);
}
