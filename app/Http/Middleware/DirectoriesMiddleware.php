<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\CheckRequest;

class DirectoriesMiddleware
{

  private static $level = 'api/levels';
  private static $statuses = 'api/statuses ';
  private static $user_pay = 'api/users_pay';

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

    switch ($request->path()) {
      case self::$level :
        self::checkLevel($request);
        break;
      case self::$statuses :
        self::checkStatuses($request);
        break;
      case self::$user_pay :
        self::checkUsersPay($request);
        break;
    }


    return $next($request);
  }

  /**
   * Return request level rules
   *
   * @return array
   */
  private static function getLevelRules()
  {
    return [
      'id' => 'integer|nullable',
      'name' => 'required|string',
      'level_type' => 'required|string',
    ];
  }

  /**
   * Return request level rules message
   *
   * @return array
   */
  private static function getLevelRulesMessage()
  {
    return [
      'id.integer' => 'Id уровня — числовой(целый) тип данных',
      'name.required' => 'Имя уровня — обязательный параметр',
      'level_type.required' => 'Тип уровня — обязательный параметр',
      'name.string' => 'Имя уровня — строковый тип данных',
      'level_type.string' => 'Тип уровня — строковый тип данных',
    ];
  }

  /**
   * Check method level Request
   *
   * @param \Illuminate\Http\Request $request
   * @return void
   * @throws \App\Exceptions\RulesException
   */
  private static function checkLevel ($request): void {
    if ($request->route()->getActionMethod() === 'store' || $request->route()->getActionMethod() === 'update') {
      CheckRequest::validateByRules($request, self::getLevelRules(), self::getLevelRulesMessage());
    }
  }

  /**
   * Check method statuses Request
   *
   * @param \Illuminate\Http\Request $request
   * @return void
   * @throws \App\Exceptions\RulesException
   */
  private static function checkStatuses ($request): void {
    if ($request->route()->getActionMethod() === 'store' || $request->route()->getActionMethod() === 'update') {

    }
  }

  /**
   * Check method users pay Request
   *
   * @param \Illuminate\Http\Request $request
   * @return void
   * @throws \App\Exceptions\RulesException
   */
  private static function checkUsersPay ($request): void {
    if ($request->route()->getActionMethod() === 'store' || $request->route()->getActionMethod() === 'update') {

    }
  }

}
