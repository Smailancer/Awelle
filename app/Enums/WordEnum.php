<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self VERB()
 * @method static self NOUN()
 * @method static self ADJECTIVE()
 * @method static self NUMBER()
 * @method static self PRONOUN()
 * @method static self BASIC_PHRASE()
 * @method static self PREPOSITION()
 * @method static self CONJUNCTION()
 * @method static self QUESTION_WORD()
 * @method static self COLOR()
 * @method static self FAMILY_TERM()
 * @method static self DAYS_MONTHS()
 * @method static self TIME_EXPRESSION()
 * @method static self COMMON_ADVERB()
 * @method static self GEOGRAPHICAL_TERM()
 * @method static self ANIMAL_PLANT()
 * @method static self FOOD_DRINK()
 * @method static self BODY_PART()
 * @method static self COMMON_TOOL_OBJECT()
 * @method static self FEELINGS_EMOTIONS()
 * @method static self PLACE_EXPRESSION()
 */
class WordEnum extends Enum
{
    const MAP_VALUE_TO_LABEL = [
        'VERB' => 'Verbs',
        'NOUN' => 'Nouns',
        'ADJECTIVE' => 'Adjectives',
        'NUMBER' => 'Numbers',
        'PRONOUN' => 'Pronouns',
        'BASIC_PHRASE' => 'Basic Phrases',
        'PREPOSITION' => 'Prepositions',
        'CONJUNCTION' => 'Conjunctions',
        'QUESTION_WORD' => 'Question Words',
        'COLOR' => 'Colors',
        'FAMILY_TERM' => 'Family Terms',
        'DAYS_MONTHS' => 'Days of the Week and Months',
        'TIME_EXPRESSION' => 'Time Expressions',
        'COMMON_ADVERB' => 'Common Adverbs',
        'GEOGRAPHICAL_TERM' => 'Geographical Terms',
        'ANIMAL_PLANT' => 'Animals and Plants',
        'FOOD_DRINK' => 'Food and Drinks',
        'BODY_PART' => 'Body Parts',
        'COMMON_TOOL_OBJECT' => 'Common Tools and Objects',
        'FEELINGS_EMOTIONS' => 'Feelings and Emotions',
        'PLACE_EXPRESSION' => 'Place Expressions',
    ];

       /**
     * Get all enum keys.
     *
     * @return array
     */
    public static function getKeys(): array
    {
        return array_keys(self::MAP_VALUE_TO_LABEL);
    }

    /**
     * Get all enum values.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return array_values(self::MAP_VALUE_TO_LABEL);
    }

}
