<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rutorika/Sortable Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/vendor/flat-ui/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/vendor/flat-ui/css/flat-ui.css" rel="stylesheet">

    <style>
        .grid-actions {
            text-align: right;
        }

        .grid-actions .btn {
            margin-left: 16px;
        }
        .sortable-handle {
            cursor: move;
            width: 40px;
            color: #ddd;
        }
        .id-column {
            width: 40px;
        }

        /** notifications style */
        .alert {
            font-size: 14px;
        }
        .bootstrap-growl .close {
            margin-left: 10px;
        }

        /** forms */
    </style>
    <link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="#">Porcelain</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav">
            <li><a href="/">Articles</a></li>
            <li><a href="/grouped">Grouped articles</a></li>
        </ul>
        <p class="navbar-text navbar-right">Signed in as <a class="navbar-link" href="#">Administrator</a></p>
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
<div class="container">
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ trans(Session::get('error')) }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
    @endif

    @yield('content')
</div>
<!-- /.container -->


<!-- Load JS here for greater good =============================-->
<script src="/vendor/flat-ui/js/jquery-1.8.3.min.js"></script>
<script src="/vendor/jquery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="/vendor/flat-ui/js/jquery.ui.touch-punch.min.js"></script>
<script src="/vendor/flat-ui/js/bootstrap.min.js"></script>
<script src="/vendor/flat-ui/js/bootstrap-select.js"></script>
<script src="/vendor/flat-ui/js/bootstrap-switch.js"></script>
<script src="/vendor/flat-ui/js/flatui-checkbox.js"></script>
<script src="/vendor/flat-ui/js/flatui-radio.js"></script>
<script src="/vendor/flat-ui/js/jquery.tagsinput.js"></script>
<script src="/vendor/flat-ui/js/jquery.placeholder.js"></script>
<script src="/vendor/bootstrap-growl/jquery.bootstrap-growl.min.js"></script>

<script>

    var App = {};

    App.notify = {
        message: function(message, type){
            if ($.isArray(message)) {
                $.each(message, function(i, item){
                    App.notify.message(item, type);
                });
            } else {
                $.bootstrapGrowl(message, {
                    type: type,
                    delay: 4000,
                    width: 'auto'
                });
            }
        },

        danger: function(message){
            App.notify.message(message, 'danger');
        },
        success: function(message){
            App.notify.message(message, 'success');
        },
        info: function(message){
            App.notify.message(message, 'info');
        },
        warning: function(message){
            App.notify.message(message, 'warning');
        },
        validationError: function(errors){
            $.each(errors, function(i, fieldErrors){
                App.notify.danger(fieldErrors);
            });
        }
    };

    /**
     *
     * @param type string 'insertAfter' or 'insertBefore'
     * @param entityName
     * @param id
     * @param positionId
     */
    var changePosition = function(type, entityName, id, positionId){

        var deferred = $.Deferred();

        $.ajax({
            'url': '/sort',
            'type': 'POST',
            'data': {
                'type': type,
                'entityName': entityName,
                'id': id,
                'positionEntityId': positionId
            },
            'success': function(data) {
                if (data.success) {
                    App.notify.success('Saved!');
                } else {
                    App.notify.validationError(data.errors);
                }
            },
            'error': function(){
                App.notify.danger('Something wrong!');
            },
            'complete': function(){
                deferred.resolve(undefined);
            }
        });

        return deferred.promise();
    };

    $(document).ready(function(){
        var $sortableTable = $('.sortable');
        if ($sortableTable.length > 0) {
            $sortableTable.sortable({
                handle: '.sortable-handle',
                axis: 'y',
                update: function(a, b){

                    var entityName = $(this).data('entityname');
                    var $sorted = b.item;

                    var $previous = $sorted.prev();
                    var $next = $sorted.next();

                    var promise;

                    if ($previous.length > 0) {
                        promise = changePosition('moveAfter', entityName, $sorted.data('itemid'), $previous.data('itemid'));
                        $.when(promise).done(function(){
                            // do smth
                        });
                    } else if ($next.length > 0) {
                        promise = changePosition('moveBefore', entityName, $sorted.data('itemid'), $next.data('itemid'));
                        $.when(promise).done(function(){
                            // do smth
                        });
                    } else {
                        App.notify.danger('Something wrong!');
                    }
                },
                cursor: "move"
            });
        }
        $('.sortable td').each(function(){
            $(this).css('width', $(this).width() +'px');
        });
    });
</script>
</body>
</html>