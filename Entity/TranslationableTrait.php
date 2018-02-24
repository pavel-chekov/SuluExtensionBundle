<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Entity;

use Doctrine\Common\Collections\Collection;

trait TranslationableTrait
{
    /**
     * @var Collection|TranslationInterface[]
     */
    private $translations;

    public function addTranslation(TranslationInterface $translation)
    {
        $this->translations[] = $translation;

        return $this;
    }

    public function removeTranslation(TranslationInterface $translation)
    {
        $this->translations->removeElement($translation);

        return $this;
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function getTranslation($locale)
    {
        foreach ($this->translations as $translation) {
            if ($locale === $translation->getLocale()) {
                return $translation;
            }
        }
    }
}
