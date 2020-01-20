<?php

namespace App\Helpers;

use App\Exceptions\RulesException;
use Illuminate\Support\Facades\Validator;

class CheckRequest
{
  /**
   * Check Request by custom rules and rules message
   *
   * @param \Illuminate\Http\Request $request
   * @param array $rules
   * @param array $rules_message
   * @return void
   * @throws RulesException
   */
  public static function validateByRules($request, array $rules, array $rules_message): void
  {
    $data = $request->all();

    if (!\count($data)) {
      throw new RulesException('Данные не переданы', 'Request is empty');
    }

    $validator = Validator::make($data, $rules, $rules_message);

    if ($validator->fails()) {
      $errors = \implode(',', \array_unique($validator->errors()->all()));
      throw new RulesException($errors, 'Validations errors');
    }

  }
}
