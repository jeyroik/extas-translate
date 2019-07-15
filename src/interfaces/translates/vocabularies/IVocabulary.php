<?php
namespace extas\interfaces\translates\vocabularies;

use extas\interfaces\IItem;

/**
 * Interface IVocabulary
 *
 * @package extas\interfaces\translates\vocabularies
 * @author jeyroik@gmail.com
 */
interface IVocabulary extends IItem
{
    const SUBJECT = 'extas.translate.vocabulary';

    const FIELD__LANGUAGE_SOURCE = 'lang_source';
    const FIELD__LANGUAGE_TRANSLATED = 'lang_translated';
    const FIELD__SOURCE = 'source';
    const FIELD__TRANSLATED = 'translated';
    const FIELD__TYPE = 'type';
    const FIELD__TRANSLATE_ID = 'translate_id';

    /**
     * @return string
     */
    public function getSourceLanguage(): string;

    /**
     * @return string
     */
    public function getTranslatedLanguage(): string;

    /**
     * @return string
     */
    public function getSource(): string;

    /**
     * @return string
     */
    public function getTranslated(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getTranslateId(): string;

    /**
     * @param $language string
     *
     * @return $this
     */
    public function setSourceLanguage($language);

    /**
     * @param $language string
     *
     * @return $this
     */
    public function setTranslatedLanguage($language);

    /**
     * @param $source string
     *
     * @return $this
     */
    public function setSource($source);

    /**
     * @param $translated string
     *
     * @return $this
     */
    public function setTranslated($translated);

    /**
     * @param $type string
     *
     * @return $this
     */
    public function setType($type);

    /**
     * @param $translateId string
     *
     * @return $this
     */
    public function setTranslateId($translateId);
}
