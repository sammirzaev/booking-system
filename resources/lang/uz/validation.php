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

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равен :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой до :date.',
    'before_or_equal' => ':attribute должен быть датой до или равен :date.',
    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайтами.',
        'string' => ':attribute должен быть между :min и :max символами.',
        'array' => ':attribute должен быть между :min и :max элементов.',
    ],
    'boolean' => ':attribute атрибут должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должн быть :digits цифрой.',
    'digits_between' => ':attribute должен быть цифрой между :min и :max.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute атрибут имеет повторяющееся значение.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранный :attribute недействителен.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно быть заполенно.',
    'gt' => [
        'numeric' => ':attribute должен быть больше чем :value.',
        'file' => ':attribute должен быть больше чем :value килобайт.',
        'string' => ':attribute must должен быть больше чем :value символов.',
        'array' => ':attribute должен иметь больше чем :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'string' => ':attribute должен быть больше или равен :value символов.',
        'array' => ':attribute должен быть больше или равен :value элементов.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным адресом IPv4.',
    'ipv6' => ':attribute должен быть действительным адресом IPv6.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше чем :value.',
        'file' => ':attribute должен быть меньше чем килобайт.',
        'string' => ':attribute должен быть меньше чем :value символов.',
        'array' => ':attribute должен быть меньше чем :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равен чем :value.',
        'file' => ':attribute должен быть меньше или равен чем :value килобайт.',
        'string' => ':attribute должен быть меньше или равен чем :value символов.',
        'array' => ':attribute должен быть меньше или равен чем :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file' => ':attribute не может быть больше, чем :max килобайт.',
        'string' => ':attribute не может быть больше чем :max символов.',
        'array' => ':attribute может содержать не более :max элементов.',
    ],
    'mimes' => ':attribute должен быть файлом type: :values.',
    'mimetypes' => ':attribute должен быть файлом type: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен быть не менее :min символов.',
        'array' => ':attribute должен содержать как минимум :min элементов.',
    ],
    'not_in' => 'Выбранный:attribute недействителен.',
    'not_regex' => 'Формат :attribute неверен.',
    'numeric' => ':attribute должен быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute неверен.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute является обязательным, когда :other заполнено :value',
    'required_unless' => 'Поле :attribute является обязательным, если :other не находится в :values.',
    'required_with' => 'Поле :attribute является обязательным при наличии :values.',
    'required_with_all' => 'Поле :attribute является обязательным при наличии :values.',
    'required_without' => 'Поле :attribute является обязательным, если :values отсутствуют.',
    'required_without_all' => 'Поле :attribute является обязательным, если нет ни одного из :values.',
    'same' => ':attribute: и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'string' => ':attribute должен быть :size символов.',
        'array' => ':attribute: должен содержать :size элементов.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной..',
    'unique' => ':attribute уже занят.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => 'Формат :attribute неверен.',
    'uuid' => ':attribute должен быть действительным универсальным уникальным идентификатором.',

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
