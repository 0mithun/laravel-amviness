<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Modules\Banner\Entities\Banner;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;

class RegisterController extends Controller
{


    /**
     *
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }



    /**
     *
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;

        return $this->sendResponse($success, 'User register successfully.');
    }





    /**
     *
     * @param  User
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token
        ];

        return response($response, 201);
    }



    /**
     *
     * @param  User
     * @return \Illuminate\Http\Response
     * @author Asif Ul Islam <aseasifislam@gmail.com>
     * @return void
     */
    public function me()
    {
        $user = User::first();

        $data = [
            'name' => $user->name,
            'email' => $user->email
        ];
        try {
            return sendSuccessResponse($data);
        } catch (QueryException $e) {
            return sendErrorResponse("Something went wrong", $e->getMessage(), 500);
        }
    }




    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->token = null;
            $user->save();
        }

        return response()->json(['data' => 'User logged out.'], 200);
    }
}
