<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
                                    <fieldset class="form-group">
                                        <select id="mySelect2" class="form-select" name="classroom_id"  required>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nrp }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
<script>
    $(document).ready(function () {
        $('#mySelect2').select2();
    });
</script>
</body>
</html>
