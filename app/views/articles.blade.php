@extends('layout')

@section('content')
    <h3>Articles</h3>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>title</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="sortable" data-entityname="articles">
        @foreach ($articles as $article)
            <tr data-itemId="{{{ $article->id }}}">
                <td class="sortable-handle"><span class="glyphicon glyphicon-sort"></span></td>
                <td class="id-column">{{{ $article->id }}}</td>
                <td>{{{ $article->title }}}</td>
                <td class="grid-actions">
                    <a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection