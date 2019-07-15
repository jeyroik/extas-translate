<?php
namespace extas\interfaces\translates;

use extas\interfaces\IItem;

/**
 * Interface ITranslateCoder
 *
 * @package extas\interfaces\translates
 * @author jeyroik@gmail.com
 */
interface ITranslateCoder extends IItem
{
    const SUBJECT = 'extas.translate.coder';

    const STAGE__TRANSLATE_TO_LANG = 'extas.translate.to';

    /**
     * @param $text
     * @param $type
     * @param $lang
     *
     * @return string
     */
    public function pack($text, $type, $lang): string;

    /**
     * @param $translateId
     *
     * @return ITranslated
     */
    public function translate($translateId);

    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getLang(): string;
}
