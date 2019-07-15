<?php
namespace extas\interfaces\translates;

use extas\interfaces\IItem;

/**
 * Interface ITranslated
 *
 * @package extas\interfaces\translates
 * @author jeyroik@gmail.com
 */
interface ITranslated extends IItem
{
    const SUBJECT = 'extas.translate.translated';

    const FIELD__TEXT = 'text';
    const FIELD__TRANSLATE = 'translate';

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return ITranslate
     */
    public function getTranslate(): ITranslate;

    /**
     * @param $text string
     *
     * @return $this
     */
    public function setText($text);

    /**
     * @param ITranslate $translate
     *
     * @return $this
     */
    public function setTranslate(ITranslate $translate);
}
