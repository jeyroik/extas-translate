<?php
namespace extas\components\translates;

use extas\interfaces\translates\ITranslate;
use extas\components\Item;

/**
 * Class Translate
 *
 * @package extas\components\translates
 * @author jeyroik@gmail.com
 */
class Translate extends Item implements ITranslate
{
    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->config[static::FIELD__LANGUAGE] ?? '';
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->config[static::FIELD__TEXT] ?? '';
    }

    /**
     * @return string
     */
    public function getMessageType(): string
    {
        return $this->config[static::FIELD__MESSAGE_TYPE] ?? '';
    }

    public function getId(): string
    {
        return $this->config[static::FIELD__ID] ?? '';
    }

    /**
     * @param string $language
     *
     * @return $this|ITranslate
     */
    public function setLanguage($language)
    {
        $this->config[static::FIELD__LANGUAGE] = $language;

        return $this;
    }

    /**
     * @param string $text
     *
     * @return $this|ITranslate
     */
    public function setText($text)
    {
        $this->config[static::FIELD__TEXT] = $text;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return $this|ITranslate
     */
    public function setId($id)
    {
        $this->config[static::FIELD__ID] = $id;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this|ITranslate
     */
    public function setMessageType($type)
    {
        $this->config[static::FIELD__MESSAGE_TYPE] = $type;

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
