<?php
namespace extas\components\translates\vocabularies;

use extas\components\repositories\Repository;
use extas\interfaces\translates\vocabularies\IVocabularyRepository;

/**
 * Class VocabularyRepository
 *
 * @package extas\components\translates\vocabularies
 * @author jeyroik@gmail.com
 */
class VocabularyRepository extends Repository implements IVocabularyRepository
{
    protected $itemClass = Vocabulary::class;
    protected $pk = Vocabulary::FIELD__TRANSLATE_ID;
    protected $name = 'vocabularies';
    protected $scope = 'extas';
    protected $idAs = '_id';
}
