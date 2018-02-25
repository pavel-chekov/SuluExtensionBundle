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

use Doctrine\ORM\EntityManagerInterface;

trait ExtensionRepositoryTrait
{
    /**
     * @var EntityManagerInterface
     */
    protected $_em;

    abstract public function getClassName();

    public function get($id, $filters = [])
    {
        return $this->find($id);
    }

    public function remove($id)
    {
        $this->_em->remove(
            $this->_em->getReference(
                $this->getClassName(),
                $id
            )
        );
    }

    public function persist($entity)
    {
        $this->_em->persist($entity);
    }

    public function flush()
    {
        $this->_em->flush();
    }
}
