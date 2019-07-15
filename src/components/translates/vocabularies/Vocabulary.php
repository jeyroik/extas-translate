<?php
namespace extas\components\translates\vocabularies;

use extas\interfaces\translates\vocabularies\IVocabulary;
use extas\components\Item;

/**
 * Class Vocabulary
 *
 * @package extas\components\translates\vocabularies
 * @author jeyroik@gmail.com
 */
class Vocabulary extends Item implements IVocabulary
{
    /**
     * @return string
     */
    public function getSourceLanguage(): string
    {
        return $this->config[static::FIELD__LANGUAGE_SOURCE] ?? '';
    }

    /**
     * @return string
     */
    public function getTranslatedLanguage(): string
    {
        return $this->config[static::FIELD__LANGUAGE_TRANSLATED] ?? '';
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->config[static::FIELD__SOURCE] ?? '';
    }

    /**
     * @return string
     */
    public function getTranslated(): string
    {
        return $this->config[static::FIELD__TRANSLATED] ?? '';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->config[static::FIELD__TYPE] ?? '';
    }

    /**
     * @return string
     */
    public function getTranslateId(): string
    {
        return $this->config[static::FIELD__TRANSLATE_ID] ?? '';
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setSourceLanguage($language)
    {
        $this->config[static::FIELD__LANGUAGE_SOURCE] = (string) $language;

        return $this;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setTranslatedLanguage($language)
    {
        $this->config[static::FIELD__LANGUAGE_TRANSLATED] = (string) $language;

        return $this;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->config[static::FIELD__SOURCE] = (string) $source;

        return $this;
    }

    /**
     * @param string $translated
     *
     * @return $this
     */
    public function setTranslated($translated)
    {
        $this->config[static::FIELD__TRANSLATED] = (string) $translated;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->config[static::FIELD__TYPE] = (string) $type;

        return $this;
    }

    /**
     * @param string $translateId
     *
     * @return $this
     */
    public function setTranslateId($translateId)
    {
        $this->config[static::FIELD__TRANSLATE_ID] = (string) $translateId;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
