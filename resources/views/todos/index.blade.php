@extends('layouts.app')
@section('title', 'Todos')
@section('content')
<div class="todo-card">
    <h1>To-do:</h1>
    <div id="todoList"></div>
    <div id="todoContainer">
        <form id="todoForm">
            @csrf
            <div>
                <label for="task">Task</label>
                <input type="text" name="task" id="task" autocomplete="off" 
                        class="input-field"
                        placeholder="What do you need to do?"/>
            </div>
            <button type="submit" class="submit-btn">
                Save Item
            </button>
        </form>
    </div>
</div>
@endsection

@section('styles')
<link href="{{ asset('css/todo.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/todo.js') }}"></script>
@endsection