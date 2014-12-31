@extends('layout')

@section('content')
    <h3>Grouped Articles</h3>
    <h4>First category</h4>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>title</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="sortable" data-entityname="grouped_articles">
        @foreach ($firstArticles as $article)
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
    <h4>Second category</h4>
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
        @foreach ($secondArticles as $article)
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