<?php
namespace extas\components\plugins;

use extas\components\translates\TranslateCoder;
use extas\components\translates\vocabularies\Vocabulary;
use extas\interfaces\translates\ITranslateCoder;
use extas\interfaces\translates\vocabularies\IVocabulary;
use extas\interfaces\translates\vocabularies\IVocabularyRepository;

/**
 * Class TranslatePluginextasInstall
 *
 * @package extas\components\plugins\translates
 * @author jeyroik@gmail.com
 */
class PluginInstallTranslates extends PluginInstallDefault
{
    protected $selfName = 'translate vocabulary item';
    protected $selfSection = 'translates';
    protected $selfRepositoryClass = IVocabularyRepository::class;
    protected $selfUID = IVocabulary::FIELD__TRANSLATE_ID;
    protected $selfItemClass = Vocabulary::class;

    /**
     * @var ITranslateCoder
     */
    protected $coder = null;

    /**
     * @param $item
     * @param $serviceConfig
     *
     * @return string
     */
    protected function getUidValue(&$item, $serviceConfig)
    {
        if (!$this->coder) {
            $this->coder = new TranslateCoder();
        }

        $uid = $this->coder->pack(
            $item[IVocabulary::FIELD__TRANSLATED],
            $item[IVocabulary::FIELD__TYPE],
            $item[IVocabulary::FIELD__LANGUAGE_TRANSLATED]
        );

        $item[$this->selfUID] = $uid;

        return $uid;
    }
}
