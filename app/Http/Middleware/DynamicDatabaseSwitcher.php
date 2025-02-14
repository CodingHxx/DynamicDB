<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DynamicDatabaseSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // return $request;
         if (Auth::check()) {
             $credentials = Auth::user()->businessCredential;
            
            if ($credentials) {
                // config([
                //     'database.connections.Business_mysql.host' => $credentials->db_host ?? env('Business_DB_HOST'),
                //     'database.connections.Business_mysql.database' => $credentials->db_name,
                //     'database.connections.Business_mysql.username' => $credentials->db_username,
                //     'database.connections.Business_mysql.password' => $credentials->db_password,
                // ]);

                // DB::purge('Business_mysql');
                // DB::reconnect('Business_mysql');
                
                // $runtimeConnectionConfig = array_merge(config('database.connections.Business_mysql'), [
                //     'host' =>  $credentials->db_host ?? env('Business_DB_HOST'),
                //     'database' => $credentials->db_name,
                //     'user' => $credentials->db_username,
                //     'password' => $credentials->db_password,
                // ]);
                
                // config(['database.connections.Business_mysql' => $runtimeConnectionConfig]);
                
                // $runtimeConnection = DB::connection('Business_mysql');
                return  "0";
                // return $runtimeConnection->table('clients')->get();
                // return $next($request);
            } else {
                return redirect('/login')->with('error', 'Business credentials not found.');
            }
        }


        return $next($request);
    }
}
