<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopworks Code Test</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <a class="navbar-brand" href="#">Shopworks Code Test</a>
</nav>
<section class="container-fluid">
    @foreach($rotaCollection->rotaResults as $rotaId => $rotaResult)
    Results for {{ $rotaId }}
    <table class="table">
        <thead>
            <tr>
                <th class="col-sm-5">Staff</th>
                @foreach(array_keys($rotaResult->getDays()) as $rotaDay)
                    <th class="col-sm-1">{{ $days[$rotaDay] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="8">
                @foreach($rotaResult->staffRecords as $staffRecord)
                    @include('rota_table', [ 'staffRecord' => $staffRecord ])
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
    @endforeach
</section>
</body>
</html>
