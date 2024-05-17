<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginApiRequest $request)
    {

        $credentials = $request->only('email', 'password');


        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'email ou mot de passe incorrecte',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){

        
        
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'telephone' => 'required|string|max:255',
            // 'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
        ]);

        
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     if ($file->isValid() && str_starts_with($file->getMimeType(), 'image/')) {
        //         Log::info("dougg naa");
        //         $imagePath = $file->store("images", "public");
        //         // $user->pp = $imagePath;
        //         // $user->save();

        //     }
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'bagnaa am !',
        //     ], 200);
        // }

        
        // return response()->json([
        //     'status' => 'error',
        //     'message' => 'oups !',
        // ], 401);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
        ]);

        if ($request->hasFile('image')) {
    
            $file = $request->file('image');
            if ($file->isValid() && str_starts_with($file->getMimeType(), 'image/')) {
                Log::info("dougg naa");
                $imagePath = $file->store("images", "public");
                // $user->pp = $imagePath;
                $user->save();

            }
        }

        // $token = Auth::login($user);
        // try{

            $token = Auth::guard('api')->login($user);
        // }
        // catch(\Exception $e){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'oups !',
        //     ], 401);
        // }
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
