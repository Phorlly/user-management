<?php

namespace App\Helpers;

trait MessageHandler
{
    public function goNext(string $route, string $message)
    {
        return redirect()->route($route . '.index')->with('success', $message . ' successfully..!');
    }

    public function hasError(string $message)
    {
        return back()->with('error', $message);
    }
}
