<?php
namespace extas\components\translates;

use extas\interfaces\translates\ITranslate;
use extas\interfaces\translates\ITranslated;
use extas\components\Item;

/**
 * Class Translated
 *
 * @package extas\components\translates
 * @author jeyroik@gmail.com
 */
class Translated extends Item implements ITranslated
{
    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->config[static::FIELD__TEXT] ?? '';
    }

    /**
     * @return ITranslate
     */
    public function getTranslate(): ITranslate
    {
        return $this->config[static::FIELD__TRANSLATE] ?? new Translate();
    }

    /**
     * @param string $text
     *
     * @return $this|ITranslated
     */
    public function setText($text)
    {
        $this->config[static::FIELD__TEXT] = $text;

        return $this;
    }

    /**
     * @param ITranslate $translate
     *
     * @return $this|ITranslated
     */
    public function setTranslate(ITranslate $translate)
    {
        $this->config[static::FIELD__TRANSLATE] = $translate;

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
