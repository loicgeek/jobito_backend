<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['login','register','socialLogin']]);
    }

    public function login(Request $request){
        $this->validate($request,[
            "email"=>"required",
            "password"=>"required"
        ]);
        $credentials = $request->only(['email','password']);
        if($token = $this->guard()->attempt($credentials)){
            return $this->respondWithToken($token);
        }
        return response()->json(['error'=>'Unauthorized'],403);
    }

    public function register(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6"
        ]);
        $credentials = $request->only(['name','email','password']);
        $user = new User($credentials);
        $user->save();
        return $this->respondWithToken(JWTAuth::fromUser($user));
    }

    public function logout(){
        $this->guard()->logout();
        return response()->json(['message'=>'Successfully logged out'],403);
    }

    public function refresh(){
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function socialLogin($provider,Request $request){
        $user = Socialite::driver($provider)->userFromToken($request->get('access_token'));
        if(!$user->getEmail()){
            return response()->json(['error'=>'You must give access to your email'],403);
        }
        $exist = User::query()->where(['email'=>$user->getEmail()])->first();
        if(!$exist){
            User::create([
                'name'          => $user->getName(),
                'email'         => $user->getEmail(),
                'provider_id'   => $user->getId(),
                'provider'      => $provider,
            ]);
        }
        return $this->respondWithToken(JWTAuth::fromUser($user));
    }

    public function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'expires_in'=>$this->guard()->factory()->getTTL()*60
        ]);
    }

    public function guard(){
        return Auth::guard();
    }


}
