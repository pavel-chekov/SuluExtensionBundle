<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as SymfonyNotFoundHttpException;

class NotFoundHttpException extends SymfonyNotFoundHttpException
{
    public function __construct($id, $entity, \Exception $previous = null, int $code = 0)
    {
        parent::__construct(
            sprintf(
                'The resource "%s" with id "%s"',
                $id,
                $entity
            ),
            $previous,
            $code
        );
    }
}
