<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\IAMUser;

class IAMController extends Controller
{
    public function login(Request $request)
    {
        $query = http_build_query([
            'client_id' => config('iam.client_id'),
            'redirect_uri' => config('iam.redirect_uri'),
            'response_type' => 'code',
            'scope' => '',
        ]);
        return redirect(config('iam.auth_url') . '?' . $query);
    }

    public function validateLogin(Request $request)
    {
        try {
            $tokenResponse = Http::withOptions([
                'verify' => false,
            ])->post(config('iam.token_url'), [
                'grant_type' => 'authorization_code',
                'client_id' => intval(config('iam.client_id')),
                'client_secret' => config('iam.client_secret'),
                'redirect_uri' => config('iam.redirect_uri'),
                'code' => $request->code,
            ]);

            $tokenData = json_decode((string) $tokenResponse->body(), true);

            $userDataResponse = Http::withOptions([
                'verify' => false,
            ])->withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $tokenData['access_token'],
            ])->get(config('iam.user_url'));

            $userData = json_decode((string) $userDataResponse->body(), true);

            $user = IAMUser::findOrCreate($userData);

            if ($user != null) {
                \Auth::login($user);

                if (!is_null(session('route_before_login'))) {
                    $url = session('route_before_login');
                    session()->forget('route_before_login');
                    return redirect()->to($url);
                } else {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->to(route('home'));
            }
        } catch (\Throwable $e) {
            return redirect()->to(route('home'));
        }
    }
}
