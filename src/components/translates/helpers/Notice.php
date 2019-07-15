<?php
namespace extas\components\translates\helpers;

use extas\components\translates\TranslateCoder;
use extas\interfaces\translates\ITranslate;

/**
 * Class Notice
 *
 * @package extas\components\translates\helpers
 * @author jeyroik@gmail.com
 */
class Notice extends TranslateCoder
{
    /**
     * @param $text
     * @param string $lang
     *
     * @return TranslateCoder
     */
    public static function make($text, $lang = ITranslate::LANG__RU)
    {
        return new TranslateCoder([
            ITranslate::FIELD__TEXT => $text,
            ITranslate::FIELD__MESSAGE_TYPE => ITranslate::TYPE__NOTICE,
            ITranslate::FIELD__LANGUAGE => $lang
        ]);
    }
}
