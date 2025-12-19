<?php

namespace ModelCastsParsing;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Stringable;
use function PHPStan\Testing\assertType;

function test(ModelWithCasts $model): void
{
    assertType('bool', $model->integer);
    assertType(Stringable::class, $model->string);
}

class ModelWithCasts extends Model
{
    public function casts(): array
    {
        return [
            'integer' => 'bool',
            'string' => AsStringable::class.':argument',
        ];
    }
}
