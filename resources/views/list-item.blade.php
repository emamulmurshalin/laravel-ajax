<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <h2>Ajax Crud Operation</h2>
            <div class="panel panel-default">
                <div class="panel-heading" >Item List<a href="#" id="newItem" class="pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i></a></div>
                <div class="panel-body" id="items">
                     <ul class="list-group">
                         @foreach($items as $item)
                            <li class="list-group-item ouritem active" data-toggle="modal" data-target="#exampleModal">{{ $item->item }}
                                <input type="hidden" id="itemId" value="{{ $item->id }}"/>
                            </li>
                         @endforeach
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id"/>
                <input type="text" placeholder="Write Your Item" id="addItem" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: none">Close</button>
                <button type="button" class="btn btn-danger" id="deleteButton" data-dismiss="modal" style="display: none">Delete</button>
                <button type="button" class="btn btn-primary" id="editButton" style="display: none">Save changes</button>
                <button type="button" class="btn btn-success" id="addButton" data-dismiss="modal">Add Item</button>
            </div>
        </div>
    </div>
</div>
{{csrf_field() }}

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('click', '.ouritem', function (event) {
                var txt= $(this).text();
                var id= $(this).find('#itemId').val();
                $('#addItem').val(txt);
                $('#title').text('Edit Item');
                $('#editButton').show(200);
                $('#deleteButton').show(200);
                $('#addButton').hide();
                $('#id').val(id);
                //console.log(id);
        });

        $(document).on('click', '#newItem', function (event) {
                $('#addItem').val('');
                $('#title').text('Add Item');
                $('#editButton').hide();
                $('#deleteButton').hide();
                $('#addButton').show();
            });

        $('#addButton').click(function (event) {
            var text= $('#addItem').val();
            $.post('addItem', {'text': text, '_token':$('input[name=_token]').val()}, function (data) {
                console.log(data);
                $('#items').load(location.href + ' #items');
            });
        });

        $('#deleteButton').click(function (event) {
            var id= $('#id').val();
            $.post('deleteItem', {'id': id, '_token':$('input[name=_token]').val()}, function (data) {
                $('#items').load(location.href + ' #items');
                console.log(data);
            })
        });

    });
</script>

</body>
</html>