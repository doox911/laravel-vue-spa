<?php

namespace App\Exceptions;

use Exception;

class RulesException extends Exception
{
  protected $user_message;
  protected $system_message;
  protected $code;
  protected $previous;

  public function __construct(string $user_message, string $system_message, int $code = 500, Exception $previous = null)
  {

    $this->user_message = $user_message;
    $this->system_message = $system_message;
    $this->code = $code;
    $this->previous = $previous;

    parent::__construct($this->user_message, $this->code, $this->previous);
  }

  public function getSystemMessage()
  {
    return $this->system_message;
  }

  public function exportFails()
  {
    response()->json([
      'messages' => \explode(',', $this->getMessage()),
      'errors' => [$this->getSystemMessage()],
    ], 500)->throwResponse();
  }
}
