<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InstallerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('installer::index');
    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('=' . env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));

        return true;
    }

    public function app_install(Request $request)
    {
        $this->putPermanentEnv('APP_NAME', $request->app_name);
        $this->putPermanentEnv('APP_ENV', $request->app_env);
        $this->putPermanentEnv('APP_DEBUG', $request->app_debug);
        $this->putPermanentEnv('APP_URL', $request->app_url);
        $this->putPermanentEnv('DB_CONNECTION', $request->db_connection);
        $this->putPermanentEnv('DB_HOST', $request->db_host);
        $this->putPermanentEnv('DB_PORT', $request->db_port);
        $this->putPermanentEnv('DB_DATABASE', $request->db_name);
        $this->putPermanentEnv('DB_USERNAME', $request->db_username);
        $this->putPermanentEnv('DB_PASSWORD', $request->db_password);
        $this->putPermanentEnv('BROADCAST_DRIVER', $request->brodcast_driver);
        $this->putPermanentEnv('CACHE_DRIVER', $request->cache_driver);
        $this->putPermanentEnv('QUEUE_CONNECTION', $request->queue_connection);
        $this->putPermanentEnv('SESSION_DRIVER', $request->session_driver);
        $this->putPermanentEnv('REDIS_HOST', $request->redis_host);
        $this->putPermanentEnv('REDIS_PASSWORD', $request->redis_password);
        $this->putPermanentEnv('REDIS_PORT', $request->redis_port);
        $this->putPermanentEnv('MAIL_MAILER', $request->mail_type);
        $this->putPermanentEnv('MAIL_HOST', $request->mail_host);
        $this->putPermanentEnv('MAIL_PORT', $request->mail_port);
        $this->putPermanentEnv('MAIL_USERNAME', $request->mail_username);
        $this->putPermanentEnv('MAIL_PASSWORD', $request->mail_password);
        $this->putPermanentEnv('MAIL_ENCRYPTION', $request->mail_encrypt);
        $this->putPermanentEnv('MAIL_FROM_ADDRESS', $request->mail_from);
        $this->putPermanentEnv('PUSHER_APP_ID', $request->pusher_id);
        $this->putPermanentEnv('PUSHER_APP_KEY', $request->pusher_key);
        $this->putPermanentEnv('PUSHER_APP_SECRET', $request->pusher_secret);
        $this->putPermanentEnv('PUSHER_APP_CLUSTER', $request->pusher_cluster);
        $this->putPermanentEnv('STRIPE_KEY', $request->stripe_key);
        $this->putPermanentEnv('STRIPE_SECRET', $request->stripe_secret);
        $this->putPermanentEnv('RAZORPAY_KEY', $request->razor_key);
        $done = $this->putPermanentEnv('RAZORPAY_SECRET', $request->razor_secret);

        if ($done) {
            $secret = encrypt('hello');
            return redirect('fresh-database/' . $secret);
        }
    }
}
