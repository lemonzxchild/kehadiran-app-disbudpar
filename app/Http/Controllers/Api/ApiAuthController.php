<?php

namespace App\Http\Controllers\Api;


use App\Models\Role;
use App\Models\User;
use App\Models\Position;
use App\Models\Partof;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequests\LoginRequest;

class ApiAuthController
{
    private $response = [
        'message' => null,
        'data' => null
    ];

    public function index()
    {
        return view('auth.login', [
            "title" => "Masuk"
        ]);
    }

    public function authenticate(LoginRequest $request)
    {
        $remember = $request->boolean('remember');
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, $remember)) { // login gagal
            request()->session()->regenerate();
            $data = [
                "success" => true,
                "redirect_to" => auth()->user()->isUser() ? route('home.index') : route('dashboard.index'),
                "message" => "Login berhasil, silahkan tunggu!"
            ];
            return response()->json($data);
        }

        $data = [
            "success" => false,
            "message" => "Login gagal, silahkan coba lagi!"
        ];
        return response()->json($data)->setStatusCode(400);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->regenerate();
        request()->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Anda berhasil keluar.');
    }

    public function loginApi(Request $request)
    {

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        $user = User::where('email', $request->email)
            ->first();
        //dd($user);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => "Email atau Password Salah",
            ], 401);
        }
        //dd($user);
        $token = $user->createToken('api_token')->plainTextToken;
        $role = Role::where('id', $user->role_id)->first();
        $jabatan = Position::where('id', $user->position_id)->first();
        $partof = Partof::where('id', $jabatan->partof_id)->first();
        $tokenParts = explode('|', $token); // Memecah token menjadi dua bagian berdasarkan tanda pemisah

        if (count($tokenParts) === 2) {
            $actualToken = $tokenParts[1]; // Mengambil string token yang sebenarnya

            // Gunakan $actualToken dalam logika aplikasi Anda, misalnya dalam header Authorization saat melakukan permintaan API
            // ...
        }
        $this->response['message'] = 'Berhasil';
        $this->response['data'] = [
            'user' => $user,
            'jabatan' => $jabatan->name,
            'partof' => $partof->name,
            'token' => $actualToken,
            'rolename' => $role->name
        ];

        return response()->json($this->response, 200);
        //return $user;
    }


    public function userApi()
    {
        $user = Auth::user();

        $this->response['message'] = 'Berhasil';
        $this->response['data'] = $user;

        return response()->json($this->response, 200);
    }

    public function logoutApi()
    {
        $logout = auth()->user()->currentAccessToken()->delete();

        $this->response['message'] = 'Berhasil';
        return response()->json($this->response, 200);
    }
}
