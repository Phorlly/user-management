<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Schema\Blueprint;

function isActive($route, $segment = 2): string
{
    return Request::segment($segment) == $route ? 'active' : '';
}

function defaultFields(Blueprint $table)
{
    $table->string('name')->unique();
    $table->string('description')->nullable();
}

function field(Blueprint $table, string $field, $length = 255): void
{
    $table->string($field, $length)->nullable();
}

function related(Blueprint $table, string $fk, string $onTable): void
{
    $table->foreign($fk)->references('id')->on($onTable)->onDelete('cascade');
}

function lowerAnd_($text)
{
    return strtolower(str_replace(' ', '_', $text));
}

function backToList(string $route, string $message = 'Modified')
{
    return redirect()->route($route . '.index')->with('success', $message . ' successfully..!');
}
function goToNext(string $route, string $message = 'Created')
{
    return redirect()->route($route)->with('success', $message . ' successfully..!');
}

function oKOrFail(string $message = 'Created', string $type = 'success')
{
    return $type == 'success'
        ? back()->with($type, $message . ' successfully..!')
        : back()->with($type, $message);
}

function formatedDate($date)
{
    return Carbon::parse($date)->setTimezone('Asia/Bangkok')->format('d M y, g:i A');
}

function formatRouteName($routeName): string
{
    return collect(explode('.', $routeName))
        ->map(fn($word) => ucfirst($word))
        ->join(' ');
}
function accessable(string $name): string
{
    return auth()->user()->buttonAccessable($name);
}

function getFirst(string $name): string
{
    return  explode('.', $name)[0];
}
function renderRoute(): array
{
    $routeDetails = [];
    $routes = Route::getRoutes();
    $mdwGroup = 'is.authed';
    foreach ($routes as $route) {
        $middlewares = $route->gatherMiddleware();
        if (in_array($mdwGroup, $middlewares)) {
            $routeName = $route->getName();
            if ($routeName != "dashboard" && $routeName != "logout" && $routeName != "error.404") {
                $routeDetails[] = [
                    'uri' => $route->uri(),
                    'name' => $routeName,
                ];
            }
        }
    }

    return $routeDetails;
}

function getLast(string $name): string
{
    $parts = explode('.', $name);
    return end($parts);
}

