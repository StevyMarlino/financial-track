<?php


namespace App\Utils;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class Api
{
    public static function respond(ApiStatus $apiStatus,array $payload = [], int $httpStatus=200){
        return response()->json([
            "status" => $apiStatus->getCode(),
            "message" => $apiStatus->getMessage(),
            "data"=>$payload
        ],$httpStatus);
    }

    public static function respondUnauthorized(string $message="Unauthorized"){
        return self::respond(ApiStatus::err("unauthorized"),["errors"=>["authorization"=>$message]],401);
    }

    public static function respondSuccess($data = [],string $message="ok"){
        return self::respond(ApiStatus::ok($message),$data);
    }
   //WHAT I'VE ADDED
   public static function respondFailed($data = [],string $message="error"){
    return self::respond(ApiStatus::err($message),$data);
    }

    public static function respondWithValidationErr(array $errors){
        return self::respond(
            ApiStatus::err(__("validation.error")),
            ["errors"=>$errors],
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    public static function respondWithToken(string $token,$data = []){
        return Api::respond(ApiStatus::ok(__("auth.login.successful")),array_merge([
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ],$data));
    }

    /**
     * Fonction qui se charge de faire les requêtes vers l'extérieur
     * @param [Array] $data : Paramètres
     * @param [String] $url : Route à laquelle les données seront postées
     * @param [boolean] $raw : Permettant de savoir si on doit renvoyer les données brutes ou pas ...
     *
     * @return ..... baaaaah les données !
     */
    public static function requestApi($params,$url, $raw=false)
    {
        $credentials = base64_encode('staff:~nbX}#%4j*YZ+Jk{9q');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Basic {$credentials}"
        ]);

        $data = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);

        if($raw){
            return $data;
            exit();
        }

        $response = json_decode($data, true);

        if ($err) {
            $response = (array)$response;
            return $response['error'] = $err;
        }else {
            return (array)$response;
        }
    }
    /**
     * Pour ne pas avoir à ajouter les 2 things ci à chaque fois ...
     */
    static function addApiAccess($data){
        $data['api_id'] = ApiConst::api_id;
        $data['api_key'] = ApiConst::api_key;

        return $data;
    }
    static function GETRequestApi($data,$url, $raw=false){

        $curl = curl_init();
        $url = sprintf("%s?%s", $url, http_build_query($data));
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
}
