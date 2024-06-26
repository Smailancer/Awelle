<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;
/**
 * @method static self VERB()
 * @method static self NOUN()
 * @method static self ADJECTIVE()
 * @method static self NUMBER()
 * @method static self PRONOUN()
 * @method static self BASIC_PHRASE()
 * @method static self CONJUNCTION()
 * @method static self QUESTION_WORD()
 * @method static self COLOR()
 * @method static self FAMILY_TERM()
 * @method static self TIME_EXPRESSION()
 * @method static self PLACE_EXPRESSION()
 * @method static self COMMON_ADVERB()
 * @method static self NATURE_ANIMAL()
 * @method static self FOOD_DRINK()
 * @method static self BODY_PART()
 * @method static self TOOLS_OBJECTS()
 * @method static self FEELINGS_EMOTIONS()
 * @method static self MEMES()
 */
final class WordEnum extends Enum
{
    const MAP_VALUE_TO_LABEL = [
        'NOUN' => 'Nouns',
        'VERB' => 'Verbs',
        'ADJECTIVE' => 'Adjectives',
        'NUMBER' => 'Numbers',
        'PRONOUN' => 'Pronouns',
        'BASIC_PHRASE' => 'Basic Phrases',
        'CONJUNCTION' => 'Conjunctions',
        'QUESTION_WORD' => 'Question Words',
        'COLOR' => 'Colors',
        'FAMILY_TERM' => 'Family Terms',
        'TIME_EXPRESSION' => 'Time Expressions',
        'PLACE_EXPRESSION' => 'Place Expressions',
        'COMMON_ADVERB' => 'Common Adverbs',
        'NATURE_ANIMAL' => 'Nature and Animals',
        'FOOD_DRINK' => 'Food and Drinks',
        'BODY_PART' => 'Body Parts',
        'TOOLS_OBJECTS' => 'Common Tools and Objects',
        'FEELINGS_EMOTIONS' => 'Feelings and Emotions',
        'MEMES' => 'Memes',
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
