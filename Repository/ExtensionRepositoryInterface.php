<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Repository;

use Sulu\Component\Persistence\Repository\RepositoryInterface;

interface ExtensionRepositoryInterface extends RepositoryInterface
{
    /**
     * Get entity by id and filter.
     *
     * @param int|string $id
     * @param array $filters
     *
     * @return object|null
     */
    public function get($id, $filters = []);

    /**
     * Removes and object by its id.
     *
     * A removed object will be removed as a result of the flush operation.
     *
     * @param int|string $id
     */
    public function remove($id);

    /**
     * Persist unknown object for the storage.
     *
     * A persisted object will be stored as a result of the flush operation.
     *
     * @param object $entity
     */
    public function persist($entity);

    /**
     * Flush all changes to the storage.
     */
    public function flush();
}
