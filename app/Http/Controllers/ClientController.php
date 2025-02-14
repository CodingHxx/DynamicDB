<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\BusinessCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index()
    {
        // Check if user has business credentials
        if (!auth()->user()->businessCredentials) {
            return redirect()->route('business.setup')
                ->with('error', 'Please complete your business profile setup to access clients.');
        }

        try {
            // Get business credentials
            $credentials = auth()->user()->businessCredentials;

            // Validate credentials
            if (empty($credentials->db_host) || empty($credentials->db_name) || 
                empty($credentials->db_username)) {
                throw new \Exception('Database credentials are incomplete. Please update your business profile.');
            }

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
            DB::connection('dynamic_db')->getPdo();

            // Query clients from the business database
            $clients = Client::on('dynamic_db')
                ->where('business_credentials_id', auth()->user()->business_credentials_id)
                ->get();

            return view('clients.index', compact('clients'));

        } catch (\Exception $e) {
            Log::error('Error in ClientController@index: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to load clients: ' . $e->getMessage()]);
        }
    }
}
