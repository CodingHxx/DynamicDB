<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DynamicDatabaseSwitcher
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->businessCredentials) {
            $credentials = Auth::user()->businessCredentials;

            // Configure dynamic database connection
            config([
                'database.connections.dynamic_db' => [
                    'driver' => 'mysql',
                    'host' => $credentials->db_host,
                    'port' => $credentials->db_port ?? '3306',
                    'database' => $credentials->db_name,
                    'username' => $credentials->db_username,
                    'password' => $credentials->db_password ?? '',
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => true,
                    'engine' => null,
                ]
            ]);

            // Test the connection
            try {
                DB::connection('dynamic_db')->getPdo();
            } catch (\Exception $e) {
                Log::error('Failed to connect to dynamic database: ' . $e->getMessage());
                return redirect()->route('business.setup')
                    ->with('error', 'Failed to connect to your business database. Please check your credentials.');
            }
        }

        return $next($request);
    }
}
