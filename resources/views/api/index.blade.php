<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Request</title>
</head>

<body>
    <div class="contaner-fluid">
        <div class="col-6 mx-auto mt-5">
            <h1>Request</h1>
            <form action="" method="GET" class="mt-3">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="jsonDtata">JSON</label>
                    <textarea name="jsonDtata" id="jsonDtata" cols="30" rows="5" class="form-control" placeholder="JSON data"></textarea>
                    <small id="emailHelp" class="form-text text-muted">Укажите data в формате JSON для занесения в БД</small>
                </div>
                <div class="form-group">
                    <label for="method">Method of request</label>
                    <select name="method" id="method" require class="form-control">
                        <option value="" disabled selected>Select method request</option>
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="token">Token</label>
                    <input type="text" name="token" id="token" class="form-control" placeholder="Token" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>