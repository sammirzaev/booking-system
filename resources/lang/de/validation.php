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

    'accepted' => 'Das : Attribut muss akzeptiert werden.',
    'active_url' => 'Das : Attribut hat keinen gueltigen URL-address.',
    'after' => 'Das : Attribut muss nach diesem Datum sein :date.',
    'after_or_equal' => 'Das : Attribut muss ein Datum nachher oder gleich zu diesem Datum:date.',
    'alpha' => 'Das : Attribut kann nur Buchstaben enthalten.',
    'alpha_dash' => 'Das : Attribut kann nur Buchstaben, Nummer und unterstreichen enthalten.',
    'alpha_num' => 'Das : Attribut darf nur aus Buchstaben und Nummer enthalten.',
    'array' => 'Das : Attribut muss eine Zeile sein.',
    'before' => 'Das : Attribut muss ein Datum zuvor diesem Datum sein :date.',
    'before_or_equal' => 'Das : Attribut muss ein Datum nachher oder gleich zu diesem Datum sein:date.',
    'between' => [
        'numeric' => 'Das : Attribut muss zwischen minimum und maximum sein :min and :max.',
        'file' => 'Das : Attribut muss zwischen folgenden :min and :max kilobytes. sein',
        'string' => 'Das : Attribut muss zwischen :min and :max characters. sein',
        'array' => 'Das : Attribut muss zwischen diesem Eingaben sein :min and :max items.',
    ],
    'boolean' => 'Das : Attributfeld muss true oder false.',
    'confirmed' => 'Das : Attribut bestaetigung stimmen nicht ueberein.',
    'date' => 'Das : Attribut hat kein gueltiges Datum.',
    'date_equals' => 'Das : Attribut muss dem Datum gleich sein:date.',
    'date_format' => 'Das : Attribut stimmt nicht mit der Dateiformat ueberein :format.',
    'different' => 'Das : Attribut und :other muss unterschiedlich sein.',
    'digits' => 'Das : Attribut muss  :digits Kennnummer sein.',
    'digits_between' => 'Das : Attribut muss zwischen :min and :max Kennnummern zein.',
    'dimensions' => 'Das : Attribut hat ein ungueltiges Bildergroesse dimensions.',
    'distinct' => 'Das : Attributfeld hat einen Inhaltswiederholung value.',
    'email' => 'Das : Attribut muss eine gueltige email adresse address. haben',
    'ends_with' => 'Das : Attribut muss mit einem folgenden Inhalt beenden :values',
    'exists' => 'Ausgewaehlte :attribute ist nicht gueltig.',
    'file' => 'Das : Attribut muss eine Datei sein file.',
    'filled' => 'Das : Attributfeld muss ein Inhalt haben value.',
    'gt' => [
        'numeric' => 'Das : Attribut muss groesser sein als :value.',
        'file' => 'Das : Attribut muss groesser sein als :value kilobytes.',
        'string' => 'Das : Attribut muss groesser sein als :value characters.',
        'array' => 'Das : Attribut muss mehr Eingaben haben als :value items.',
    ],
    'gte' => [
        'numeric' => 'Das : Attribut muss groesser oder gleich zu diesem Inhalt sein :value.',
        'file' => 'Das : Attribut muss groesser oder gleich zu diesem Kapazitaet in :value kilobytes.',
        'string' => 'Das : Attribut muss groesser oder gleich als diese Buchstaben :value characters.',
        'array' => 'Das : Attribut muss inhalts :value items oder mehr haben.',
    ],
    'image' => 'Das : Attribut muss ein Bild sein image.',
    'in' => 'Die ausgewaehlte Attribut :attribute ist nicht gueltig.',
    'in_array' => 'Das : Attributfeld existiert nicht in :other.',
    'integer' => 'Das : Attribut muss eine ganze Zahl haben integer.',
    'ip' => 'Das : Attribut muss eine gueltige IP address. haben',
    'ipv4' => 'Das : Attribut muss eine gueltige IPv4 address. haben',
    'ipv6' => 'Das : Attribut muss eine gueltige IPv6 address. haben',
    'json' => 'Das : Attribut muss eine gueltige JSON zeile haben.',
    'lt' => [
        'numeric' => 'Das : Attribut muss kleiner als dieser Wert sein :value.',
        'file' => 'Das : Attribut muss kleiner als dieses Kilobyte sein :value kilobytes.',
        'string' => 'Das : Attribut muss weniger sein als dieser Wert :value characters.',
        'array' => 'Das : Attribut muss weniger Eingabewerten haben als diese :value items.',
    ],
    'lte' => [
        'numeric' => 'Das : Attribut muss groesser oder gleich zu diesem Inhalt sein :value.',
        'file' => 'Das : Attribut muss groesser oder gleich zu diesem Kapazitaet in :value kilobytes.',
        'string' => 'Das : Attribut muss groesser oder gleich als diese Buchstaben :value characters.',
        'array' => 'Das : Attribut muss mehr Werte haben als diese :value items.',
    ],
    'max' => [
        'numeric' => 'Das : Attribut darf nicht groesser sein als :max.',
        'file' => 'Das : Attribut darf nicht groesser sein von diesem Kilobyte :max kilobytes.',
        'string' => 'Das : Attribut darf nicht mehr als diese Buchstaben sein als :max characters.',
        'array' => 'Das : Attribut darf nicht mehr als diese Eingaben haben :max items.',
    ],
    'mimes' => 'Das : Attribut muss eine Datei sein wie die Typen type: :values.',
    'mimetypes' => 'Das : Attribut muss eine Datei wie diese Typen sein type: :values.',
    'min' => [
        'numeric' => 'Das : Attribut muss mindestens sein :min.',
        'file' => 'Das : Attribut muss mindestens so gross sein wie :min kilobytes.',
        'string' => 'Das : Attribut muss mindestens aus diesen Buchstaben bestehen :min characters.',
        'array' => 'Das : Attribut muss have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'Das : Attribut format is invalid.',
    'numeric' => 'Das : Attribut must be a number.',
    'present' => 'Das : Attribut field must be present.',
    'regex' => 'Das : Attribut format is invalid.',
    'required' => 'Das : Attribut field is required.',
    'required_if' => 'Das : Attribut field is required when :other is :value.',
    'required_unless' => 'Das : Attribut field is required unless :other is in :values.',
    'required_with' => 'Das : Attribut field is required when :values is present.',
    'required_with_all' => 'Das : Attribut field is required when :values are present.',
    'required_without' => 'Das : Attribut field is required when :values is not present.',
    'required_without_all' => 'Das : Attribut field is required when none of :values are present.',
    'same' => 'Das : Attribut and :other must match.',
    'size' => [
        'numeric' => 'Das : Attribut muss so gross sein wie :size.',
        'file' => 'Das : Attribut muss Kilobytes sein :size kilobytes.',
        'string' => 'Das : Attribut muss in Buchstaben :size characters. sein',
        'array' => 'Das : Attribut muss Eingaben in Grenzen solch :size items. haben',
    ],
    'starts_with' => 'Das : Attribut muss mit folgendem Wert anfangen :values',
    'string' => 'Das : Attribut muss ein String sein: string.',
    'timezone' => 'Das : Attribut muss ein gueltige Zone haben zone.',
    'unique' => 'Das : Attribut ist bereits genommen worden.',
    'uploaded' => 'Das : Attribut konnte nicht geladen werden.',
    'url' => 'Das : Attribut formate ist ungueltig.',
    'uuid' => 'Das : Attribut muss eine gueltige UUID. haben',

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
