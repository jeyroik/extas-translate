<?php
namespace extas\interfaces\translates;

use extas\interfaces\IItem;

/**
 * Interface ITranslate
 *
 * @package extas\interfaces\translates
 * @author jeyroik@gmail.com
 */
interface ITranslate extends IItem
{
    const SUBJECT = 'extas.translate';

    const FIELD__LANGUAGE = 'lang';
    const FIELD__TEXT = 'text';
    const FIELD__MESSAGE_TYPE = 'message_type';
    const FIELD__ID = 'id';

    const LANG__RU = 'ru';
    const LANG__EN = 'en';

    const TYPE__ERROR = 'danger';
    const TYPE__SUCCESS = 'success';
    const TYPE__NOTICE = 'info';
    const TYPE__DEFAULT = 'default';
    const TYPE__HEADER = 'primary';

    /**
     * @return string
     */
    public function getLanguage(): string;

    /**
     * @return mixed
     */
    public function getText();

    /**
     * @return string
     */
    public function getMessageType(): string;

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param $language string
     *
     * @return $this
     */
    public function setLanguage($language);

    /**
     * @param $text string
     *
     * @return $this
     */
    public function setText($text);

    /**
     * @param $type string
     *
     * @return $this
     */
    public function setMessageType($type);

    /**
     * @param $id string
     *
     * @return $this
     */
    public function setId($id);
}
