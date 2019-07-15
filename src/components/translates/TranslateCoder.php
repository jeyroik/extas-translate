<?php
namespace extas\components\translates;

use extas\interfaces\translates\ITranslate;
use extas\interfaces\translates\ITranslateCoder;
use extas\interfaces\translates\ITranslated;
use extas\interfaces\translates\ITranslateRepository;
use extas\components\Item;
use extas\components\SystemContainer;

/**
 * Class TranslateCoder
 *
 * @package extas\components\translates
 * @author jeyroik@gmail.com
 */
class TranslateCoder extends Item implements ITranslateCoder
{
    const SALT = '@deflou.salt';

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->generateId(
            $this->getText(),
            $this->getType(),
            $this->getLang()
        );
    }

    /**
     * @param $text
     * @param $type
     * @param $lang
     *
     * @return string
     */
    public function pack($text, $type, $lang): string
    {
        return $this->generateId($text, $type, $lang);
    }

    /**
     * @param $translateId
     *
     * @return ITranslated
     */
    public function translate($translateId)
    {
        /**
         * @var $translateRepo ITranslateRepository
         * @var $translate ITranslate
         */
        $translateRepo = SystemContainer::getItem(ITranslateRepository::class);
        $translate = $translateRepo->find([ITranslate::FIELD__ID => $translateId])->one();

        if ($translate) {
            $translated = '';
            $stage = static::STAGE__TRANSLATE_TO_LANG . '.' . $translate->getLanguage();
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($translated, $translate);
            }
            $translated = $translated ?: $translate->getText();
        } else {
            $translated = $translateId;
        }

        return new Translated([
            ITranslated::FIELD__TEXT => $translated,
            ITranslated::FIELD__TRANSLATE => $translate
        ]);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->config[ITranslate::FIELD__TEXT] ?? '';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->config[ITranslate::FIELD__MESSAGE_TYPE] ?? '';
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->config[ITranslate::FIELD__LANGUAGE] ?? '';
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }

    /**
     * @param $text
     * @param $type
     * @param $lang
     *
     * @return string
     */
    protected function generateId($text, $type, $lang)
    {
        $translateId = sha1($text . $type . $lang . static::SALT);
        /**
         * @var $translateRepo ITranslateRepository
         * @var $translate ITranslate
         */
        $translateRepo = SystemContainer::getItem(ITranslateRepository::class);
        $translate = $translateRepo->find([ITranslate::FIELD__ID => $translateId])->one();

        if (!$translate) {
            $translate = new Translate([
                ITranslate::FIELD__ID => $translateId,
                ITranslate::FIELD__TEXT => $text,
                ITranslate::FIELD__LANGUAGE => $lang,
                ITranslate::FIELD__MESSAGE_TYPE => $type
            ]);
            $translateRepo->create($translate);
        }

        return $translateId;
    }
}
