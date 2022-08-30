<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Thuộc tính :attribute phải được chấp nhận.',
    'active_url' => 'Thuộc tính :attribute không phải là một URL hợp lệ.',
    'after' => 'Thuộc tính :attribute phải là một ngày sau :date.',
    'after_or_equal' => 'Thuộc tính :attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => 'Thuộc tính :attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => 'Thuộc tính :attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Thuộc tính :attribute chỉ có thể chứa các chữ cái và số.',
    'array' => 'Thuộc tính :attribute phải là một mảng.',
    'before' => 'Thuộc tính :attribute phải là một ngày trước :date.',
    'before_or_equal' => 'Thuộc tính :attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'numeric' => 'Thuộc tính :attribute phải ở giữa :min and :max.',
        'file' => 'Thuộc tính :attribute phải ở giữa :min and :max kilobytes.',
        'string' => 'Thuộc tính :attribute phải ở giữa :min and :max characters.',
        'array' => 'Thuộc tính :attribute phải ở giữa :min and :max items.',
    ],
    'boolean' => 'Thuộc tính :attribute trường phải đúng hoặc sai.',
    'confirmed' => 'Thuộc tính :attribute nhận đinh không phù hợp.',
    'date' => 'Thuộc tính :attribute Không phải là ngày hợp lệ.',
    'date_equals' => 'Thuộc tính :attribute phải là một ngày bằng :date.',
    'date_format' => 'Thuộc tính :attribute không phù hợp với định dạng :format.',
    'different' => 'Thuộc tính :attribute và :other phải khác.',
    'digits' => 'Thuộc tính :attribute cần phải :digits digits.',
    'digits_between' => 'Thuộc tính :attribute phải ở giữa :min and :max digits.',
    'dimensions' => 'Thuộc tính :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => 'Thuộc tính :attribute trường có giá trị trùng lặp.',
    'email' => 'Thuộc tính :attribute Phải la một địa chỉ email hợp lệ.',
    'ends_with' => 'Thuộc tính :attribute phải kết thúc bằng một trong những following: :values.',
    'exists' => 'Thuộc tính selected :attribute không có hiệu lực.',
    'file' => 'Thuộc tính :attribute phải là một tập tin.',
    'filled' => 'Thuộc tính :attribute trường phải có một giá trị.',
    'gt' => [
        'numeric' => 'Thuộc tính :attribute phải lớn hơn :value.',
        'file' => 'Thuộc tính :attribute phải lớn hơn :value kilobytes.',
        'string' => 'Thuộc tính :attribute phải lớn hơn :value characters.',
        'array' => 'Thuộc tính :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Thuộc tính :attribute phải lớn hơn or equal :value.',
        'file' => 'Thuộc tính :attribute phải lớn hơn or equal :value kilobytes.',
        'string' => 'Thuộc tính :attribute phải lớn hơn or equal :value characters.',
        'array' => 'Thuộc tính :attribute must have :value items or more.',
    ],
    'image' => 'Thuộc tính :attribute phải là một hình ảnh.',
    'in' => 'Thuộc tính selected :attribute không có hiệu lực.',
    'in_array' => 'Thuộc tính :attribute field does not exist in :other.',
    'integer' => 'Thuộc tính :attribute must be an integer.',
    'ip' => 'Thuộc tính :attribute must be a valid IP address.',
    'ipv4' => 'Thuộc tính :attribute must be a valid IPv4 address.',
    'ipv6' => 'Thuộc tính :attribute must be a valid IPv6 address.',
    'json' => 'Thuộc tính :attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => 'Thuộc tính :attribute must be less than :value.',
        'file' => 'Thuộc tính :attribute must be less than :value kilobytes.',
        'string' => 'Thuộc tính :attribute must be less than :value characters.',
        'array' => 'Thuộc tính :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Thuộc tính :attribute must be less than or equal :value.',
        'file' => 'Thuộc tính :attribute must be less than or equal :value kilobytes.',
        'string' => 'Thuộc tính :attribute must be less than or equal :value characters.',
        'array' => 'Thuộc tính :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Thuộc tính :attribute có thể không lớn hơn :max.',
        'file' => 'Thuộc tính :attribute có thể không lớn hơn :max kilobytes.',
        'string' => 'Thuộc tính :attribute có thể không lớn hơn :max characters.',
        'array' => 'Thuộc tính :attribute có thể không có nhiều hơn :max items.',
    ],
    'mimes' => 'Thuộc tính :attribute phải là một tập tin của type: :values.',
    'mimetypes' => 'Thuộc tính :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Thuộc tính :attribute ít nhất phải là :min.',
        'file' => 'Thuộc tính :attribute ít nhất phải là :min kilobytes.',
        'string' => 'Thuộc tính :attribute ít nhất phải là :min characters.',
        'array' => 'Thuộc tính :attribute ít nhất phải là :min items.',
    ],
    'not_in' => 'Thuộc tính selected :attribute is invalid.',
    'not_regex' => 'Thuộc tính :attribute format is invalid.',
    'numeric' => 'Thuộc tính :attribute must be a number.',
    'password' => 'Thuộc tính  Mật khẩu không đúng.',
    'present' => 'Thuộc tính :attribute lĩnh vực phải có mặt.',
    'regex' => 'Thuộc tính :attribute định dạng không hợp lệ.',
    'required' => 'Thuộc tính :attribute lĩnh vực được yêu cầu.',
    'required_if' => 'Thuộc tính :attribute trường được yêu cầu khi :other là :value.',
    'required_unless' => 'Thuộc tính :attribute trường là bắt buộc trừ khi :other là :values.',
    'required_with' => 'Thuộc tính :attribute trường được yêu cầu khi :values là.',
    'required_with_all' => 'Thuộc tính :attribute trường được yêu cầu khi :values are present.',
    'required_without' => 'Thuộc tính :attribute trường được yêu cầu khi :values is not present.',
    'required_without_all' => 'Thuộc tính :attribute trường là bắt buộc khi không có :values are present.',
    'password_preg_match ' => 'Password phải có kí tự đặc biệt, số và chữa thường, chữ hoa.',
    'same' => 'Thuộc tính :attribute and :other must match.',
    'size' => [
        'numeric' => 'Thuộc tính :attribute must be :size.',
        'file' => 'Thuộc tính :attribute must be :size kilobytes.',
        'string' => 'Thuộc tính :attribute must be :size characters.',
        'array' => 'Thuộc tính :attribute must contain :size items.',
    ],
    'starts_with' => 'Thuộc tính :attribute phải bắt đầu bằng một trong những following: :values.',
    'string' => 'Thuộc tính :attribute phải là một chuỗi.',
    'timezone' => 'Thuộc tính :attributephải là một vùng hợp lệ.',
    'unique' => 'Thuộc tính :attribute đã được thực hiện.',
    'uploaded' => 'Thuộc tính :attribute không tải lên được.',
    'url' => 'Thuộc tính :attribute format is invalid.',
    'uuid' => 'Thuộc tính :attribute must be a valid UUID.',
    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
