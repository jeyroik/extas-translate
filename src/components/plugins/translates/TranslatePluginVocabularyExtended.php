<?php
namespace extas\components\plugins\translates;

use extas\interfaces\translates\vocabularies\IVocabulary;
use extas\interfaces\translates\vocabularies\IVocabularyRepository;
use extas\components\plugins\Plugin;
use extas\components\SystemContainer;

/**
 * Class TranslatePluginVocabularyExtended
 *
 * @package extas\components\plugins\translates
 * @author jeyroik@gmail.com
 */
class TranslatePluginVocabularyExtended extends Plugin
{
    /**
     * @param $vocabulary
     * @param $languageSource
     * @param $languageTranslated
     */
    public function __invoke(&$vocabulary, $languageSource, $languageTranslated)
    {
        /**
         * @var $vocRepo IVocabularyRepository
         * @var $vocItems IVocabulary[]
         */
        $vocRepo = SystemContainer::getItem(IVocabularyRepository::class);
        $vocItems = $vocRepo->all([
            IVocabulary::FIELD__LANGUAGE_SOURCE => $languageSource,
            IVocabulary::FIELD__LANGUAGE_TRANSLATED => $languageTranslated
        ]);

        foreach ($vocItems as $item) {
            $vocabulary[$item->getSource()] = $item->getTranslated();
        }
    }
}
