<?php
namespace extas\components\translates;

use extas\components\repositories\Repository;
use extas\interfaces\translates\ITranslateRepository;

/**
 * Class TranslateRepository
 *
 * @package extas\components\translates
 * @author jeyroik@gmail.com
 */
class TranslateRepository extends Repository implements ITranslateRepository
{
    protected $itemClass = Translate::class;
    protected $idAs = '';
    protected $scope = 'extas';
    protected $name = 'translates';
    protected $pk = Translate::FIELD__ID;
}
