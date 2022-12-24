<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        $detailUser = DetailUser::where('user_id', '=', $authUser->id)->first();
        if (!$detailUser) {
            $detailUser = new DetailUser();
            $detailUser->user_id = $authUser->id;
            $detailUser->save();
        }
        // dd($authUser);
        if ($authUser?->is_aktif == 1) {
            Auth::login($authUser);
            return Redirect::to('/user/profile98')->with('user', $authUser)->with('detailUser', $detailUser);
        } else if ($authUser?->is_aktif == 0) {
            return Redirect::to('/login')->with('error', 'Akun anda belum aktif, menunggu verifikasi admin');
        } else {
            return Redirect::to('/login')->with('error', 'Akun anda tidak terdaftar, harap mendaftar terlebih dahulu');
        }
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            $data = User::create([
                'name'     => $user->name,
                'email'    => !empty($user->email) ? $user->email : '',
                'provider' => $provider,
                'provider_id' => $user->id,
                'foto' => $user->avatar_original,
            ]);
            $detailUser = new DetailUser();
            $detailUser->user_id = $data->id;
            $detailUser->save();

            return $data;
        }
    }
}
