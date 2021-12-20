<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\Stat;
use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        User::create($credentials);

        // Przy pomyslnej rejestracji uzytkownika przekierowac go na strone logowania z komunikatem o pomyslnym zalozeniu konta
        return redirect()->route("index.page")->with('succes', 'succes')
            ->with('title', 'Sukces!')
            ->with('subtitle', 'Zostałeś pomyślnie zarejestrowany!')
            ->with('button', 'Super!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd("test");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginIndex()
    {
        return view('login');
    }

    public function authUser(LoginUserRequest $request)
    {

        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::find(auth()->user()->id);
            $last = auth()->user()->last_login;
            $last = date('dmY', strtotime($last));
            $teraz = date('dmY', time());
            // Stat::updateOrCreate(['user_id' => auth()->user()->id]);
            // dd($user->stats);
            if ($last != $teraz) {
                Stat::updateOrCreate(['user_id' => auth()->user()->id], ['money' => isset(auth()->user()->stats->money) ? auth()->user()->stats->money + 10 : 10]);
            }

            $user->update(['last_login' => now()]);
            // zwrócić strone glowna gdy sie ktos zaloguje
            return redirect()->route("index.page")->with('succes', 'succes')
                ->with('title', 'Sukces!')
                ->with('subtitle', 'Zostałeś zalogowany!')
                ->with('button', 'Super!');
        } else {
            // zwrocic strone logowania z wiadomoscia, ze nie udalo sie zalogowac

            // return redirect()->route("login.index")->with('status', "nie udalo sie zalogowac");
            return redirect()->route("login.page")->with('alert', 'error')
                ->with('title', 'Coś poszło nie tak')
                ->with('subtitle', 'Podałeś błędny login lub hasło')
                ->with('button', 'Ponów próbę!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("index.page")->with('succes', 'succes')
            ->with('title', 'Sukces!')
            ->with('subtitle', 'Zostałeś wylogowany!')
            ->with('button', 'Ok!');
    }
}
