<?php

namespace App;

use Illuminate\Support\Facades\Log;

trait LogsActivityTrait
{
    public function logInfo($message)
    {
        Log::info("📘 [{$this->className()}] - $message");
    }

    public function logError($message)
    {
        Log::error("❌ [{$this->className()}] - $message");
    }

    private function className()
    {
        return class_basename($this);
    }
}
