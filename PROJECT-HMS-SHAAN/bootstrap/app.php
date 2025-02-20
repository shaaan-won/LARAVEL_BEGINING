<?php

use App\Http\Middleware\AccessControl\AccessControl;
use App\Http\Middleware\AccessControl\Admin;
use App\Http\Middleware\AccessControl\Doctor;
use App\Http\Middleware\AccessControl\Patient;
use App\Http\Middleware\AccessControl\Receptionist;
use App\Http\Middleware\AccessControl\SuperAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use PhpParser\Comment\Doc;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'SuperAdminCheck' => SuperAdmin::class,
            'AdminCheck' => Admin::class,
            'DoctorCheck' => Doctor::class,
            'PatientCheck' => Patient::class,
            'ReceptionistCheck' => Receptionist::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
