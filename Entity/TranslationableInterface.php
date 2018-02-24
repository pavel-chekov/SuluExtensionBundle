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

/**
 * Interface TranslationableInterface
 *
 * @package Chekov\Bundle\ExtensionBundle\Entity
 */
interface TranslationableInterface
{
    /**
     * Add translation
     *
     * @param TranslationInterface $translation
     *
     * @return $this
     */
    public function addTranslation(TranslationInterface $translation);

    /**
     * Remove translation
     *
     * @param TranslationInterface $translation
     *
     * @return $this
     */
    public function removeTranslation(TranslationInterface $translation);

    /**
     * Get translations
     *
     * @return Collection|TranslationInterface[]
     */
    public function getTranslations();

    /**
     * @param string $locale
     *
     * @return TranslationInterface|null
     */
    public function getTranslation($locale);
}
