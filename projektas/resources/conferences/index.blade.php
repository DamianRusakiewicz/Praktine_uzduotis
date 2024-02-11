@extends('layouts.app')

@section('title', 'Conferences')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Conferences</h1>
        <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Conference</a>
    </div>
    <hr />
    <table class="table table-hover">
        <thead class="table-primary"
               <tr>
                   <th>#</th>
                   <th>Title</th>
                   <th>Author</th>
                   <th>Time</th>
                   <th>Description</th>
                   <th>Action</th>
               </tr>
        </thead>
    </table>
@endsection

