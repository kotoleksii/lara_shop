<?php


namespace App\Services;


use App\Enums\ValidationRules;
use HttpInvalidParamException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ValidationService
{
    /**
     * @param $rule
     * @param array|null $data
     * @return MessageBag|null
     * @throws ValidationException
     */
    public function check($rule, array $data = null): array
    {
        // TODO: request()->input() має все, окрім форми
        $data = $data ?? request()->input();

        $rules = ValidationRules::get($rule);

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, $validator->errors());

//            throw new HttpException(400, $validator->errors());
//            abort(Response::HTTP_BAD_REQUEST, $validator->errors());
//            return $validator->errors();
//            throw new HttpInvalidParamException($validator->errors());
        }

        return $validator->validated();
    }
}
