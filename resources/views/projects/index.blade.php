@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h2 style="color: grey"  class="text-sm font-normal">My Projects</h2>

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

<main class="lg:flex lg:flex-wrap -mx-3">
    @forelse ($projects as $project)
        <div class="lg:w-1/3 px-3 pb-6">
        @include ('projects.card')
        </div>
    @empty
        <div>No projects yet</div>
    @endforelse
</main>

@endsection