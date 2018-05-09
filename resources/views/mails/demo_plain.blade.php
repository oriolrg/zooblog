Hello {{ $data->receiver }},
This is a demo email for testing purposes! Also, it's the HTML version.

Demo object values:

Demo One: {{ $data->nom }}
Demo Two: {{ $data->telefon }}

Values passed by With method:

testVarOne: {{ $testVarOne }}
testVarOne: {{ $testVarOne }}

Thank You,
{{ $data->nom }}
