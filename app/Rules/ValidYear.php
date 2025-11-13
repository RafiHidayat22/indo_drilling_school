<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class ValidYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Pastikan value adalah string/numeric
        if (!is_numeric($value)) {
            $fail('Tahun harus berupa angka.');
            return;
        }

        $year = (int) $value;
        $currentYear = (int) date('Y');
        $minYear = 2000;
        $maxYear = $currentYear + 5;

        if ($year < $minYear || $year > $maxYear) {
            $fail("Tahun harus antara {$minYear} dan {$maxYear}.");
        }
    }
}
