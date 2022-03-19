<?php

use Illuminate\Support\Facades\URL;

/**
 * Response success data collection
 *
 * @param object $data
 * @param string $responseName
 * @return \Illuminate\Http\Response
 */
function responseData(?object $data, string $responseName = 'data')
{
    return response()->json([
        'success' => true,
        $responseName => $data,
    ], 200);
}

/**
 * Response success data collection
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
function responseSuccess(string $msg = "Success")
{
    return response()->json([
        'success' => true,
        'message' => $msg,
    ], 200);
}

/**
 * Response error data collection
 *
 * @param string $msg
 * @param int $code
 * @return \Illuminate\Http\Response
 */
function responseError(string $msg = 'Something went wrong, please try again', int $code = 404)
{
    return response()->json([
        'success' => false,
        'message' => $msg,
    ], $code);
}

/**
 * Response success flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
function flashSuccess(string $msg)
{
    session()->flash('success', $msg);
}

/**
 * Response error flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
function flashError(string $message = null)
{
    if (env('APP_DEBUG')) {
        return session()->flash('error', $message);
    } else {
        return session()->flash('error', 'Something went wrong, please try again');
    }
}

/**
 * Response warning flash message.
 *
 * @param string $msg
 * @return \Illuminate\Http\Response
 */
function flashWarning(string $message)
{
    if (env('APP_DEBUG')) {
        return session()->flash('warning', $message);
    } else {
        return session()->flash('warning', 'please try again');
    }
}




function socialMediaShareLinks(string $path, string $subject)
{
    $base_url = URL::to('/');

    return [
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $base_url . $path . $subject,
        'twitter' => 'https://twitter.com/intent/tweet?text=' . $base_url . $path . $subject,
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $base_url . $path . $subject,
        'gmail' => 'https://mail.google.com/mail/u/0/?ui=2&fs=1&tf=cm&su=' . $base_url . $path . $subject,
        'whatsapp' => 'https://wa.me/?text=' . $base_url . $path . $subject
    ];
}



/**
 *
 * @param  response
 * @return \Illuminate\Http\Response
 * @author Asif Ul Islam <aseasifislam@gmail.com>
 * @return void
 */
function  sendSuccessResponse($data, $msg = "Data Retrive Successfully", $code = 200)
{
    return response()->json([
        'success' => true,
        'message' => $msg,
        'code' => $code,
        'result' => $data
    ], $code);
}


/**
 *
 * @param  response
 * @return \Illuminate\Http\Response
 * @author Asif Ul Islam <aseasifislam@gmail.com>
 * @return void
 */
function  sendErrorResponse($data = [], $msg = "Something Went wrong", $code = 500)
{
    return response()->json([
        'success' => false,
        'message' => $msg,
        'code' => $code,
        'result' => $data
    ], $code);
}
