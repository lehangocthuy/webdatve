<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));// tạo 1 biến trong biến đó chứa key gg cấp 
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);//ss 2 key
        return $response->isSuccess();//ok

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vui lòng check vào ô xác nhận mã captcha để tiếp tục.';
    }
}
