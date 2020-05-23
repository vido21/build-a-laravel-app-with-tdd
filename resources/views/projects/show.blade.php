@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p style="color: grey"  class="text-sm font-normal">
                <a href="/projects" style="color: grey"  class="text-sm font-normal">My Projects</a>   / {{$project->title}}
            </p>

            <a 
                style="background-color : blue ;
                    text-decoration:none; 
                    color : white;
                    box-shadow : 0 2px 7px 0 #b0eaff;
                    " 
                href="/projects/create"
                class="rounded-lg text-sm py-2 px-5"
            >
                New Project
            </a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 style="color: grey"  class="text-lg font-normal mb-3">Tasks</h2>
                    
                        {{-- tastk --}}
                        @foreach ($project->tasks as $task)
                            <div class="rounded shadow p-5 mb-3" style="background-color: white">
                                <form action="{{$task->path()}}" method="POST" >
                                    @method('PATCH')
                                    @csrf

                                    <div class="flex">
                                        <input name="body" type="text" value="{{ $task->body}}" class="w-full" style="color: {{$task->completed ? 'grey' : '' }}"  >
                                        <input name="completed" type="checkbox" onchange="this.form.submit()" {{$task->completed ? 'checked' : '' }}>                                        
                                    </div>
                                </form>
                            </div>
                        @endforeach

                            <div class="rounded shadow p-5 mb-3" style="background-color: white">
                                <form action="{{$project->path() .'/tasks' }}" method="post">
                                    @csrf
                                    <input type="text" placeholder="Add a new task ...." class="w-full" name="body" >   
                                </form>
                            </div>
                </div>

                <div>
                    <h2 style="color: grey"  class="text-lg font-normal mb-3">General Notes</h2>
    
    
                        {{-- general notes --}}
                        <textarea 
                            class="rounded shadow p-5 w-full"
                            style="background-color: white; min-height: 200px;"
                        >Lorem ipsum
                        </textarea>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>


@endsection