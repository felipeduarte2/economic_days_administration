<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class DirectorRule implements DataAwareRule, ValidationRule
{

    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $director = null;

        if (isset($this->data['id'])) {
            $director = User::where('IdPuesto', 2)->where('status', 'Activo')->where('id', '!=', $this->data['id'])->first();
        }else{
            $director = User::where('IdPuesto', 2)->where('status', 'Activo')->first();
        }

        // si $value es igual a 2 y si exite $director, entonces no puede existir un director
        if ($value == 2 && $director) {
            // $fail('Ya existe un director activo');
            $fail('Ya existe un director');
        }
    }

        /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
