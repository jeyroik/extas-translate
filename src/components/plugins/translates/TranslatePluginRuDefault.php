<?php
namespace extas\components\plugins\translates;

use extas\interfaces\translates\ITranslate;
use extas\components\plugins\Plugin;

/**
 * Class TranslatePluginEnDefault
 *
 * todo: get lang "from"
 *
 * @package extas\components\plugins\translates
 * @author jeyroik@gmail.com
 */
class TranslatePluginRuDefault extends Plugin
{
    const STAGE__VOCABULARY = 'extas.translate.vocabulary';

    /**
     * @param $translated string
     * @param $translate ITranslate
     */
    public function __invoke(&$translated, $translate)
    {
        if (!$translated) {
            $text = $translate->getText();
            $vocPath = getenv('EXTAS__PATH_CONFIGS') . '/translate/ru.php';
            $voc = is_file($vocPath) ? include $vocPath : [];
            foreach ($this->getPluginsByStage(static::STAGE__VOCABULARY) as $plugin) {
                $plugin($voc, 'en', 'ru');
            }
            if (is_string($text)) {
                $translated = $this->translateToRu($text, $voc);
            } elseif (is_array($text)) {
                foreach ($text as $item) {
                    $translated .= $this->translateToRu($item, $voc);
                }
            }
        }
    }

    /**
     * @param $text
     * @param $voc
     *
     * @return mixed
     */
    protected function translateToRu($text, $voc)
    {
        return str_replace(array_keys($voc), array_values($voc), $text);
    }
}
