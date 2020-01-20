<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\CheckRequest;

class LevelMiddleware
{

  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   * @return mixed
   * @throws \App\Exceptions\RulesException
   */
  public function handle($request, Closure $next)
  {

    if ($request->route()->getActionMethod() === 'store' || $request->route()->getActionMethod() === 'create') {
      CheckRequest::validateByRules($request, self::rules(), self::rulesMessage());
    }

    return $next($request);
  }

  /**
   * Return request rules
   *
   * @return array
   */
  private static function rules()
  {
    return [
      'name' => 'required|string',
      'type' => 'required|string',
    ];
  }

  /**
   * Return request rules message
   *
   * @return array
   */
  private static function rulesMessage()
  {
    return [
      'name.required' => 'Имя уровня — обязательный параметр',
      'type.required' => 'Тип уровня — обязательный параметр',
      'name.string' => 'Имя уровня — строковый тип данных',
      'type.string' => 'Тип уровня — строковый тип данных',
    ];
  }


}
